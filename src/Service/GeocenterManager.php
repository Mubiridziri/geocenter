<?php

namespace Mubiridziri\Geocenter\Service;

use Mubiridziri\Geocenter\Model\DecoderContext;
use Mubiridziri\Geocenter\Model\LatLng;
use Mubiridziri\Geocenter\Model\ReverseDecoderContext;
use Mubiridziri\Geocenter\Module\Geodecoder;
use Mubiridziri\Geocenter\Module\ReverseGeodecode;
use Mubiridziri\Geocenter\Module\Routing;

class GeocenterManager
{
    private Geodecoder $geodecoder;

    private ReverseGeodecode $reverseGeodecode;

    private Routing $routing;

    public function __construct(Geodecoder $geodecoder, ReverseGeodecode $reverseGeodecode, Routing $routing)
    {
        $this->geodecoder = $geodecoder;
        $this->reverseGeodecode = $reverseGeodecode;
        $this->routing = $routing;
    }

    public function geodecode(string $address, DecoderContext $context)
    {
        return $this->geodecoder->decode($address, $context);
    }

    public function reverse(LatLng $latLng, ReverseDecoderContext $context)
    {
        return $this->reverseGeodecode->reverse($latLng, $context);
    }
}
