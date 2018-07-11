

<?php



ob_start()

?>

<div align="center">
    <div class="col-3">

<form class="form-signin" method="POST" action="/change">
        <img src="../tpl/img/auth.jpg" alt="logo">
<br>
    <br>
    <h5 class="form-signin-heading" style="color: red">Зміна пароля.</h5>
    <h6 class="form-signin-heading" >ВВЕДІТЬ НОВИЙ ПАРОЛЬ</h6>

<label for="inputpass1" class="sr-only">ВВЕДІТЬ НОВИЙ ПАРОЛЬ</label>
            <input type="password" id="inputPassword" name="pass1" class="form-control"
                   placeholder="введіть новий пароль*"
                   required
                   autofocus>
    <br>
            <label for="inputpass2" class="sr-only">ПОВТОРІТЬ ПАРОЛЬ</label>
            <input type="password" id="inputPassword" name="pass2" class="form-control" placeholder="повторіть пароль*"
                   required>

    <br>
            <input class="btn btn-primary" type="submit" name="submit1" value="Змінити пароль">
    </form>
    </div></div>
<?php
$content = ob_get_contents();
ob_end_clean();
include './tpl/index.php';
