<?php

include("db.php");
$exist = 1;


$table = "";
$part = 0;

/* ---------NOM----------- */
$nom = $_SESSION['username'];


/* ---------Mail---------- */
$mail = $_SESSION['mail'];

/* ---------PWD----------- */
$pwd =  "";

if(isset($_POST["upmail"])){
		$email = $_POST["email"];
		$confemail = $_POST["confemail"];


			if ($email = $mail){
			
			if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ",$confemail)){
			
				$query = mysqli_query($db, "UPDATE users SET email='$confemail' WHERE username='$nom'");
				if($query)
				{
					$msg = "Mail Modifier.";
					$_SESSION['mail'] = $confemail;
				}
			}}
	
			else
			{
					$msg = "Mail Incorrecte.";
			}	
};


if(isset($_POST["uppwd"])){
		$pwds = mysqli_query($db,"SELECT password FROM users WHERE username='$nom'");
		$pwdl = mysqli_fetch_assoc($pwds);
		$pdwtest = $pwdl["password"];
	
		$oldpwd = ($_POST["oldpassword"]);
		$oldpwd = md5($oldpwd);
		$newpwd = ($_POST["newpassword"]);
	
		if ($oldpwd == $pdwtest){
			
			if ((preg_match(" /(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-+!*$@%_\w]{8,15})/ " ,$newpwd)) or (preg_match(" /(?=.*[A-Z])(?=.*[a-z])(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})/ " ,$newpwd)) or (preg_match(" /(?=.*[A-Z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})/ " ,$newpwd)) or (preg_match(" /(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})/ " ,$newpwd))){
			
				$newpwd = md5($newpwd);
				$query = mysqli_query($db, "UPDATE users SET password='$newpwd' WHERE username='$nom'");
				if($query)
				{
					$msg = "Mot de passe Modifier.";
				}
			}
	
			else
			{
					$msg = "Nouveau Mot de Passe Incorrecte.";
			}
		}
		else {
			$msg = "Ancien Mot de Passe Incorrecte.";
		}
};


/* --------- Info Changement de Photo de Profil --------- */
$pp = $_SESSION['profil_image'];

if(isset($_POST["up"])){
				$photo ="
						<form action='' method='post' enctype='multipart/form-data'>
						<label for='fileToUpload' class='profil'>
								<a><img src='files/profils_images/$pp' alt='' /></a>
								<input class='input-file' type='file' name='fileToUpload' id='fileToUpload' required />
						</label>
						<input type='submit' value='Modifier' name='upphoto' />
						</form>
						<p/>";
}
else{
				$photo ="
						<label class='profil'>
								<a><img src='files/profils_images/$pp' alt='' /></a>
						</label>
						<p/>";
};

if ($pp == "User_Avatar.png"){
	$exist = 0;
};

?>