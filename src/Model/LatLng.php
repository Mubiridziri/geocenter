<?php

namespace Mubiridziri\Geocenter\Model;

class LatLng
{
    private float $lat;

    private float $lng;

    public function __construct(float $lat, float $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return LatLng
     */
    public function setLat(float $lat): LatLng
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return float
     */
    public function getLng(): float
    {
        return $this->lng;
    }

    /**
     * @param float $lng
     * @return LatLng
     */
    public function setLng(float $lng): LatLng
    {
        $this->lng = $lng;
        return $this;
    }
}
