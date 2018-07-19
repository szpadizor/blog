<?php


//список блогів богера вид
//http://blog.vodokanal.te.ua/blogger
ob_start();

?>
<h1 style="text-align: center">Список блогерів</h1>
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





<?endforeach; ?>


<?php


$content = ob_get_contents();
ob_end_clean();
 //формуєм список блогів користувача для вставки в шаблон

include 'tpl/index.php';




