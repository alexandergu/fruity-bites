<?php

declare(strict_types=1);

namespace App\Api\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Throwable;

/**
 * DI extension for the module
 */
class ApiExtension extends Extension
{
    /**
     * Loads configuration
     *
     * @param array $configs
     * @param ContainerBuilder $container
     *
     * @throws Throwable
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configDir = new FileLocator(dirname(__DIR__) .  '/Resources/config');
        $loader = new YamlFileLoader($container, $configDir);
        $loader->load('services.yaml');
    }
}
