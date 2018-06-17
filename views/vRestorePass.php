<?php



ob_start()

?>



<div class="container" align="center">


    <form class="form-signin" method="POST" action="">
        <img src="/tpl/img/auth.jpg" alt="logo">
        <br>
        <h6>відновлення пароля</h6>
        <br>
        <h2 class="form-signin-heading">

            <input type="text" id="inputEmail" name="mail" class="form-control" placeholder="E-mail*" required
                   autofocus>
            <br>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Отримати пароль">
    </form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

include '../tpl/index.php';