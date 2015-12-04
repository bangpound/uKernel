<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpKernel\Kernel;

abstract class uKernel extends Kernel
{
    use MicroKernelTrait;

    public function getCacheDir()
    {
        return dirname($this->getRootDir()).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname($this->getRootDir()).'/var/logs';
    }

    protected function getEnvParameters()
    {
        return array_map(['Symfony\\Component\\Yaml\\Inline', 'parse'], parent::getEnvParameters());
    }

    public function getName()
    {
        if (null === $this->name) {
            $r = new \ReflectionObject($this);
            $this->name = Container::underscore(preg_replace('/Kernel$/', '', $r->getName()));
        }

        return $this->name;
    }
}
