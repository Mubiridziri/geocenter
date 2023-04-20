<?php

namespace Mubiridziri\Geocenter\Model;

use Mubiridziri\Geocenter\Option\RoutingOptimazeType;
use Mubiridziri\Geocenter\Option\RoutingReturnType;
use Mubiridziri\Geocenter\Option\RoutingSpeedType;

class Direction
{
    private array $vehicles = []; //array<"VehicleType::TYPE" => VehicleOptions>

    private array $points = []; //array<Point>

    private string $optimaze = RoutingOptimazeType::OPTIMAZE_TIME;

    private string $speed = RoutingSpeedType::SPEED_MAX;

    private int $changeDelay = 0;

    private ?Reachability $reachability = null;

    private ?array $gates = null;

    private ?array $accessRoads = null;

    private ?array $isolated = null;

    private bool $formatting = false;

    private array $return = [
        RoutingReturnType::SUMMARY,
        RoutingReturnType::POINTS,
        RoutingReturnType::GEOMETRY,
        RoutingReturnType::DIRECTIONS
    ];

    private bool $simplify = true;

    private ?array $intervals = null;

    private ?array $pedestrianLimits = null;

    private ?array $alternative = null;

    private int $time = 0;

    private bool $roadworksEnable = false;

    /**
     * @return array
     */
    public function getVehicles(): array
    {
        return $this->vehicles;
    }

    /**
     * @param array $vehicles
     * @return Direction
     */
    public function setVehicles(array $vehicles): Direction
    {
        $this->vehicles = $vehicles;
        return $this;
    }

    /**
     * @return array
     */
    public function getPoints(): array
    {
        return $this->points;
    }

    /**
     * @param array $points
     * @return Direction
     */
    public function setPoints(array $points): Direction
    {
        $this->points = $points;
        return $this;
    }

    /**
     * @return string
     */
    public function getOptimaze(): string
    {
        return $this->optimaze;
    }

    /**
     * @param string $optimaze
     * @return Direction
     */
    public function setOptimaze(string $optimaze): Direction
    {
        $this->optimaze = $optimaze;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpeed(): string
    {
        return $this->speed;
    }

    /**
     * @param string $speed
     * @return Direction
     */
    public function setSpeed(string $speed): Direction
    {
        $this->speed = $speed;
        return $this;
    }

    /**
     * @return int
     */
    public function getChangeDelay(): int
    {
        return $this->changeDelay;
    }

    /**
     * @param int $changeDelay
     * @return Direction
     */
    public function setChangeDelay(int $changeDelay): Direction
    {
        $this->changeDelay = $changeDelay;
        return $this;
    }

    /**
     * @return Reachability|null
     */
    public function getReachability(): ?Reachability
    {
        return $this->reachability;
    }

    /**
     * @param Reachability|null $reachability
     * @return Direction
     */
    public function setReachability(?Reachability $reachability): Direction
    {
        $this->reachability = $reachability;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getGates(): ?array
    {
        return $this->gates;
    }

    /**
     * @param array|null $gates
     * @return Direction
     */
    public function setGates(?array $gates): Direction
    {
        $this->gates = $gates;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getAccessRoads(): ?array
    {
        return $this->accessRoads;
    }

    /**
     * @param array|null $accessRoads
     * @return Direction
     */
    public function setAccessRoads(?array $accessRoads): Direction
    {
        $this->accessRoads = $accessRoads;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getIsolated(): ?array
    {
        return $this->isolated;
    }

    /**
     * @param array|null $isolated
     * @return Direction
     */
    public function setIsolated(?array $isolated): Direction
    {
        $this->isolated = $isolated;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFormatting(): bool
    {
        return $this->formatting;
    }

    /**
     * @param bool $formatting
     * @return Direction
     */
    public function setFormatting(bool $formatting): Direction
    {
        $this->formatting = $formatting;
        return $this;
    }

    /**
     * @return array
     */
    public function getReturn(): array
    {
        return $this->return;
    }

    /**
     * @param array $return
     * @return Direction
     */
    public function setReturn(array $return): Direction
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSimplify(): bool
    {
        return $this->simplify;
    }

    /**
     * @param bool $simplify
     * @return Direction
     */
    public function setSimplify(bool $simplify): Direction
    {
        $this->simplify = $simplify;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getIntervals(): ?array
    {
        return $this->intervals;
    }

    /**
     * @param array|null $intervals
     * @return Direction
     */
    public function setIntervals(?array $intervals): Direction
    {
        $this->intervals = $intervals;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getPedestrianLimits(): ?array
    {
        return $this->pedestrianLimits;
    }

    /**
     * @param array|null $pedestrianLimits
     * @return Direction
     */
    public function setPedestrianLimits(?array $pedestrianLimits): Direction
    {
        $this->pedestrianLimits = $pedestrianLimits;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getAlternative(): ?array
    {
        return $this->alternative;
    }

    /**
     * @param array|null $alternative
     * @return Direction
     */
    public function setAlternative(?array $alternative): Direction
    {
        $this->alternative = $alternative;
        return $this;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $time
     * @return Direction
     */
    public function setTime(int $time): Direction
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRoadworksEnable(): bool
    {
        return $this->roadworksEnable;
    }

    /**
     * @param bool $roadworksEnable
     * @return Direction
     */
    public function setRoadworksEnable(bool $roadworksEnable): Direction
    {
        $this->roadworksEnable = $roadworksEnable;
        return $this;
    }

}
