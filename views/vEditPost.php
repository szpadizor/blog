<?php
ob_start()
?>

<div align="center">
    <div class="col-6">


        <form  enctype="multipart/form-data" action="/edit-go" method="post">

            <div align="center" class="form-group">

                <span style="font-family: 'Caveat', cursive; font-size: 30px; ">Заголовок поста</span>
                <input  class="form-control" rows="5" name="zagol" value="<?php echo $a1;?>" required   />

                <span style="font-family: 'Caveat', cursive; font-size: 30px; "> Повний текст</span>


                <textarea class="form-control" name="fulltext" rows="8" id="comment"  required><?php echo $a2;?></textarea>
                <br /><br />


                <input type="submit" name="enter" class="l" value="Змінити" />


        </form>
    </div>

</div>


<?php
$content = ob_get_contents();
ob_end_clean();


include './tpl/index.php';



