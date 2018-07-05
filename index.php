<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

header("Content-Type: text/html; charset=utf-8");

define('ROOT',__DIR__);

//router
require_once (ROOT.'/core/Router.php');
//DB connect
require_once (ROOT.'/core/Db_connect.php');
//include (ROOT.'/tpl/post.php');

function debug($param){
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}

// go
$router = new Router();
$router->go();