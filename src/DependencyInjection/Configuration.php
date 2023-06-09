<?php

namespace Mubiridziri\Geocenter\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('geocenter');
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('geocenter');
        }

        $rootNode->children()
            ->scalarNode('license')
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('decoder_url')
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('reverse_decoder_url')
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('routing_url')
            ->cannotBeEmpty()
            ->end();

        return $treeBuilder;
    }
}
