<?php


namespace core\framework;
use \core\framework\functions\Arr;

class Route
{

    protected $uri; //去除域名后的路径
   
    protected $hub;


    public function __construct()
    {
        $this->getUri();
        $this->parseUri();
        $this->dispatch();
    }

    public function getUri(){
        $this->uri = Arr::get($_SERVER, 'REQUEST_URI');
        return $this->uri;
    }

    public function parseUri($uri="") :array{
        $uri = !empty($uri) ? $uri : $this->uri;
        $arr=explode("/",$uri);
        $arr=array_filter($arr);
        $this->hub = [
            "module" => "",
            "controller" => "",
            "action" => "",
            "params" => [],
        ];
        if(count($arr)<3 || empty($arr)){ 
            //url不合法跳默认路由
            $this->hub['module']     = "common";
            $this->hub['controller'] = "index";
            $this->hub['action']     = "index";
        }else{
            $params = [];
            if(count($arr)>3 && count($arr)%2 == 0){
                throw new \Exception('URI PARAMS is invalid!');
            }else{
                $args = array_slice($arr,3);
                for($i=0; $i<count($args);$i=$i+2){
                    $params[$args[$i]]=$args[$i+1];
                }
            }
            $this->hub['module']     = $arr[1];
            $this->hub['controller'] = $arr[2];
            $this->hub['action']     = $arr[3];
            $this->hub['params']     = $params;

        }

        return $this->hub;
      
    }

    public function dispatch($hub=[]){
        $hub = !empty($hub) ? $hub  :  $this->hub;
        $str = "\\app\\".$hub['module']."\controller\\".$hub['controller'];
        $class = new $str();

        call_user_func_array([$class,$hub['action']],$hub['params']);

       
    }
}