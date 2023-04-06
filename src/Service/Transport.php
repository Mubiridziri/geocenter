<?php

namespace Mubiridziri\Geocenter\Service;

use Mubiridziri\Geocenter\Exception\TransportException;

class Transport
{
    private ?string $host;

    private ?string $license;

    /**
     * @throws TransportException
     */
    public function __construct(string $host, string $license)
    {
        if (empty($host) || empty($license)) {
            throw new TransportException();
        }
        $this->host = $host;
        $this->license = $license;
    }
}