<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/11
 * Time: 16:15
 */

namespace core\framework;


class Response
{
    protected $content;
    public function setContent($content){

        $this->content = $content;
        return $this;

    }
    public function getContent(){

        return $this->content;
    }
    public function send()
    {
        echo $this->content;
        return $this;
    }

    public function __toString()
    {
        return $this->content;
    }

}