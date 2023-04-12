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

    private ?int $spatialInX = null;
    private ?int $spatialInY = null;

    private int $minAddrAccuracy = 0;

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit(int $limit): ContextInterface
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format): ContextInterface
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode(string $mode): ContextInterface
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): ContextInterface
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang(string $lang): ContextInterface
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpatialIn(): string
    {
        return $this->spatialIn;
    }

    /**
     * @param string $spatialIn
     */
    public function setSpatialIn(string $spatialIn): ContextInterface
    {
        $this->spatialIn = $spatialIn;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpatialOut(): string
    {
        return $this->spatialOut;
    }

    /**
     * @param string $spatialOut
     */
    public function setSpatialOut(string $spatialOut): ContextInterface
    {
        $this->spatialOut = $spatialOut;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSpatialInX(): ?int
    {
        return $this->spatialInX;
    }

    /**
     * @param int|null $spatialInX
     */
    public function setSpatialInX(?int $spatialInX): ContextInterface
    {
        $this->spatialInX = $spatialInX;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSpatialInY(): ?int
    {
        return $this->spatialInY;
    }

    /**
     * @param int|null $spatialInY
     */
    public function setSpatialInY(?int $spatialInY): ContextInterface
    {
        $this->spatialInY = $spatialInY;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinAddrAccuracy(): int
    {
        return $this->minAddrAccuracy;
    }

    /**
     * @param int $minAddrAccuracy
     */
    public function setMinAddrAccuracy(int $minAddrAccuracy): ContextInterface
    {
        $this->minAddrAccuracy = $minAddrAccuracy;

        return $this;
    }
}
