<?php
//список блогів богера вид
ob_start();
?>
    <div style="margin-left: 20%">



        <div class="bs-example">
            <span>СОРТУВАННЯ :</span>
        <button type="button" class="btn btn-primary" id="sorter_by_date_up">по даті up </button>
        <button type="button" class="btn btn-primary" id="sorter_by_date">по даті down</button>
        <button type="button" class="btn btn-primary" id="sorter_by_views_up">по переглядах up</button>
        <button type="button" class="btn btn-primary btn-xs" id="sorter_by_views"> по переглядах down</button>
        </div></div>
    <div class="sort_in_this">
<?php foreach ($con as $content):?>
       <div class="sort" data-sort="<?php echo $content['unix'];?>" v-sort="<?php echo $content['statistic'];?>">
               <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <a href="/blogger/<?php echo $content['id'];?>/<?php echo $content['id'];?>">
                        <h2 class="post-title">
                            <?php echo $content['title'];?>
                        </h2>
                        <h3 class="post-subtitle">

                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#"><?php echo $content['username'] ;?></a>
                        on <?php echo $content['date_of_release'] ;?></p>

                </div>
                <span style="font-family: 'Caveat', cursive; font-size: 30px ">Кількість ререглядів:<?php echo $content['statistic'] ;?></span>
                <hr>

            </div>
        </div>
    </div>

    </div>


<?endforeach; ?>

    </div>
<?php
$content = ob_get_contents();
ob_end_clean();
//формуєм список блогів користувача для вставки в шаблон
ob_start();
//формуэм меню
$content_menu = ob_get_contents();
ob_end_clean();
include 'tpl/index.php';
