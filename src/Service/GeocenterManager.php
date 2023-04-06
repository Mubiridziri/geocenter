<?php

namespace Mubiridziri\Geocenter\Service;

class GeocenterManager
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }
}