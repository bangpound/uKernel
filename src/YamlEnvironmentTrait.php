<?php

trait YamlEnvironmentTrait
{
    /**
     * @return array
     */
    protected function getEnvParameters()
    {
        return array_map(['Symfony\\Component\\Yaml\\Inline', 'parse'], parent::getEnvParameters());
    }
}
