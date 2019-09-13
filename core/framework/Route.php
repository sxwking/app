<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/11
 * Time: 16:20
 */

namespace core\framework;


class Route
{

    protected $uri;
    protected $method;


    public function __construct()
    {
        $this->uri = $this->getUri();

        $this->parseUri($this->uri);
    }

    public function getUri(){
        return \Arr::get($_SERVER, 'REQUEST_URI');
    }

    public function parseUri($uri){

        $arr=explode("/",$uri);
        $arr=array_filter($arr);
        var_dump($arr);
        echo count($arr);
        if(count($arr)<3 || empty($arr)){
            throw new \Exception('URI is invalid!');
        }
        if(count($arr)>3 && count($arr)%2 == 0){
            throw new \Exception('URI PARAMS is invalid!');
        }
        $module=$arr[1];
        $controller=$arr[2];
        $action=$arr[3];
    }
    public function dispatch(){

    }
}