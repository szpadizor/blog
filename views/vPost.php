<?php



ob_start();
?>
<div style="

	  margin: 0 auto;

    ">
select menu feom menu

<?php foreach ($con as $content):?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <a href="blogger/<?php echo $content['id'];?>">
                        <h2 class="post-title">
                            <?php echo $content['username'];?>
                        </h2>
                    </a>

                </div>
                <hr>

            </div>
        </div>
    </div>
    </div>




<?endforeach; ?>


    <a href="/new_post" class="btn btn-outline-success">Створити пост</a>
    <a href="/edit_post" type="button" class="btn btn-primary" disabled>Редагувати пост</a>
    <a href="delete_post" type="button" class="btn btn-outline-danger">Видалити пост</a>
    <a href="#" type="button" class="btn btn-primary" disabled>Текст кнопки</a></div>
<br>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">

<h2 class="post-title">
                  <?php echo $con['title'] ;?>
     </h2>
              <h5 class="post-subtitle">"
                  <?php echo $con['text'] ;?>
</h5>

            <p class="post-meta">Posted by
              <a href="#">



<?php echo $con['autor'] ;?>
         </a>
              on
<?php echo $con['date'] ;?>
     </p>
          </div>
          <hr>

          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">інші дописи автора &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

<?php
//var_dump($e);
$content = ob_get_contents();
ob_end_clean();
//return $content;
//include 'tpl/index.php';
