 <?php
if(!empty($_SESSION['uid']))
{
$session_uid=$_SESSION['uid'];
include('include/class.php');
$userClass = new userClass();
}

if(empty($session_uid))
{
$url=BASE_URL.'index.php';
header("Location: $url");
}


?>