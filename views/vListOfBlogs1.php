<?php
//список блогів богера вид
ob_start();

?>


    <div align="center">

        <div style="margin-left: 43%">


            <span>СОРТУВАННЯ :</span>
            <button class="btn btn-primary" id="sorter_by_date">по даті</button>
            <button class="btn btn-primary" id="sorter_by_views" >по переглядах</button>

        </div>


        <div class="sort_in_this" >


            <div  v-sort="1"  data-sort="10">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="post-preview">

                                <h2 class="post-title">


                                </h2>
                                <h3 class="post-subtitle">

                                </h3>


                                <br> <span style="font-family: 'Caveat', cursive; font-size: 30px; ">кількість переглядів:  1   data-sort="10"</span>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>


            <div  v-sort="3"  data-sort="8">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="post-preview">

                                <h2 class="post-title">


                                </h2>
                                <h3 class="post-subtitle">

                                </h3>


                                <br> <span style="font-family: 'Caveat', cursive; font-size: 30px; ">кількість переглядів:  3  data-sort="8"</span>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div  v-sort="4"  data-sort="7">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-preview">

                            <h2 class="post-title">


                            </h2>
                            <h3 class="post-subtitle">

                            </h3>


                            <br> <span style="font-family: 'Caveat', cursive; font-size: 30px; ">кількість переглядів:  4 data-sort="7"</span>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
        </div>



        <div  v-sort="5"  data-sort="6">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-preview">

                            <h2 class="post-title">


                            </h2>
                            <h3 class="post-subtitle">

                            </h3>


                            <br> <span style="font-family: 'Caveat', cursive; font-size: 30px; ">кількість переглядів:  5 data-sort="6"</span>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
        </div>


        <div  v-sort="2"  data-sort="9">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-preview">

                            <h2 class="post-title">


                            </h2>
                            <h3 class="post-subtitle">

                            </h3>


                            <br> <span style="font-family: 'Caveat', cursive; font-size: 30px; ">кількість переглядів:  2 data-sort="9"</span>
                        </div>


                    </div>
                </div>
            </div>
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

