<?php

ob_start()
?>


            <form  enctype="multipart/form-data" action="/new-go" method="post">

                <div align="center" class="form-group">

<span style="font-family: 'Caveat', cursive; font-size: 30px; ">Заголовок поста</span>
<input  class="form-control" rows="5" name="zagol" required   />

<span style="font-family: 'Caveat', cursive; font-size: 30px; "> Повний текст</span>


<textarea class="form-control" name="fulltext" rows="8" id="comment" required></textarea>
<br /><br />

<input type="file" name="picture" multiple accept="image/*,image/jpeg">


<input type="submit" name="enter" class="l" value="Опублікувати" />


</form>



<?php
$content = ob_get_contents();
ob_end_clean();

include './tpl/index.php';
