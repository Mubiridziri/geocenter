<?php

namespace Mubiridziri\Geocenter\Helper;

use Mubiridziri\Geocenter\Model\ContextInterface;

class ContextHelper
{
    public static function contextToQuery(ContextInterface $context): string
    {
        $reflect = new \ReflectionClass($context);
        $properties = $reflect->getProperties();
        $attributes = [];
        foreach ($properties as $property) {
            $name = $property->getName();
            $getter = 'get' . ucfirst($name);
            $value = $context->$getter();
            if($value) {
                $attributes[] = sprintf('%s=%s', $name, $value);
            }
        }
        return implode('&', $attributes);
    }
}
