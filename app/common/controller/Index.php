<?php
namespace app\common\controller;
class Index
{
    public function index($id=0){
       echo "index".$id;
       $this->assign('name','hello');
    }
}