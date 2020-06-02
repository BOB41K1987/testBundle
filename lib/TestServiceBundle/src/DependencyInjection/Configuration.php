<?php
declare(strict_types=1);

namespace Test\TestServiceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('test');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->booleanNode('use_expression_language')->defaultTrue()->end()
                ->arrayNode('types')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('decision')
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                            ->scalarNode('class')
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
