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
     */
    public function setStarting(?bool $starting): void
    {
        $this->starting = $starting;
    }

    /**
     * @return array|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }

    /**
     * @param array|null $properties
     */
    public function setProperties(?array $properties): void
    {
        $this->properties = $properties;
    }
}
