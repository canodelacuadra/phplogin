
<?php include 'header.php';?>
<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

<div class="container">
<!-- login form box -->
<form class="form-inline" method="post" action="index.php" name="loginform">

    <div class="form-group">
	<label for="login_input_username">Usuario</label>
    <input id="login_input_username" class="login_input" type="text" name="user_name" required /></div>

   <div class="form-group"> <label for="login_input_password">Contraseña</label>
    <input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
	</div>

    <input class="btn btn-default" type="submit"  name="login" value="Login" />

</form>

<a href="register.php">Registre una nueva cuenta</a>
</div>
<?php include 'footer.php';?>
