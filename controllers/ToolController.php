<?php
include (ROOT .'/models/mAuth.php');
class ToolController
{

    public $proverka;

    public function __construct()
    {
        $this->proverka = new mAuth();
    }

    public  function tool_Menu(){

        $toolmenu = new mTool();
        $toolmenu->toolMenu();
    }


    public  function  actionVfind(){
  session_start();
       // echo 'from ToolController/actionFind()';
       $buildedMenu = $this->proverka->menu_build();
       include './views/vFind.php';
    }


    public  function  actionfind(){
        session_start();
        // echo 'from ToolController/actionFind()';
        $buildedMenu = $this->proverka->menu_build();
        include './views/vFindResult.php';
    }

    public  function  actionNewpost(){
        session_start();
     $buildedMenu = $this->proverka->menu_build();
    include './views/vNewPost.php';
    }



    public function actionNewgo(){
// echo 'записати в БД actionNewgo(){ToolController';
        session_start();
        include ('./models/mTool.php');
      $result = new mTool();
 $result1 =  $result->mSetPost();

//debug($result1);

        $buildedMenu = $this->proverka->menu_build();

        include './views/vResultAddingPosts.php';


    }




    public   function  actionEdit_post(){
        session_start();
        //вибрати по ід пост відправити на форму
    }
    public  function  actionDelete_post(){
        session_start();

    }
}


