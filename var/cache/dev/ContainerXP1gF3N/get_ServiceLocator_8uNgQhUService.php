<?php

namespace ContainerXP1gF3N;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_8uNgQhUService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.8uNgQhU' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.8uNgQhU'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'disponibilite' => ['privates', '.errored..service_locator.8uNgQhU.App\\Entity\\Disponibilite', NULL, 'Cannot autowire service ".service_locator.8uNgQhU": it needs an instance of "App\\Entity\\Disponibilite" but this type has been excluded in "config/services.yaml".'],
        ], [
            'disponibilite' => 'App\\Entity\\Disponibilite',
        ]);
    }
}
