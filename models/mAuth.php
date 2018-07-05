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


 public function __construct()
 {
     $this->pdoconnect = Db_connect::link();
 }


    public  function Auth($mail, $pass)
    {

        $result = $this->pdoconnect->query("SELECT users.id, users.email, users.username, users.pass FROM users WHERE users.email = '$mail'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $content = $result->fetch();
        $this->email_from_sql = $content['email'];
        $this->pass_from_sql = $content['pass'];
        $this->pass = $pass;
        $this->email = $mail;
        $this->id_from_sql = $content['id'];
        if ($this->validateEmail() && $this->validatePassword() == true) {
            $_SESSION['logged_user'] = true;// провірка прошла успішно
            $_SESSION['logged_id'] = $this->id_from_sql;
            return true;
        } else {
            $_SESSION['logged_user'] = false;
            return false;
        }
        /*echo $mail;
         echo $pass;
         echo $username_from_sql;
         echo $pas_from_sql;*/
    }


    public  function Registration($mail, $username, $pass1, $pass2)
    {
        //получаєм з $_post email
        // робимо виборку з бази, якщо є таке імя чи пошта повідомляєм що треба інші
        //якщо перевірям чи співпадають поля з паролями
        // якщо ні то повідомляєм
        // робимо апдейт в таблицю користувачыв
        // переводимо на головну

        $result = $this->pdoconnect->query("SELECT users.email, users.username  FROM users WHERE users.email ='$mail' LIMIT 1 ");


        if ($result > 0) {
            return 'user_is_registerd'; // ERROR user is in table;
        } else {
            if ($this->validateRegistrationPasswords($pass1, $pass2) == true) {

                // хешуємо $pass1 //
                $hash = $pass1;
                $result1 = $this->pdoconnect->exec
                ("INSERT INTO users SET 
         users.email = '$mail', users.username = '$username',users.pass='$hash'");

                return true;

            } else {
                return false;
            }
        }

    }




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
        if (!empty($this->pass_from_sql && $this->pass == $this->pass_from_sql)) {
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
       // session_start();
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
}