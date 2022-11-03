<?php

namespace Jolicht\DogadoLogBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('dogado_log');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('gelf')
                    ->children()
                        ->scalarNode('host')->end()
                        ->integerNode('port')->end()
                    ->end()
                ->end()
                ->scalarNode('service_name')
            ->end();

        return $treeBuilder;
    }

}
