<?php

$status = $_SESSION['status'];
if ($status == "user") {
header("location: logout.php");
}
elseif ($status == "admin" or $status == "super_admin"){}
else{ 
header("location: logout.php");
}

	$msg = "";
	$msgd = "";
	
	$table_users = array();
	
		$reponse = mysqli_query($db, "SELECT username FROM users WHERE status != 'super_admin'");

		while ($donnees = mysqli_fetch_array($reponse)){
		$users = '
		<option value="'. $donnees['username'].'" class="select_option"> '.$donnees['username'].'</option>
		'; 
 
		$table_users[] = $users;
		};
		$exportname = implode("\n", $table_users). "\n"; 
		
	
	
	if(isset($_POST["upstat"])){
		
		$username = $_POST["username"];
		$statue = $_POST["statue"];

		$username = mysqli_real_escape_string($db, $username);

		$sql="SELECT username FROM users WHERE username='$username'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
			if(mysqli_num_rows($result) == 0)
			{
				$msg = "Utilisateur introuvable.";
			}
			else
			{
				$query = mysqli_query($db, "UPDATE users SET status = '$statue' WHERE username='$username'");
				if($query)
				{
					$msg = "Modification Effectuer.";
				}
			}	
	}
	elseif(isset($_POST["delacc"])){
		
		
		
		$username = $_POST["username"];
		$account = $_POST["account"];

		$username = mysqli_real_escape_string($db, $username);

		$sql="SELECT username FROM users WHERE username='$username'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		
			if(mysqli_num_rows($result) == 0)
			{
				$msgd = "Utilisateur introuvable.";
			}
			elseif ($username == $account)
			{
				$code_users_dell = mysqli_query($db, "SELECT cloud_code FROM cloud_list WHERE username='$username' and owner = '1'");
				$code_users_dell= mysqli_fetch_assoc($code_users_dell);
				$code_users_dell = $code_users_dell['cloud_code'];
				
				$pp = mysqli_query($db, "SELECT profil_image FROM users WHERE username='$username'");
				$pp= mysqli_fetch_assoc($pp);
				$pp = $pp['profil_image'];
				
				$del_folder = "./files/".$code_users_dell;
				
				$query = mysqli_query($db, "DELETE FROM users WHERE username='$username'");
				
				$query2 = mysqli_query($db, "DELETE FROM cloud_list WHERE cloud_code = '$code_users_dell'");
				
				$query3 = mysqli_query($db, "DELETE FROM cloud_list WHERE username='$username'");
				
				$query4 = mysqli_query($db, "DELETE FROM files_data WHERE cloud_code = '$code_users_dell' ");

				rmdir($del_folder);
				
				if($pp != 'User_Avatar.png'){
				unlink("./files/profils_images/$pp");
				}

				if($query and $query2 and $query3 and $query4)
				{
					$msgd = "Suppression Effectuer.";
				}
			}	
			else
			{
					$msgd = "Utilisateur non Identique.";
			}	
	}
?>
