<?php

namespace Mubiridziri\Geocenter\Model;

class Reachability
{
    private int $maxCost = 600;

    private bool $keepHoles = true;

    private float $maxErrorPercent = 0.0005;

    private float $offroadMaxDistKm = 1e+200;

    private float $offroadCostPerKm = 720.0;

    /**
     * @return int
     */
    public function getMaxCost(): int
    {
        return $this->maxCost;
    }

    /**
     * @param int $maxCost
     * @return Reachability
     */
    public function setMaxCost(int $maxCost): Reachability
    {
        $this->maxCost = $maxCost;
        return $this;
    }

    /**
     * @return bool
     */
    public function isKeepHoles(): bool
    {
        return $this->keepHoles;
    }

    /**
     * @param bool $keepHoles
     * @return Reachability
     */
    public function setKeepHoles(bool $keepHoles): Reachability
    {
        $this->keepHoles = $keepHoles;
        return $this;
    }

    /**
     * @return float
     */
    public function getMaxErrorPercent(): float
    {
        return $this->maxErrorPercent;
    }

    /**
     * @param float $maxErrorPercent
     * @return Reachability
     */
    public function setMaxErrorPercent(float $maxErrorPercent): Reachability
    {
        $this->maxErrorPercent = $maxErrorPercent;
        return $this;
    }

    /**
     * @return float
     */
    public function getOffroadMaxDistKm(): float
    {
        return $this->offroadMaxDistKm;
    }

    /**
     * @param float $offroadMaxDistKm
     * @return Reachability
     */
    public function setOffroadMaxDistKm(float $offroadMaxDistKm): Reachability
    {
        $this->offroadMaxDistKm = $offroadMaxDistKm;
        return $this;
    }

    /**
     * @return float
     */
    public function getOffroadCostPerKm(): float
    {
        return $this->offroadCostPerKm;
    }

    /**
     * @param float $offroadCostPerKm
     * @return Reachability
     */
    public function setOffroadCostPerKm(float $offroadCostPerKm): Reachability
    {
        $this->offroadCostPerKm = $offroadCostPerKm;
        return $this;
    }
}
