<?php



ob_start()

?>



<div class="container" align="center">


    <form class="form-signin" method="POST" action="">
        <img src="/tpl/img/auth.jpg" alt="logo">
        <br>
        <br>
        <h6>РЕЄСТРАЦІЯ</h6>
        <br>
        <h2 class="form-signin-heading">

            <input type="text" id="inputEmail" name="mail" class="form-control" placeholder="E-mail*" required
                   autofocus>
            <br>
            <input type="password" id="inputPassword" name="pass1" class="form-control" placeholder="Пароль*"
                   required>
            <br>
            <input type="password" id="inputPassword" name="pass2" class="form-control" placeholder="Повторіть пароль*"
                   required>
            <br>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Увійти">
    </form>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();

include '../tpl/index.php';