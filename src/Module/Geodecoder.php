<?php

namespace Mubiridziri\Geocenter\Module;

use Mubiridziri\Geocenter\Exception\DecoderException;
use Mubiridziri\Geocenter\Helper\ContextHelper;
use Mubiridziri\Geocenter\Model\Address;
use Mubiridziri\Geocenter\Model\ContextInterface;
use Mubiridziri\Geocenter\Model\DecoderContext;
use Mubiridziri\Geocenter\Model\Error;
use Mubiridziri\Geocenter\Model\LatLng;
use Mubiridziri\Geocenter\Option\GeodecodeFormat;
use Mubiridziri\Geocenter\Service\Transport;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

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
        $response = $this->transport->request(sprintf("%s/search?%s&text=%s", $this->host, $queryString, $address));
        return $this->responseProcessing($response, $context);
    }

    public function suggest(string $address, LatLng $referencePoint, DecoderContext $context): array
    {
        $queryString = ContextHelper::contextToQuery($context);
        $response = $this->transport->request(sprintf("%s/suggest?%s&text=%s&x=%s&y=%s",
                $this->host, $queryString, $address, $referencePoint->getLat(), $referencePoint->getLng())
        );
        return $this->responseProcessing($response, $context);
    }

    private function responseProcessing(ResponseInterface $response, ContextInterface $context): array
    {
        $content = $this->transport->getContent($response);
        if ($response->getStatusCode() === 400) {
            $error = $this->serializer->deserialize($content, Error::class, 'json');
            throw new DecoderException($error->getMessage(), $error);
        }

        $format = $context->getFormat();

        if ($format === GeodecodeFormat::SIMPLE_FORMAT && isset($content['address'])) {
            return $this->serializer->deserialize(
                json_encode(array_values($content['address'])),
                Address::class . '[]',
                'json'
            );
        }

        return $content;
    }
}
