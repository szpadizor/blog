<?php

//список блогів богера вид

ob_start();
?>

   <P></P>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">

<h2 class="post-title">
                  <?php echo $e['title'] ;?>
     </h2>
              <h5 class="post-subtitle">"
                  <?php echo $e['text'] ;?>
</h5>

            <p class="post-meta">Posted by
              <a href="#">



<?php echo $e['autor'] ;?>
         </a>
              on
<?php echo $e['date'] ;?>
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

include 'tpl/index.php';
