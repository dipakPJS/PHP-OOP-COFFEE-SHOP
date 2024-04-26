<?php 

spl_autoload_register('autoLoad');

function autoLoad($className){
    $file = "../../classes/".$className.'.php';

    if(file_exists($file)){
        include $file;
    } else {
        throw new Exception("Connection error:: error in spl_autoload3");
    }
}


?>