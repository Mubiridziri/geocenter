<?php

namespace Mubiridziri\Geocenter\Module;

use Mubiridziri\Geocenter\Exception\DecoderException;
use Mubiridziri\Geocenter\Helper\ContextHelper;
use Mubiridziri\Geocenter\Model\Address;
use Mubiridziri\Geocenter\Model\Error;
use Mubiridziri\Geocenter\Model\LatLng;
use Mubiridziri\Geocenter\Model\ReverseDecoderContext;
use Mubiridziri\Geocenter\Option\GeodecodeFormat;
use Mubiridziri\Geocenter\Service\Transport;
use Symfony\Component\Serializer\SerializerInterface;

class ReverseGeodecode
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

    public function reverse(LatLng $latLng, ReverseDecoderContext $context): array
    {
        $queryString = ContextHelper::contextToQuery($context);
        $x = $latLng->getLat();
        $y = $latLng->getLng();
        $response = $this->transport->request($this->host . "/getAddress?" . $queryString . '&x=' . $x . "&y=" . $y);
        $content = $this->transport->getContent($response);
        if ($response->getStatusCode() === 400) {
            $error = $this->serializer->deserialize($content, Error::class, 'json');
            throw new DecoderException($error->getMessage(), $error);
        }

        return $context->getFormat() === GeodecodeFormat::SIMPLE_FORMAT && isset($content['address']) ? $this->serializer->deserialize(
            json_encode(array_values($content['address'])),
            Address::class . '[]',
            'json'
        ) : [];
    }

    public function reverseGeoJson(string $geoJson, ReverseDecoderContext $context): array
    {
        $queryString = ContextHelper::contextToQuery($context);

        return [];
    }
}
