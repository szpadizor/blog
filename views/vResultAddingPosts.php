<?php

ob_start();


echo '<div  style="margin: 0 auto; width: 200px;">';
    echo $result1;
 echo'</div>';
?>
<div class="container">
    <form class="form-signin">
        <input class="btn btn-lg btn-primary btn-block" type="button" onclick="location='../index.php';"  value="повернутись">
    </form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

include './tpl/index.php';
?>