<?php

session_start();
include(ROOT .'/models/mBlogger.php');
include (ROOT.'/models/mAuth.php');
include (ROOT.'/models/mTool.php');
       class BlogController {




           /////////////отримуєм список блогерів/////////////
           public function actionbloggerslist(){
               // echo 'вивести всіх блогерів, act bloggerslist';

               $objMenu = new mAuth();
               $buildedMenu=$objMenu->menu_build();
               $obj = new mBlogger();
               $con = $obj->getListOfBlogers();

               include_once(ROOT .'/views/vListOfBloggers.php');
           }
           ///////////////список блогів вибраного блогерa/////////////
       public  function actionListblogs($divide){

           $cont = new mBlogger();
           $con= $cont->getListBlogs($divide);
           $buildMenu = new mAuth();
           $buildedMenu = $buildMenu->menu_build();

           include(ROOT . '/views/vListOfBlogs0.php');




       }
           /////////////сторінка з конкретним блогом//////////////
       public  function actionBlogpost($divide){

           $con0 = new mBlogger();
           $con = $con0->getBlogtext($divide);
           $buildedMenu0  = new mAuth();
           $buildedMenu=$buildedMenu0->menu_build();
           $tool_Menu = new mTool();
           $toolmenu = $tool_Menu->toolMenu();


          include_once(ROOT .'/views/vPost.php');

       }






            ////////////////////////////////
       public function  srav(){
           //$today = date("Y-m-d H:i:s");
          // echo $today;

           //дата в форматі mssql
           $mysqldate = date("Y-m-d H:i:s");
           echo $mysqldate;

           ////дата в форматі unixtime // 0 = '1970-01-01 03:00:00'
           echo strtotime($mysqldate);
           $unix = strtotime($mysqldate);
           //дата в форматі mssql
           $dat2= date("Y-m-d H:i:s",$unix);

           echo $dat2;



          // $today  = time();
          // echo $today.'<br>';

           // $today1 =time()+5;
          // echo $today1.'<br>';

          // $raznica = $today1 - $today;

           //echo date("Y-m-d H:i:s",$today1);

           //echo date("Y-m-d H:i:s");

           //if($raznica > 3600){
             //  echo 'зайди потім';
            // echo date("Y-m-d H:i:s",$today);
           //}else{echo 'відобразити форму';}











       }



               }
