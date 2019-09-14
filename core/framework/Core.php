<?php

namespace core\framework;

class Core
{
    protected static $instance = null;
    protected $router;

    function __construct(){
    }

    public static function getInstance(){
        if(!static::$instance instanceof static){
            static::$instance = new static();
            return static::$instance;
        }
    }

    public function run(){
        
        echo microtime()."<br>";

        $this->getRouter();

        echo "<br>".microtime();

    }

    public function getRouter(){
        $this->router = new Route();
    }
}