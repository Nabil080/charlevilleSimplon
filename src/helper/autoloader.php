<?php

function autoLoader_controller($nameController)
{
    $controllerFiles = __DIR__ . '/../controller/back/' . $nameController . '.php';
    if (file_exists($controllerFiles)) {
        require_once($controllerFiles);
    }
}

spl_autoload_register('autoLoader_controller');