<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RouteCollectionBuilder;

trait MinimalConfigTrait
{
    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        if (in_array($this->getEnvironment(), ['dev'], true)) {
            $routes->import($this->getRootDir().'/config/routing_'.$this->getEnvironment().'.yml');
        } else {
            $routes->import($this->getRootDir().'/config/routing.yml');
        }
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        $c->loadFromExtension('framework', array(
            'secret' => '%secret%',
            'assets' => [],
        ));
    }
}
