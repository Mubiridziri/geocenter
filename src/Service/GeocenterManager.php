<?php

namespace Mubiridziri\Geocenter\Service;

use Mubiridziri\Geocenter\Model\DecoderContext;
use Mubiridziri\Geocenter\Module\Geodecoder;

class GeocenterManager
{
    private Transport $transport;

    private Geodecoder $geodecoder;

    public function __construct(Transport $transport, Geodecoder $geodecoder)
    {
        $this->transport = $transport;
        $this->geodecoder = $geodecoder;
    }

    public function geodecode(string $address, DecoderContext $context)
    {
        return $this->geodecoder->decode($address, $context);
    }
}
