<?php
ob_start();
//debug($_SESSION);
?>



<?php
    if (isset($_SESSION['logged_user'])&& $_SESSION['logged_user'] == true && $_SESSION['logged_id'] == $con['blogger_id']){
        echo '<div style="margin-left: 43%">';
    foreach ($toolmenu as $tools){

       //  debug($tools);
        $knopky = $tools['knopky'];
        $link = $tools['link'];


      echo "<a class=\"btn btn-primary\" href=\"$link\">$knopky</a>";
      echo '&nbsp;';




    }echo '</div>';
    }else{echo '';}
?>

    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">

<h2 class="post-title">
               <?php echo $con['title'] ;?>
     </h2><hr>
            <div style="text-align: center">  <img  src="/img<?php echo $con['img'] ;?>"></div><hr>
              <h5 class="post-subtitle">
                  <?php echo $con['text'] ;?>
</h5>

            <p class="post-meta">Posted by
              <a href="/blogger/<?php echo $con['blogger_id'] ;?>">



<?php echo $con['autor'] ;?>
         </a>
              on
<?php echo $con['date'] ;?>
     </p>
          </div>
          <hr>

          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="/blogger/<?php echo $con['blogger_id'] ;?>">інші дописи автора &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

<?php



$content = ob_get_contents();
ob_end_clean();
//return $content;
include 'tpl/index.php';
