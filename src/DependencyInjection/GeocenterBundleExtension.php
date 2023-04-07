<?php

namespace Mubiridziri\Geocenter\DependencyInjection;


use Mubiridziri\Geocenter\Module\Geodecoder;
use Mubiridziri\Geocenter\Service\Transport;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class GeocenterBundleExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $configDir = new FileLocator(__DIR__ . '/../Resources/config');

        $loader = new YamlFileLoader($container, $configDir);
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $manager = $container->getDefinition(Transport::class);
        $manager->replaceArgument(0, $config['license']);

        $manager = $container->getDefinition(Geodecoder::class);
        $manager->replaceArgument(0, $config['decoder_url']);
    }
}
