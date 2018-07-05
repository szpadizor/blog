<?php


//debug(' from vFind.php');

session_destroy();
ob_start()

?>

    <div align="center">
        <div class="col-3">

                        <form class="form-signin" method="POST" action="/find">
                            <input name="username" type="text" /> <br /><br />
                            <input type="submit" name="enter" value="ШУКАТИ" />
                        </form>




        </div>

    </div>


<?php
    $content = ob_get_contents();
    ob_end_clean();

include './tpl/index.php';
