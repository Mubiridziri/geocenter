<?php

namespace Mubiridziri\Geocenter\Module;

use Mubiridziri\Geocenter\Exception\DecoderException;
use Mubiridziri\Geocenter\Helper\ContextHelper;
use Mubiridziri\Geocenter\Model\Address;
use Mubiridziri\Geocenter\Model\DecoderContext;
use Mubiridziri\Geocenter\Model\Error;
use Mubiridziri\Geocenter\Option\GeodecodeData;
use Mubiridziri\Geocenter\Option\GeodecodeFormat;
use Mubiridziri\Geocenter\Service\Transport;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class Geodecoder
{
    private string $host;

    private Transport $transport;

    private SerializerInterface $serializer;

    public function __construct(string $host, Transport $transport, SerializerInterface $serializer)
    {
        $this->host = $host;
        $this->transport = $transport;
        $this->serializer = $serializer;
    }

    public function decode(string $address, DecoderContext $context): array
    {
        $queryString = ContextHelper::contextToQuery($context);
        $response = $this->transport->request($this->host . "/search?" . $queryString . '&text=' . $address);
        $content = $this->transport->getContent($response);
        if ($response->getStatusCode() === Response::HTTP_BAD_REQUEST) {
            $error = $this->serializer->deserialize($content, Error::class, 'json');
            throw new DecoderException($error->getMessage(), $error);
        }

        if ($context->getFormat() === GeodecodeFormat::SIMPLE_FORMAT && isset($content['address'])) {
            return $this->serializer->deserialize(
                json_encode(array_values($content['address'])),
                Address::class . '[]',
                'json'
            );
        }
        return [];
    }
}
