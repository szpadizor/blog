<?php


class mTool
{
    public  $pdoconnect;

    public function __construct()
    {
        $this->pdoconnect = Db_connect::link();
    }

    public  function toolMenu(){

        $sql = "SELECT knopky, link FROM tool";
        $result = $this->pdoconnect->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $toolMenu = $result->fetchAll();

        return $toolMenu;
    }


   public function mSetPost(){

       $zagol = $_POST ['zagol'];
       $fulltext = $_POST ['fulltext'];
       $today = date("Y-m-d H:i:s");
       $logged_id = $_SESSION['logged_id'];

       $path = 'img/';

    if(!empty($logged_id)&& isset($logged_id)){

           if ($_SERVER['REQUEST_METHOD'] == 'POST'){
               $q= '';
               $str=$_FILES['picture']['tmp_name'];
               //strrpos — Возвращает позицию последнего вхождения подстроки в строке
               //strpos — Возвращает позицию первого вхождения подстроки || $newName =1
               $newName =  substr($str, strrpos($str, '/'));
               $newName_to_sql = $newName.'.jpg';

               $sql = "INSERT INTO content (content.title, content.text, content.date_of_release, content.blogger_id, content.img) 
VALUES ('$zagol','$fulltext', '$today','$logged_id','$newName_to_sql')";

               $pdoconnect = Db_connect::link();
           $result = $pdoconnect -> query($sql);
               if ($result == false){
                   $q= 'пост не добавлений /  ';
                   exit();
               }else
                   $q = 'пост опубліковано / ';

               if (!copy($_FILES['picture']['tmp_name'], $path . $newName .'.jpg'))
                   $q .= 'фото не загрузилось';
               else
                   $q .= 'фото опуюліковано';
return $q;
           }
    }
   }




   public function mGetPost(){

   $sql=  "SELECT content.title, content.text, content.id, content.blogger_id FROM content WHERE id = 2 ";

       $result = $this->pdoconnect->query($sql);
       $row = $result->fetch(PDO::FETCH_ASSOC);
     return  $row;
   }
}

