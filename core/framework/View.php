<?php
/**
 * Created by PhpStorm.
 * User: sxwki
 * Date: 2019/9/13
 * Time: 23:28
 */

namespace core\framework;


class View
{
    protected $variables;

    public function assign($key,$value){
        $this->variables[$key] = $value;
    }

    public function display($html){

    }
}