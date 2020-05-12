<?php
include("db.php");	
session_start();

$user_check = $_SESSION['username'];
$status = $_SESSION['status'];

$sql = mysqli_query($db,"SELECT username FROM users WHERE username='$user_check' ");

$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

$login_user = $row['username'];

if(!isset($user_check)) //verif en cas de non connexion
{
	header("Location: .\index.php ");
}
else{
	if ($status == "user") {
		header("location: .\index.php "); // redirection si pas admin
	}
	elseif ($status == "admin" or $status == "super_admin"){ //check admin ou super admin
		//Je fais rien je suis admin donc je peux continuer
	}
	else{ //double verif en cas de non connexion
		header("location: logout.php");
	}
}
?>