<?php 
include("include/config.php");
include('include/userClass.php');
$userClass = new userClass();
$errorMsgReg='';
$errorMsgLogin='';
if (!empty($_POST['loginSubmit'])) 
{
$usernameEmail=$_POST['usernameEmail'];
$password=$_POST['password'];
 if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
   {
    $uid=$userClass->userLogin($usernameEmail,$password);
    if($uid)
    {
        $url=BASE_URL.'/home.php';
        header("Location: $url");
    }
    else
    {
        $errorMsgLogin="Please check login details.";
    }
   }
}

if (!empty($_POST['signupSubmit'])) 
{

    $email=$_POST['emailReg'];
    $Contrasena=$_POST['passwordReg'];
    $nombre=$_POST['nameReg'];
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
    $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $Contrasena);

    if($email_check && $password_check && strlen(trim($nombre))>0) 
    {
    $uid=$userClass->userRegistration($Contrasena,$email,$nombre);
    if($uid)
    {
        $url=BASE_URL.'/home.php';
        header("Location: $url");
    }
    else
    {
      $errorMsgReg="Username or Email already exits.";
    }
    
    }


}
?>
<!DOCTYPE html>
<html>
<head>
<style>
#container{width: 700px}
#login,#signup{width: 300px; border: 1px solid #d6d7da; padding: 0px 15px 15px 15px; border-radius: 5px;font-family: arial; line-height: 16px;color: #333333; font-size: 14px; background: #ffffff;rgba(200,200,200,0.7) 0 4px 10px -1px}
#login{float:left;}
#signup{float:right;}
h3{color:#365D98}
form label{font-weight: bold;}
form label, form input{display: block;margin-bottom: 5px;width: 90%}
form input{ border: solid 1px #666666;padding: 10px;border: solid 1px #BDC7D8; margin-bottom: 20px}
.button {
    background-color: #5fcf80 !important;
    border-color: #3ac162 !important;
    font-weight: bold;
    padding: 12px 15px;
    max-width: 100px;
    color: #ffffff;
}
.errorMsg{color: #cc0000;margin-bottom: 10px}
</style>
<body>
<div id="container">
<div id="login">
<h3>Ingresa</h3>
<form method="post" action="" name="Ingresa">
<label>Email</label>
<input type="text" name="usernameEmail" autocomplete="off" />
<label>Contraseña</label>
<input type="password" name="password" autocomplete="off"/>
<input type="submit" class="button" name="loginSubmit" value="Login">
</form>
</div>


<div id="signup">
<h3>Registro</h3>
<form method="post" action="" name="signup">
<label>Nombre</label>
<input type="text" name="nameReg" autocomplete="off" />
<label>Email</label>
<input type="text" name="emailReg" autocomplete="off" />
<label>Contraseña</label>
<input type="password" name="passwordReg" autocomplete="off"/>
<input type="submit" class="button" name="signupSubmit" value="Signup">
</form>
</div>

</div>

</body>
</html>
