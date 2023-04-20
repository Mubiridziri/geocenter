<?php

namespace Mubiridziri\Geocenter\Model;

class Point
{
    private float $x;

    private float $y;

    /**
     * @return float
     */
    public function getX(): float
    {
        return $this->x;
    }

    /**
     * @param float $x
     * @return Point
     */
    public function setX(float $x): Point
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @return float
     */
    public function getY(): float
    {
        return $this->y;
    }

    /**
     * @param float $y
     * @return Point
     */
    public function setY(float $y): Point
    {
        $this->y = $y;
        return $this;
    }
}
