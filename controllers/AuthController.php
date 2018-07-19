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
    //session_start();

       $result = $this->proverka->Auth($mail,$pass);

    if ($result == 1) {
        //debug($mail) ;
       // debug($pass);
      // debug($_SESSION);
        $bloggerPosts1 = new BlogController();
    $bloggerPosts= $bloggerPosts1->actionListblogs($_SESSION['logged_id']);
        //echo 'інклюдимо шаблон головної з меню залогіненого44';
        $buildedMenu = $this->proverka->menu_build();

   // include './views/vListOfBlogs0.php';

    }elseif ($result == 0){
ob_start();
        echo 'невірно введені дані';
        $msg = ob_get_contents();
ob_clean();
  include ('./views/vAuth.php');
    }
    elseif ($result == 2){

        $buildedMenu = $this->proverka->menu_build();
        include './views/vChange.php';
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

        if($registration_validate_result == 1){
            // перекидаєм на сторінку з привітанням про реєстрацію
            $result1= 'Успішна реєстрація, можна здійснити вхід за логіном і паролем';
            dd($registration_validate_result);

            $buildedMenu = $this->proverka->menu_build();
            include './views/vAuthResult.php';

        }elseif ($registration_validate_result === 2){
            // перекидаем на стор. з повідомленням про те що
            // користувач є в базі
            $buildedMenu = $this->proverka->menu_build();
            $result1= 'Користувач з таким іменем або E-mail уже зареєстровані';
            include './views/vAuthResult.php';


        }else {
            //  паролі не співпадають
            $buildedMenu = $this->proverka->menu_build();
            $result1= 'Паролі не співпадають';
            include './views/vAuthResult.php';

        }

    }


    public function actionVreg()
    {
        $buildedMenu = $this->proverka->menu_build();
        include('./views/vReg.php');
    }


    public function actionRestorepass(){

//echo 'public function actionRestorepass()';


//перевірка  пошти на валідність, і SELECT по паролю та пошті
        $a = $_POST['mail'];
        $buildedMenu = $this->proverka->menu_build();
        $result1 = $this->proverka->Restorepass($a);




        include './views/vRestorePassResult.php';

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


    }


    public function actionChange(){
        $buildedMenu = $this->proverka->menu_build();
        $result = $this->proverka->mChange();
        if ($result == 1){

            $result1 = 'Пароль змінено';
 include './views/vAuthResult.php';

        }elseif ($result == 0){

            $result1 = 'Паролі не співпадають';
            include './views/vAuthResult.php';

        }



    }


}