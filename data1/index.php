<?php 
include_once('include/header.php');
include ('include/config.php');
include('include/class.php');
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
        $errorMsgLogin="Porfavor revise los datos de login.";
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
      $errorMsgReg="perdon este Email ya esta registrado.";
    }
    
    }
}
?>

		
			<section id="banner">
				<div id="container1">
<div id="login">
<h3>Login</h3>
<form method="post" action="" name="login">
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
				
			</section>
			
		
<?php include_once('include/footer.php'); ?>

		