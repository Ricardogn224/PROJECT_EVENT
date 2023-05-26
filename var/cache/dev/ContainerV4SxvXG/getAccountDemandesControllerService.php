<?php

namespace ContainerV4SxvXG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAccountDemandesControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\AccountDemandesController' shared autowired service.
     *
     * @return \App\Controller\AccountDemandesController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/AccountDemandesController.php';

        $container->services['App\\Controller\\AccountDemandesController'] = $instance = new \App\Controller\AccountDemandesController();

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('App\\Controller\\AccountDemandesController', $container));

        return $instance;
    }
}
