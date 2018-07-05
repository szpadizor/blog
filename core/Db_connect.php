<?php

class Db_connect{

    public static function link(){


        $link_param = include(ROOT.'/core/db_root_pass.php');


        $dsn = "mysql:host={$link_param['host']};dbname={$link_param['db_name']}";
        $db = new PDO($dsn, $link_param['user'],$link_param['pass']);
        $db->exec("set names utf8");
        return $db;
    }
}



