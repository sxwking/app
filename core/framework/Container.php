<?php
/**
 * Created by PhpStorm.
 * User: sxwki
 * Date: 2019/9/14
 * Time: 22:05
 */

namespace core\framework;


class Container
{
    protected $repository=[];
    protected $classList=[
        'core' => Core::class,
        'view' => View::class,
        'route'=> Route::class,
    ];
    protected static $singleton;

    function __construct()
    {

    }

    public static function getInstance(){
        if(isset(static::$singleton)){
            return static::$singleton;
        }
        return new static;
    }

    public function make($key){

        if(!isset($this->repository[$key])){
            $this->bindTo($key,(new $this->classList[$key]()));
        }
        return $this->repository[$key];

    }
    public function bindTo($key,$instance){
        $this->repository[$key] = $instance;
        return $this->repository[$key];
    }

    public static function get($key){
        return static::getInstance()->make($key);
    }

    public static function set($key,$obj){
        return static::getInstance()->bindTo($key,$obj);

    }
}