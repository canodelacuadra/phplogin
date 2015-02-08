<?php include 'header.php';?>
<div class="container">
<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- register form -->
<h2>Registro de usuarios</h2>
<div class="col-md-6">
<form class="form-horizontal" method="post" action="register.php" name="registerform">

    <!-- the user name input field uses a HTML5 pattern check -->
   <div class="form-group"> 
   <label for="login_input_username"class="col-sm-2 col-md-6 control-label">Nombre Usuario (solamente letras y números, de  2a  60 caractere)</label>
    <input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required /></div>

    <!-- the email input field uses a HTML5 email type check -->
   <div class="form-group"> 
   <label for="login_input_email"class="col-sm-2  col-md-6  control-label">email usuario</label>
    <input id="login_input_email" class="login_input" type="email" name="user_email" required />
	</div>

   <div class="form-group"> 
   <label for="login_input_password_new"class="col-sm-2 col-md-6  control-label">Password (min. 6 caracteres)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /></div>

    <div class="form-group">
	<label for="login_input_password_repeat"class="col-sm-2  col-md-6  control-label">Repetir contraseña</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
	</div>
    <input class='btn btn-block btn-primary' type="submit"  name="register" value="Registro" />

</form></div>

<!-- backlink -->
<div class="col-md-6">
<a class='btn btn-success' href="index.php">Volver a página de login</a></div>
</div>
<?php include 'footer.php';?>
