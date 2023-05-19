<?php

namespace Mubiridziri\Geocenter\Module;

use Mubiridziri\Geocenter\Exception\DecoderException;
use Mubiridziri\Geocenter\Model\Direction;
use Mubiridziri\Geocenter\Model\Error;
use Mubiridziri\Geocenter\Service\Transport;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class Routing
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

    public function getRoute(Direction $direction): array
    {
        $directionJson = $this->serializer->serialize($direction, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $response = $this->transport->request(sprintf("%s/directions", $this->host), Transport::POST, [], $directionJson);
        $content = $this->transport->getContent($response);
        if ($response->getStatusCode() === 400) {
            $error = $this->serializer->deserialize($content, Error::class, 'json');
            throw new DecoderException($error->getMessage(), $error);
        }

        return $content;
    }
}
