<?php



ob_start()

?>

    <div align="center">
        <img src="/tpl/img/auth.jpg" alt="logo">
        <div class="col-3">


    <form class="form-signin" method="POST" action="/restorepass">

        <br>
        <h6>відновлення пароля</h6>
        <br>
        <h2 class="form-signin-heading">

            <input  id="inputEmail" name="mail" class="form-control" placeholder="E-mail*" required
                   autofocus>
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="Отримати пароль">
    </form>
        </div></div>
<?php
$content = ob_get_contents();
ob_end_clean();

include './tpl/index.php';