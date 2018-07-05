<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>БЛОГ</title>

    <!-- Bootstrap core CSS -->
    <link href="http://blog.vodokanal.te.ua/tpl/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="http://blog.vodokanal.te.ua/tpl/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="http://blog.vodokanal.te.ua/tpl/css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="src.html">ісходніки</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
             <?php foreach ($e['menu'] as $menu): ?>
                 <li class="nav-item">
              <a class="nav-link" href="index.html"><?php echo $menu ;?></a>
            </li>

<?php endforeach;?>
</ul>
        </div>
      </div>
    </nav>









    <!-- Page Header -->
    <header class="masthead" style="background-image: url('http://blog.vodokanal.te.ua/tpl/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Blog</h1>
              <span class="subheading">bb</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->




    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">




              <h2 class="post-title">
                  <?php echo $e['title'] ;?>
              </h2>
              <h5 class="post-subtitle">
                  <?php echo $e['text'] ;?>
              </h5>

            <p class="post-meta">Posted by
              <a href="#"><?php echo $e['autor'] ;?></a>
              on <?php echo $e['date'] ;?></p>
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

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">

              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="http://blog.vodokanal.te.ua/tpl/vendor/jquery/jquery.min.js"></script>
    <script src="http://blog.vodokanal.te.ua/tpl/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="http://blog.vodokanal.te.ua/tpl/js/clean-blog.min.js"></script>

  </body>

</html>