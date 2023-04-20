<?php

namespace Mubiridziri\Geocenter\Model;

class VehicleOptions
{
    private ?bool $starting;

    private ?array $properties;

    /**
     * @return bool|null
     */
    public function getStarting(): ?bool
    {
        return $this->starting;
    }

    /**
     * @param bool|null $starting
     * @return VehicleOptions
     */
    public function setStarting(?bool $starting): VehicleOptions
    {
        $this->starting = $starting;
        return $this;
    }
}
