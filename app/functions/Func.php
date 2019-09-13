<?php


//打印函数
function p($array){
    if( php_sapi_name()!='cli'){
        header('Content-Type:text/html; charset=utf-8');
    }
    dump($array,1,'',0);
}