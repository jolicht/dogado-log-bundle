<?php

namespace Jolicht\DogadoLogBundle\DependencyInjection;

use Jolicht\DogadoLogBundle\DefaultContextProcessor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class DogadoLogExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('dogado_log.gelf_transport');
        $definition->replaceArgument(0, $config['gelf']['host']);
        $definition->replaceArgument(1, $config['gelf']['port']);

        $definition = $container->getDefinition(DefaultContextProcessor::class);
        $definition->replaceArgument(1, $config['service_name']);
    }

}
