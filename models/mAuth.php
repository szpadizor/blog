<?php


class mAuth
{
    protected  $pdoconnect;
    //
    public  $email;
    public  $email_from_sql;
    //
    public  $pass;
    public  $pass_from_sql;

    //
    public  $id_from_sql;
//
    public $pass_recovery;

    public function __construct()
    {
        $this->pdoconnect = Db_connect::link();
    }


    public  function Auth($mail, $pass)
    {

        $result = $this->pdoconnect->query("SELECT users.id, users.email, users.username, users.pass, users.pass_recovery FROM users WHERE users.email = '$mail'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $content = $result->fetch();
        $this->pass_recovery = $content['pass_recovery'];
        $this->email_from_sql = $content['email'];
        $this->pass_from_sql = $content['pass'];
        $this->pass = $pass;
        $this->email = $mail;
        $this->id_from_sql = $content['id'];
        $this->pass_recovery =$content['pass_recovery'];

        if(is_null($this->pass_recovery)){

        if ($this->validateEmail() && $this->validatePassword() == true) {
            $_SESSION['logged_user'] = true;// провірка прошла успішно
            $_SESSION['logged_id'] = $this->id_from_sql;
            return 1;
        } else {
            $_SESSION['logged_user'] = false;
            return 0;
         }
        }elseif (!is_null($this->pass_recovery)){

            if ($this->validateEmail() && $this->validatePasswordRec() == true) {
                $_SESSION['logged_user'] = true;
                $_SESSION['logged_id'] = $this->id_from_sql;

                return 2;

            }else {
                $_SESSION['logged_user'] = false;
                return 0;
            }

        }

        /*echo $mail;
         echo $pass;
         echo $username_from_sql;
         echo $pas_from_sql;*/
    }

//////////////////////////////////////+++++++++++++++++++++//////////////////////////
    public  function Registration($mail, $username, $pass1, $pass2)
    {
        //получаєм з $_post email
        // робимо виборку з бази, якщо є таке імя чи пошта повідомляєм що треба інші
        //якщо перевірям чи співпадають поля з паролями
        // якщо ні то повідомляєм
        // робимо апдейт в таблицю користувачів
        // переводимо на головну

        $result0 = $this->pdoconnect->query("SELECT users.email, users.username  FROM users WHERE users.email ='$mail' OR users.username = '$username'");;
        $result0->setFetchMode(PDO::FETCH_ASSOC);
        $result = $result0->fetch();
    //dd($result);
        if ($result > 0) {
            return 2; // ERROR user is in table;
        } else {
            if ($this->validateRegistrationPasswords($pass1, $pass2) == true) {

                // хешуємо $pass1 //
                $hash = password_hash($pass1,PASSWORD_DEFAULT);

                $result1 = $this->pdoconnect->exec
                ("INSERT INTO users SET 
         users.email = '$mail', users.username = '$username',users.pass='$hash'");
                return 1;
            } else {
                return 0;
            }
        }

    }




    public function Restorepass($a)
    {


        $headers = array();
        $headers[] = "From: developer@vodokanal.te.ua";
        $headers[] = "Content-type: text/plain; charset=utf-8";


        if (filter_var($a, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT users.email, users.pass_recovery FROM users WHERE users.email = '$a'";
            $result = $this->pdoconnect->query($sql);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if ($row > 0) {
                // $result1 = 'ви  в базі  відправка пароля на пошту';
                $pass_recovery = $row['pass_recovery'];
                if (is_null($pass_recovery)) {
                    //generate pass
                    $genpass2 = '';
                    $simv = array("92", "7d", "6d", "83", "mp", "7", "66", "45", "4", "36", "22", "1", "0", "xo", "k", "l", "m", "n", "o", "p", "q", "1r", "3s", "a", "b", "c", "d", "5e", "f", "g", "h", "i", "j6", "t", "u", "v9", "w", "x5", "6y", "z5");
                    for ($i = 0; $i < 5; $i++) {
                        shuffle($simv);
                        $genpass2 = $genpass2 . $simv[1];
                    }

                    //хешовання
                    $hash = password_hash($genpass2, PASSWORD_DEFAULT);

                    $sql1 = "UPDATE users SET users.pass_recovery ='$hash'  WHERE users.email = '$a'";
                    $stmt = $this->pdoconnect->prepare($sql1);
                    if ($stmt->execute() == true) {
                        mail($a, 'Тимчасовий пароль - БЛОГ', 'Ваш тимчасовий пароль для входу в кабінет: ' . $genpass2 . '. Під час першого входу вам буде запропоновано змінити пароль.', implode("\r\n", $headers));
                        ob_start();
                        echo '<h2 class="form-signin-heading" align="center">';
                        echo 'Тимчасовий пароль надіслано на поштову скриньку, якщо ви не отримали повідомлення перевірте папку "Спам".';
                        echo '</h2>';
                        $result1 = ob_get_contents();
                        ob_end_clean();
                        return $result1;
                    }
                }

           } else {
                ob_start();
                echo '<h2 class="form-signin-heading" align="center">';
                echo 'Не коректно введено  E-MAIL';
                echo '</h2>';
                $result1 = ob_get_contents();
                ob_end_clean();
                return $result1;
            }
        }
        else {
            ob_start();
            echo '<h2 class="form-signin-heading" align="center">';
            echo "Некоректно вказанний E-mail! Перевірте правильність написання! ";
            echo '</h2>';
            $result1 = ob_get_contents();
            ob_end_clean();
            return $result1;
        }

       // return 3;
    }
//////////////////////////////////////////////////////s
    public  function logout(){

        session_destroy();
        header('Location:'. ROOT);
        exit;

    }

    protected function validateEmail()
    {
        if (!empty($this->email_from_sql && $this->email == $this->email_from_sql)) {
            return true;
        } else {
            return false;
        }
    }

    protected  function validatePassword()
    {
        if (!empty($this->pass_from_sql && password_verify($this->pass,$this->pass_from_sql))) {
            return true;
        } else {
            return false;
        }
    }



    protected  function validatePasswordRec()
    {
        if (!empty($this->pass_recovery && password_verify($this->pass,$this->pass_recovery))) {
            return true;
        } else {
            return false;
        }
    }

    protected  function validateRegistrationPasswords($pass1, $pass2)
    {
//провірка чиспівпадають паролі пароль1 і пароль2;
        if ($pass1 == $pass2) {
            return true;
        } else {
            return false;
        }
    }


    public  function menu_build()
    {

        if (!empty($_SESSION['logged_user'])&&
            isset($_SESSION['logged_user'])&&$_SESSION['logged_user'] == true ) {
            //  $logged_user = $_SESSION['logged_user'];
            // if ($logged_user == true) {

            //формую меню

            $sql = "SELECT menu.menu_name,menu.link FROM menu WHERE menu.login = 1";
            $result = $this->pdoconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $to_menu = $result->fetchAll();

        } /////

        /* else {
             $sql = "SELECT menu.menu_name, menu.link FROM menu WHERE menu.logout = 1";
             $result = $this->pdoconnect->query($sql);
             $result->setFetchMode(PDO::FETCH_ASSOC);
             $to_menu = $result->fetchAll();


         }/**/

        //}
        else{
            $sql = "SELECT menu.menu_name, menu.link FROM menu WHERE menu.logout = 1";
            $result = $this->pdoconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $to_menu = $result->fetchAll();

        }


        return $to_menu;  }



        public function mChange(){
            //Якщо нажата кнопка то опрацьовуємо дані
            if(isset($_POST['submit1'])) {
                //Провіряємо на пустоту
                if (empty($pass2))


                    if (empty($_POST['pass']))

                $pass1 = $_POST ['pass1'];
                $pass2 = $_POST ['pass2'];
                $id = $_SESSION['logged_id'];


                if ($pass1 == $pass2) {
                    $hash = password_hash($pass1,PASSWORD_DEFAULT);
                    // $hash = $pass1;    Unixtime = NULL


                  //  dd($hash);



                    $sql = "UPDATE users SET users.pass = '$hash', users.pass_recovery = NULL WHERE users.id = '$id'";
                    $result = $this->pdoconnect->prepare($sql);
                    $result->execute();





                   // echo $id;

                    return 1;

                } else {
                    // echo '<h2 class="form-signin-heading" align="center">';

                   /* echo'<br>';
                    echo'<br>';
                    echo 'паролі не співпадають!';*/
                    //  echo '</h2>';
                    return 0;
                }


            }

            $result1 = ob_get_contents();
            ob_end_clean();

        }
}