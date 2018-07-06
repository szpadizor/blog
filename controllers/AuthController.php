<?php
//include (ROOT .'/models/mAuth.php');
include (ROOT.'/controllers/BlogController.php');
class AuthController
{
 //
    public $proverka;

 public function __construct()
 {
     $this->proverka = new mAuth();
 }

    public function actionAuth($divide){

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    session_start();

       $result = $this->proverka->Auth($mail,$pass);

    if ($result == true) {
        //debug($mail) ;
       // debug($pass);
       // debug($_SESSION);
        $bloggerPosts1 = new BlogController();
        $bloggerPosts= $bloggerPosts1->actionListblogs($_SESSION['logged_id']);
        //echo 'інклюдимо шаблон головної з меню залогіненого44';
        $buildedMenu = $this->proverka->menu_build();

   // include './views/vListOfBlogs.php';

    }else{

        ob_start();
        echo 'невірно введені дані';
        $msg = ob_get_contents();
ob_clean();


  include ('./views/vAuth.php');

     //header("Location: ../views/vAuth.php");
    }
    }

    public function actionVauth()
    {

        {
            $buildedMenu = $this->proverka->menu_build();
             include('./views/vAuth.php');
        }

    }

    public function actionReg(){
        //получаєм з $_post email
        // робимо виборку з бази, якщо є таке імя чи пошта повідомляєм що треба інші
        //якщо перевірям чи співпадають поля з паролями
        // якщо ні то повідомляєм
        // робимо апдейт в таблицю користувачів
      // переводимо на головну
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];

        $registration_validate_result = $this->proverka->Registration($mail,$username,$pass1,$pass2);

        if($registration_validate_result == true){
            // перекидаєм на сторінку з привітанням про реєстрацію
        }elseif ($registration_validate_result == 'user_is_registerd'){
            // перекидаем на стор. з повідомленням про те що
            // користувач є в базі
        }else {
            //  паролі не співпадають
        }

    }


    public function actionVreg()
    {
        $buildedMenu = $this->proverka->menu_build();
        include('./views/vReg.php');
    }


    public function actionRestorepass(){

    }

    public function actionVrestorepass()
    {
        $buildedMenu = $this->proverka->menu_build();


        include('./views/vRestorePass.php');
    }


    public function actionLogout(){
       session_start();
        session_destroy();
        //Робимо редірект
       header("Location: http://blog.vodokanal.te.ua/");
       exit;

     // debug($_SESSION);
    }


}