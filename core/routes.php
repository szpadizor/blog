<?php
//font-family: 'Caveat', cursive;
 return array(
     //  uri blogger/oleg/22
// blog(controller)/blogpost(action)/$1(bloggername)/$2(post)'
    'vfind' =>'tool/vfind',
    'newpost'=>'tool/newpost',
    'new-go'=>'tool/newgo',
    'find' => 'tool/find',
    'blogger/([0-9]+)/([0-9]+)' => 'blog/blogpost/$1/$2',
    'blogger/([0-9]+)' => 'blog/listblogs/$1',
    'vauth' => 'auth/vauth',
    'vreg' => 'auth/vreg',
    'vrestorepass' =>'auth/vrestorepass',
    'blogger' => 'blog/bloggerslist',
    'auth' => 'auth/auth',
    // 'vauth' => 'auth/vauth',
    'reg' => 'auth/reg',
    'restorepass' => 'auth/restorepass',
    'logout' => 'auth/logout',
    'index.php' => 'blog/bloggerslist',
    '' => 'blog/bloggerslist',
    'write' => 'tool/write_to_sql',
    'edit_post' => 'tool/edit_post',
    'delete_post' => 'tool/delete_post'


            //AdminController/actionAdmincp
          //  controller   / action
);