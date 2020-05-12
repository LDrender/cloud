<?php  

include("db.php");
session_start();

$error = "";



if(isset($_GET["nameFiles"])){
	
		$fichier = $_GET["nameFiles"];
	
		$code_cloud = $_SESSION['cloud_code'];

		$target_dir = "files/" . $code_cloud . "/";
		$target_file = $target_dir . $fichier;
		
		
		
		if (file_exists($target_file)) {

			$query = mysqli_query($db, "DELETE FROM files_data WHERE libelle = '$fichier'");
			$delete = unlink ($target_file);
			
			if($query and $delete){
				header("Location: .\?supprimer=supprimer");
				$error = "Fichier supprimer";
			}
			else {
				$error = "Un problème est survenue lors de la suppression";
			}
		}
		else {
				$error = 'Le fichier "' . $fichier . '" est introuvable contacter un administrateur !';
			}

}


?>

