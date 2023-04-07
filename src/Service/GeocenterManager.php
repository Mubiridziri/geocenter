<?php

namespace Mubiridziri\Geocenter\Service;

use Mubiridziri\Geocenter\Model\DecoderContext;
use Mubiridziri\Geocenter\Module\Geodecoder;

class GeocenterManager
{
    private Geodecoder $geodecoder;

    public function __construct(Geodecoder $geodecoder)
    {
        $this->geodecoder = $geodecoder;
    }

    public function geodecode(string $address, DecoderContext $context)
    {
        return $this->geodecoder->decode($address, $context);
    }
}
