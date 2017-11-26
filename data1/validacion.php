<?php //Initialize variables to null.
$nombre =""; // nombre del que manda la peticion
$email =""; // email del que manda la peticion
$asunto =""; // asunto del correo 
$mensaje =""; // Mensaje
$nombreError ="";
$emailError ="";
$asuntoError ="";
$mensajeError ="";
$confirmacion =""; 
if(isset($_POST['submit'])) { // Checking null values in message.
if (empty($_POST["nombre"])){
$nombreError = "Se requiere nombre";
}
else
 {
$nombre = test_input($_POST["nombre"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$nombre))
{
$nombreError = "Only letters and white space allowed";
}
} // Checking null values inthe message.
if (empty($_POST["email"]))
{
$emailError = "Email is required";
}
else
 {
$email = test_input($_POST["email"]);
} // Checking null values inmessage.
if (empty($_POST["asunto"]))
{
$asuntoError = "Purpose is required";
}
else
{
$asunto = test_input($_POST["asuntpo"]);
} // Checking null values inmessage.
if (empty($_POST["mensaje"]))
{
$mensajeError = "Message is required";
}
else
 {
$mensaje = test_input($_POST["mensaje"]);
} // Checking null values inthe message.
if( !($nombre=='') && !($email=='') && !($asunto=='') &&!($mensaje=='') )
{ // Checking valid email.
if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
{
$header= $nombre."<". $email .">";
$headers = "FormGet.com"; /* Let's prepare the message for the e-mail */
$msg = "Hello! $name Thank you...! For Contacting Us.
Name: $nombre
E-mail: $email
Purpose: $asunto
Message: $mensaje
This is a Contact Confirmation mail. We Will contact You as soon as possible.";
$msg1 = " $nombre Contacted Us. Hereis some information about $nombre.
Name: $nombre
E-mail: $email
Purpose: $asunto
Message: $mensaje "; /* Send the message using mail() function */
if(mail($email, $headers, $msg ) && mail("receiver_mail_id@xyz.com", $header, $msg1 ))
{
$confirmacion = "Message sent successfully.......";
}
}
else
{ $emailError = "Invalid Email";
 }
 }
} // Function for filtering input values.function test_input($data)
{$data="";
$data = trim($data);
$data =stripslashes($data);
$data =htmlspecialchars($data);
return $data;
}
?>