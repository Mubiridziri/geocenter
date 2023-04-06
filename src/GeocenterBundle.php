<?php

namespace Mubiridziri\Geocenter;

use Mubiridziri\Geocenter\DependencyInjection\GeocenterBundleExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class GeocenterBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->extension) {
            $this->extension = new GeocenterBundleExtension();
        }
        return $this->extension;
    }
}