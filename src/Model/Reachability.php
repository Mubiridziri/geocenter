<?php

namespace Mubiridziri\Geocenter\Model;

class Reachability
{
    private int $maxCost = 600;

    private bool $keepHoles = true;

    private float $maxErrorPercent = 0.0005;

    private float $offroadMaxDistKm = 1e+200;

    private float $offroadCostPerKm = 720.0;
}
