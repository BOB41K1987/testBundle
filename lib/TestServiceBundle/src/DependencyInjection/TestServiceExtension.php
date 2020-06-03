<?php
declare(strict_types=1);

namespace Test\TestServiceBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Test\TestServiceBundle\TestService;

final class TestServiceExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $container->autowire('test_service_bundle.test_service', TestService::class);
        $container->setAlias(TestService::class, 'test_service_bundle.test_service');

        $definition = $container->getDefinition('test_service_bundle.test_service');
        $definition->setArgument(0, $config['use_expression_language']);
        $definition->setArgument(1, $config['types']);
    }
}
