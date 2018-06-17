<?php


include_once(ROOT .'/models/mBlogger.php');
       class BlogController {

           //список блогів вибраного блогерa
       public function actionListblogs($divide){

          // $nes = array();
           $e = mBlogger::getListBlogs($divide);

include_once(ROOT .'/views/vListOfBlogs.php');

       }
          //сторінка з конкретним блогом
       public  function actionBlogpost($divide){


     $e = mBlogger::getBlogtext($divide);


         include_once(ROOT .'/views/vPost.php');





       }
         //отримуєм список блогерів
       public function actionbloggerslist(){

             echo 'вивести всіх блогерів, act bloggerslist';

             $this->srav();



       }

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
