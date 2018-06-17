<?php

 return array(
     //  uri blogger/oleg/22
// blog(controller)/blogpost(action)/$1(bloggername)/$2(post)'
    'blogger/([0-9]+)/([0-9]+)' => 'blog/blogpost/$1/$2',
    'blogger/([0-9]+)' => 'blog/listblogs/$1',
    'blogger' => 'blog/bloggerslist',
     'auth' => 'auth/auth',
     'reg'  => 'auth/reg',
     'restorepass' => 'auth/restorepass'



            //AdminController/actionAdmincp
          //  controller   / action
);