<?php

class BaseApp
{
    public function _load($class)
    {
        include 'src/php/' . preg_replace('#\\\\#', '/', $class) . '.php';
    }

    public function autoload()
    {
        spl_autoload_register([$this, '_load']);
    }
}