<?php

class mBlogger
{


    public static function getListOfBlogers()
    {

        echo 'отримуєм список блогерів';
        $listOfBloggers = array();
        $pdoconnect = Db_connect::link();
        $result = $pdoconnect->query('SELECT users.id, users.username FROM users');

        $i = 0;
        while ($row = $result->fetch()) {
            $listOfBloggers[$i]['id'] = $row['id'];
            $listOfBloggers[$i]['username'] = $row['username'];
            $i++;
        }
        return $listOfBloggers;

    }


    public static function getListBlogs($divide)
    {
       // echo 'список блогів вибраного блогерa';


       $user_id = $divide[0];
       // $id = $divide[1];
        $logged_user = true;
       // echo $user_id;

        if ($logged_user == true) {

            //формую меню

            $sql = "SELECT menu.menu_name FROM menu WHERE menu.login = 1";
            $pdoconnect = Db_connect::link();
            $result = $pdoconnect->query($sql);
            //$result->setFetchMode(PDO::FETCH_ASSOC);
            //$result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_COLUMN, 0);

            //$to_menu = $result->fetch();
            $to_menu = $result->fetchAll();

            ////////////////////////////////////////////////////////////////////

            $content = array();

            $sql = "SELECT content.title, content.date_of_release, content.short_description, users.username FROM content
INNER JOIN users ON content.blogger_id = users.id WHERE blogger_id = $user_id";
            $result = $pdoconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $i = 0;


              while ($row = $result->fetch()) {

                $content[$i]['title'] = $row['title'];
                $content[$i]['username'] = $row['username'];
                $content[$i] ['date_of_release'] = $row['date_of_release'];
                $content[$i] ['short_description'] = $row['short_description'];
                $i++;

            }
             /*echo '<pre>';
            var_dump($content);
            echo '</pre>';*/
        }
        return array('menu' => $to_menu, 'content' => $content );
    }


    public static function getBlogtext($divide)
    {
        // echo 'сторінка з конкретним блогом';

        $id = $divide[1];
        $logged_user = true;


        if ($logged_user == true) {

            //формую меню

            $sql = "SELECT menu.menu_name FROM menu WHERE menu.login = 1";
            $pdoconnect = Db_connect::link();
            $result = $pdoconnect->query($sql);
            //$result->setFetchMode(PDO::FETCH_ASSOC);
            //$result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_COLUMN, 0);

            //$to_menu = $result->fetch();
            $to_menu = $result->fetchAll();

            $sql = "SELECT content.title, content.text, content.date_of_release, users.username FROM content
INNER JOIN users ON content.blogger_id = users.id WHERE content.id = $id";
            $result = $pdoconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $content = $result->fetch();
            $title = $content['title'];
            $text = $content['text'];
            $date = $content['date_of_release'];
            $autor = $content['username'];
            //  counter go //
            $sql = "CALL kpvoda_blog.counter($id)";

            $pdoconnect = Db_connect::link();
            $result = $pdoconnect->exec($sql);


            return array('menu' => $to_menu, 'title' => $title, 'text' => $text, 'date' => $date, 'autor' => $autor);

        } else {
            $sql = "SELECT menu.menu_name FROM menu WHERE menu.logout = 1";
            $pdoconnect = Db_connect::link();
            $result = $pdoconnect->query($sql);
            //$result->setFetchMode(PDO::FETCH_ASSOC);
            //$result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_COLUMN, 0);

            //$to_menu = $result->fetch();
            $to_menu = $result->fetchAll();

            $sql = "SELECT content.title, content.text, content.date_of_release, users.username FROM content
INNER JOIN users ON content.blogger_id = users.id WHERE content.id = $id";
            $result = $pdoconnect->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $content = $result->fetch();
            $title = $content['title'];
            $text = $content['text'];
            $date = $content['date_of_release'];
            $autor = $content['username'];

            //  counter go //
            $sql = "CALL kpvoda_blog.counter($id)";

            $pdoconnect = Db_connect::link();
            $result = $pdoconnect->exec($sql);


            return array('menu' => $to_menu, 'title' => $title, 'text' => $text, 'date' => $date, 'autor' => $autor);
        }


        // if($result == true){echo 'ok';}else{echo 'error';}

    }
}
    ?>
