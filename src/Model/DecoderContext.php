<?php

namespace Mubiridziri\Geocenter\Model;

use Mubiridziri\Geocenter\Option\GeodecodeData;
use Mubiridziri\Geocenter\Option\GeodecodeFormat;
use Mubiridziri\Geocenter\Option\GeodecodeMode;
use Mubiridziri\Geocenter\Option\Language;
use Mubiridziri\Geocenter\Option\Spatial;

class DecoderContext implements ContextInterface
{
    const DEFAULT_LIMIT = 10;

    private int $limit = self::DEFAULT_LIMIT;

    private string $format = GeodecodeFormat::GEOJSON_FULL_FORMAT;

    private string $mode = GeodecodeMode::SEARCH_MODE;

    private string $data = GeodecodeData::DATA_ALL;

    private string $lang = Language::RU;

    private string $spatialIn = Spatial::EPSG_4326;

    private string $spatialOut = Spatial::EPSG_4326;

    private ?int $spatialInX;
    private ?int $spatialInY;

    private int $minAddrAccuracy = 0;
}
