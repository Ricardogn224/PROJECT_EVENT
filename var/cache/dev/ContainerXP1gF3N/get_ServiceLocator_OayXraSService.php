<?php

namespace ContainerXP1gF3N;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_OayXraSService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.OayXraS' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.OayXraS'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'favori' => ['privates', '.errored..service_locator.OayXraS.App\\Entity\\Favori', NULL, 'Cannot autowire service ".service_locator.OayXraS": it needs an instance of "App\\Entity\\Favori" but this type has been excluded in "config/services.yaml".'],
            'favoriRepository' => ['privates', 'App\\Repository\\FavoriRepository', 'getFavoriRepositoryService', true],
        ], [
            'favori' => 'App\\Entity\\Favori',
            'favoriRepository' => 'App\\Repository\\FavoriRepository',
        ]);
    }
}
