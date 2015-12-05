<?php

trait VariableFilesystemTrait
{
    public function getCacheDir()
    {
        return dirname($this->getRootDir()).'/var/cache/'.$this->getEnvironment();
    }

    public function getLogDir()
    {
        return dirname($this->getRootDir()).'/var/logs';
    }
}
