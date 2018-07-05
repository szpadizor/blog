<?php
//список блогів богера вид
ob_start();

?>

<?php foreach ($con as $content):?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            <?php echo $content['title'];?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?php echo $content['short_description'];?>
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#"><?php echo $content['username'] ;?></a>
                        on <?php echo $content['date_of_release'] ;?></p>
                </div>
                <hr>

            </div>
        </div>
    </div>
    </div>




<?endforeach; ?>


<?php
$content = ob_get_contents();
ob_end_clean();
//формуєм список блогів користувача для вставки в шаблон
ob_start();

//формуэм меню

$content_menu = ob_get_contents();
ob_end_clean();




include 'tpl/index.php';

