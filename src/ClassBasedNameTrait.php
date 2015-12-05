<?php

trait ClassBasedNameTrait
{
    public function getName()
    {
        if (null === $this->name) {
            $r = new \ReflectionObject($this);

            $this->name = strtolower(preg_replace(
                ['/(.+?)Kernel$/', '/([A-Z]+)([A-Z][a-z])/', '/([a-z\d])([A-Z])/'],
                ['\\1', '\\1_\\2', '\\1_\\2'],
                $r->getName()
            ));
        }

        return $this->name;
    }
}
