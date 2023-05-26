<?php

namespace ContainerXP1gF3N;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_MmlCEWDService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.MmlCEWD' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.MmlCEWD'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'userPasswordHasher' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
            'verifyEmailHelper' => ['privates', 'symfonycasts.verify_email.helper', 'getSymfonycasts_VerifyEmail_HelperService', true],
        ], [
            'entityManager' => '?',
            'userPasswordHasher' => '?',
            'verifyEmailHelper' => '?',
        ]);
    }
}
