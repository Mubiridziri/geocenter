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




}
