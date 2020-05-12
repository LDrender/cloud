<?php

include("./db.php");

$msg = "";
$cloud_code = $_SESSION['cloud_default'];
$user_session = $_SESSION["username"];


// Ajouter un Cloud à sa liste de participation

if(isset($_POST["ajouter"])) 
{
	$add_cloud = $_POST["code"];
	
	$sql="SELECT cloud_code FROM cloud_list WHERE cloud_code='$add_cloud' and owner = '1'";
	$result=mysqli_query($db,$sql);

	
	$sql2="SELECT cloud_code FROM cloud_list WHERE cloud_code='$add_cloud' and username='$user_session'";
	$result2=mysqli_query($db,$sql2);

	if(mysqli_num_rows($result) == 0)
	{
		$msg = "Code Cloud Invalide.";
	}
	else{
		if(mysqli_num_rows($result2) >= 1){
			$msg = "Vous avez déja rejoint ce Cloud.";
		}
		else{
			if($add_cloud != $cloud_code){
			$query = mysqli_query($db, "INSERT INTO cloud_list(cloud_code, username, owner) VALUES ('$add_cloud','$user_session','0')");
			if($query)
			{
				$msg = "Cloud ajouter à la liste.";
			}
			}
		}
	}
}

// Changer de Cloud

if(isset($_POST["changer"])) 
{
	$_SESSION["cloud_code"] = $_POST["code_cloud"];
}

// Quitter un Cloud

if(isset($_POST["quitter"])) 
{
	$code_exit = $_POST["code_exit"];
	$code_leave = $_POST["code_leave"];

	$code_exit = mysqli_real_escape_string($db, $code_exit);

	$sql="SELECT cloud_code FROM cloud_list WHERE username='$user_session' and cloud_code='$code_leave' and owner = '0'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
	if(mysqli_num_rows($result) == 0)
	{
		$msg = "Utilisateur introuvable.";
	}
	elseif ($code_exit == $code_leave)
	{
		$query = mysqli_query($db, "DELETE FROM cloud_list WHERE username='$user_session' and cloud_code='$code_leave' and owner = '0'");
		if($query)
		{
			$msg = "Suppression Effectuer.";
		}
	}	
	else
	{
		$msg = "Utilisateur non Identique.";
	}	
}


// Supprimer les utilisateurs non propiétaire de son cloud

if(isset($_POST["supprimer"])){


	$username = $_POST["username"];
	$account = $_POST["account"];

	$username = mysqli_real_escape_string($db, $username);

	$sql="SELECT username FROM cloud_list WHERE cloud_code='$cloud_code'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
	if(mysqli_num_rows($result) == 0)
	{
		$msg = "Utilisateur introuvable.";
	}
	elseif ($username == $account)
	{
		$query = mysqli_query($db, "DELETE FROM cloud_list WHERE username='$username' and cloud_code='$cloud_code'");
		if($query)
		{
			$msg = "Suppression Effectuer.";
		}
	}	
	else
	{
		$msg = "Utilisateur non Identique.";
	}	
}

 
?>