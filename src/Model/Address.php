<?php

namespace Mubiridziri\Geocenter\Model;

class Address
{
    private string $name;

    private string $lat;

    private string $lng;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLat(): string
    {
        return $this->lat;
    }

    /**
     * @param string $lat
     */
    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLng(): string
    {
        return $this->lng;
    }

    /**
     * @param string $lng
     */
    public function setLng(string $lng): void
    {
        $this->lng = $lng;
    }

    public function setX($value)
    {
        $this->lat = $value;
    }

    public function setY($value)
    {
        $this->lng = $value;
    }
}
