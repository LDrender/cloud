<?php

	include ("db.php");	
	$msg = "";

if(isset($_POST["signup"]))
	{
		/* ---- Generator Code ---- */
		
		function genererChaineAleatoire($longueur = 10)
		{
			$caracteres = '0123456789';
			$longueurMax = strlen($caracteres);
			$chaineAleatoire = '';
			for ($i = 0; $i < $longueur; $i++)
			{
			$chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
			}
			return $chaineAleatoire;
		}
		
		$code = genererChaineAleatoire();
		
		$sql2="SELECT cloud_code FROM cloud_list WHERE cloud_code = '$code'";
		$result2=mysqli_query($db,$sql2);
		
		if(mysqli_num_rows($result2) != 0)
		{
			$code = genererChaineAleatoire();
		}
		
		/* ------------------------ */
		
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$confpass = $_POST["confpass"];
		$passwordt = $password;

		$username = mysqli_real_escape_string($db, $username);
		$email = mysqli_real_escape_string($db, $email);
		$password = mysqli_real_escape_string($db, $password);
		$password = md5($password);
		
		
		$sqlmail="SELECT email FROM users WHERE email='$email'";
		$sqluser="SELECT username FROM users WHERE username='$username'";
		$resultmail=mysqli_query($db,$sqlmail);
		$resultuser=mysqli_query($db,$sqluser);
		
		

		if (preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ",$email)){
			if ((preg_match(" /(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([-+!*$@%_\w]{8,15})/ " ,$passwordt)) or (preg_match(" /(?=.*[A-Z])(?=.*[a-z])(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})/ " ,$passwordt)) or (preg_match(" /(?=.*[A-Z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})/ " ,$passwordt)) or (preg_match(" /(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})/ " ,$passwordt))){
				if ($_POST["confpass"] == $_POST["password"])
				{
					if(mysqli_num_rows($resultmail) == 1)
					{
						$msg = "Cet email existe déjà.";
					}
					else
					{
						if(mysqli_num_rows($resultuser) == 1)
						{
							$msg = "Ce nom d'utilisateur existe déjà.";
						}
						else
						{
							$query = mysqli_query($db, "INSERT INTO users (username, email, password)VALUES ('$username', '$email', '$password')");
							$query2 = mysqli_query($db, "INSERT INTO cloud_list (cloud_code, username, owner)VALUES ('$code', '$username', '1')");
							$folder = mkdir("files/$code", 0777, true);
							if($query and $folder and $query2)
							{
								$msg = "Inscription réussi.";
							}
							else
							{
								$msg = "Une erreur est survenue contacter un administrateur si le problème persiste.";
							}	
						}
					}
				}
				else
				{
					$msg = "Vérifier les mots de passe";
				}
			}
			else
			{
				$msg = "Vérifier les mots de passe";
			}
		}
		else
		{
			$msg = "Mail Incorrecte.";
		}	
	}
	
if(isset($_POST["login"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$msg = "Les deux champs sont obligatoires.";
		}
		else
		{
			// Define $username and $password
			$login=$_POST['username'];
			$password=$_POST['password'];

			// To protect from MySQL injection
			$login = stripslashes($login);
			$password = stripslashes($password);
			$login = mysqli_real_escape_string($db, $login);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);
			
			//Check username and password from database
			if(preg_match(" /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ ",$login)){
			$sql="SELECT uid FROM users WHERE email='$login' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$mail = $login;
			
			$usernames = mysqli_query($db,"SELECT username FROM users WHERE email='$mail'");
			$usernamel = mysqli_fetch_assoc($usernames);
			$username = $usernamel["username"];
			}
			
			//Check email and password from database
			else{
			$sql="SELECT uid FROM users WHERE username='$login' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$username = $login;
			
			$mails = mysqli_query($db,"SELECT email FROM users WHERE username='$login'");
			$maill = mysqli_fetch_assoc($mails);
			$mail = $maill["email"];
			}
			
			
			
			
			//Search and define status en profil image
			$statust = mysqli_query($db,"SELECT status FROM users WHERE username='$username'");
			$statusl = mysqli_fetch_assoc($statust);
			$status = $statusl["status"];
			
			
			$ppt = mysqli_query($db,"SELECT profil_image FROM users WHERE username='$username'");
			$ppl = mysqli_fetch_assoc($ppt);
			$profil_image = $ppl["profil_image"];
			

			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			 
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username; // Initializing Session
				$_SESSION['status'] = $status;
				$_SESSION['mail'] = $mail;
				$_SESSION['filtre'] = "";
				$_SESSION['profil_image'] = $profil_image;
				
				$_SESSION['norac_connect'] = "e8^C3ir!J999.Ca#L![9yM9sK";
				
				$codet = mysqli_query($db, "SELECT cloud_code FROM cloud_list WHERE username='$username' and owner = 1"); // Initializing Session Code Cloud
				$codel = mysqli_fetch_assoc($codet);
				$cloud_code = $codel["cloud_code"];
				$_SESSION['cloud_code'] = $cloud_code;
				$_SESSION['cloud_default'] = $cloud_code;
				
				header("location: .\ "); // Redirecting To Other Page
			}
			else
			{
				$msg = "Identifiant ou Mot de passe incorrect.";
			}
		}
	}
?>