<?php
ob_start()


//SELECT title, fulltext FROM blogs WHERE  blogger_id = $blogg_id
// and post id = post id;


//$post id =
//$blogg_id =

// масив

//'write' => 'tool/write_to_sql',

?>

<div align="center">
    <div class="col-3">


        <form class="form-signin" method="POST" action="/write">
           <br>

            <h2 class="form-signin-heading" >

                <input id="title" name="title" class="form-control"  required
                       autofocus>
                <br>
                <input id="fulltext" name="fulltext" class="form-control"
                       required>

                <br>

                <input class="btn btn-primary" type="submit" name="submit" value="Змінити">
        </form>
    </div>

</div>


<?php
$content = ob_get_contents();
ob_end_clean();

include './tpl/index.php';
