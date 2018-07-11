<?php



ob_start()

?>



<div class="container" align="center">
    <img src="/tpl/img/auth.jpg" alt="logo">
    <div class="col-3">

    <form class="form-signin" method="POST" action="reg">

        <br>

        <h6>РЕЄСТРАЦІЯ</h6>

        <h2 class="form-signin-heading">

            <input  id="inputEmail" name="mail" class="form-control" placeholder="E-mail*" required
                   autofocus>
            <br>
            <input  id="username" name="username" class="form-control" placeholder="username*" required
            autofocus>
            <br>
            <input type="password" id="inputPassword" name="pass1" class="form-control" placeholder="Пароль*"
                   required>
            <br>
            <input type="password" id="inputPassword" name="pass2" class="form-control" placeholder="Повторіть пароль*"
                   required>
            <br>
            <input class="btn btn-primary" type="submit" name="submit" value="ЗАРЕЄСТРУВАТИСЬ">
    </form>
    </div></div>
<?php
$content = ob_get_contents();
ob_end_clean();

include './tpl/index.php';