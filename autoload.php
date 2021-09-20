<?php

function controllers_autocargar($classname){

    include 'controllers/'. $classname .'.'. 'php';
}
spl_autoload_register('controllers_autocargar');
?>