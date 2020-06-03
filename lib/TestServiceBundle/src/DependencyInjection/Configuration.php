<?php
declare(strict_types=1);

namespace Test\TestServiceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('test');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->booleanNode('use_expression_language')->defaultTrue()->end()
                ->arrayNode('types')
                    ->prototype('scalar')
                    ->validate()
                        ->ifTrue(static function ($class) { return \class_exists($class) === FALSE; })
                        ->thenInvalid('Class %s does not exist.')
                    ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
