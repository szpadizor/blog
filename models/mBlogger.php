<?php

class mBlogger
{


    public static function getListOfBlogers()
    {

       // echo 'отримуєм список блогерів';
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
        $pdoconnect = Db_connect::link();
        $user_id = $divide[0];
        $sql = "SELECT content.title, content.date_of_release, content.id, users.username FROM content
INNER JOIN users ON content.blogger_id = users.id WHERE blogger_id = '$user_id'";

        $content = array();
        $result = $pdoconnect->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;


        while ($row = $result->fetch()) {

            $content[$i]['title'] = $row['title'];
            $content[$i]['username'] = $row['username'];
            $content[$i] ['date_of_release'] = $row['date_of_release'];
            $content[$i] ['id'] = $row['id'];
            $i++;

        }
        return $content;
        }


    public static function getBlogtext($divide)
    {
        // echo 'сторінка з конкретним блогом';
        $user_id = $divide[0];
        $id = $divide[1];
        $pdoconnect = Db_connect::link();
        $sql = "SELECT content.title, content.text, content.date_of_release, users.username, content.img,content.blogger_id FROM content
INNER JOIN users ON content.blogger_id = users.id WHERE content.id = $id";
        $result = $pdoconnect->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $content = $result->fetch();
        $title = $content['title'];
        $text = $content['text'];
        $date = $content['date_of_release'];
        $autor = $content['username'];
        $img = $content['img'];
        $blogger_id = $content['blogger_id'];

        //  counter go //
        $sql = "CALL kpvoda_blog.counter($id)";

        $pdoconnect = Db_connect::link();
        $result = $pdoconnect->exec($sql);

        //return array('menu' => $to_menu,
        return array('title' => $title, 'text' => $text, 'date' => $date, 'autor' => $autor, 'img' => $img,'blogger_id'=> $blogger_id );

    }


}





