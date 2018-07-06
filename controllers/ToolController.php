<?php
include (ROOT .'/models/mAuth.php');
include (ROOT.'/models/mTool.php');
class ToolController
{

     public $proverka;

    public $post_id;

    public function __construct()
    {
        $this->proverka = new mAuth();
        $result = new mTool();
    }

    public  function tool_Menu(){

        $toolmenu0 = new mTool();
        $toolmenu = $toolmenu0->toolMenu();
        return $toolmenu;


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
      //  include ('./models/mTool.php');
      $result = new mTool();
 $result1 =  $result->mSetPost();


        $buildedMenu = $this->proverka->menu_build();

        include './views/vResultAddingPosts.php';


    }




    public   function  actionEditpost(){
        session_start();
        $buildedMenu = $this->proverka->menu_build();

        $getopst = new mTool();
        $getopst = $getopst->mGetPost();


        $a1 = $getopst['title'];
        $a2 = $getopst ['text'];
        $_SESSION['id']  = $getopst ['id'];
        $a4 = $getopst ['blogger_id'];



       include './views/vEditPost.php';
     // debug($getopst);
          //вибрати по ід пост відправити на форму
    }


    public function actionEditet(){

        session_start();



        $par1 = $_POST ['zagol'];
        $par2 = $_POST ['fulltext'];
        $blogger_id = $_SESSION['logged_id'];
        $post_id= $_SESSION['id'] ;


     $db = Db_connect::link();


    $sql= "UPDATE content SET
 content.title = '$par1', content.text = '$par2' WHERE 
 content.id = '$post_id' AND content.blogger_id = '$blogger_id' ";

      if ($result = $db->exec($sql)){
          header("Location: http://blog.vodokanal.te.ua/blogger/$blogger_id");
      }else debug($post_id);








    }


    public  function  actionDeletepost(){
        session_start();
      //  $buildedMenu = $this->proverka->menu_build();

    }
}


