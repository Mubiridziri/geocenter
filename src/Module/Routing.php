<?php

namespace Mubiridziri\Geocenter\Module;

use Mubiridziri\Geocenter\Service\Transport;
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
}
