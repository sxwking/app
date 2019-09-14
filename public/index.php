<?php

require __DIR__ . '/../vendor/autoload.php';
$debug=true;
if($debug==true){
    $whoops = new \Whoops\Run;
    $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set("display_errors","On");
}else{
    ini_set("display_errors","Off");
}

\core\framework\Container::get('core')->run();

