<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "../core/";
    $extension = ".php";
    $fullpath = $path . $className . $extension;

    require_once $fullpath;
}

?>