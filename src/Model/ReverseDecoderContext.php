<?php

namespace Mubiridziri\Geocenter\Model;

use Mubiridziri\Geocenter\Option\GeodecodeFormat;
use Mubiridziri\Geocenter\Option\GeodecodePattern;
use Mubiridziri\Geocenter\Option\GeodecodeSortBy;
use Mubiridziri\Geocenter\Option\Language;
use Mubiridziri\Geocenter\Option\Spatial;

class ReverseDecoderContext implements ContextInterface
{
    private string $format = GeodecodeFormat::GEOJSON_FULL_FORMAT;

    private string $spatialIn = Spatial::EPSG_4326;

    private string $spatialOut = Spatial::EPSG_4326;

    private string $lang = Language::RU;

    private string $pattern = GeodecodePattern::INTERSECT;

    private int $maxDist = 0;

    private int $maxCount = 1;

    private ?string $type = null;

    private string $sortBy = GeodecodeSortBy::TYPE_AND_DIST;

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return ContextInterface
     */
    public function setFormat(string $format): ContextInterface
    {
        $this->format = $format;

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
     * @return ContextInterface
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
     * @return ContextInterface
     */
    public function setSpatialOut(string $spatialOut): ContextInterface
    {
        $this->spatialOut = $spatialOut;

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
     * @return ContextInterface
     */
    public function setLang(string $lang): ContextInterface
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     * @return ContextInterface
     */
    public function setPattern(string $pattern): ContextInterface
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxDist(): int
    {
        return $this->maxDist;
    }

    /**
     * @param int $maxDist
     * @return ContextInterface
     */
    public function setMaxDist(int $maxDist): ContextInterface
    {
        $this->maxDist = $maxDist;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxCount(): int
    {
        return $this->maxCount;
    }

    /**
     * @param int $maxCount
     * @return ContextInterface
     */
    public function setMaxCount(int $maxCount): ContextInterface
    {
        $this->maxCount = $maxCount;

        return $this;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $type
     * @return ContextInterface
     */
    public function setType(?string $type): ContextInterface
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getSortBy(): string
    {
        return $this->sortBy;
    }

    /**
     * @param string $sortBy
     * @return ContextInterface
     */
    public function setSortBy(string $sortBy): ContextInterface
    {
        $this->sortBy = $sortBy;

        return $this;
    }
}
