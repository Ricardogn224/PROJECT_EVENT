<?php

namespace ContainerXP1gF3N;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_BsyVWucService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.BsyVWuc' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.BsyVWuc'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'disponibiliteRepository' => ['privates', 'App\\Repository\\DisponibiliteRepository', 'getDisponibiliteRepositoryService', true],
            'evenementRepository' => ['privates', 'App\\Repository\\EvenementRepository', 'getEvenementRepositoryService', true],
            'serviceRepository' => ['privates', 'App\\Repository\\ServiceRepository', 'getServiceRepositoryService', true],
        ], [
            'disponibiliteRepository' => 'App\\Repository\\DisponibiliteRepository',
            'evenementRepository' => 'App\\Repository\\EvenementRepository',
            'serviceRepository' => 'App\\Repository\\ServiceRepository',
        ]);
    }
}
