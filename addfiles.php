<?php
$doc = rand(1, 12);

include ("db.php");

$msg = "";

if(isset($_POST["upload"])) {	
	
$code_cloud = $_SESSION['cloud_code'];
	
$target_dir = "files/" . $code_cloud . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

	$user_session = $_SESSION['username'];

	#Aller chercher le ID users sur le serveur SQL
	$uid = mysqli_query($db,"SELECT uid FROM users WHERE username='$user_session'");
	$uid = mysqli_fetch_assoc($uid);
	$uid = $uid["uid"];

	$username = $user_session;

	$libelle = basename($_FILES['fileToUpload']['name']);
	
	$type = "others";
	
	$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if ($extension == "txt" || $extension == "pdf" || $extension == "docx" || $extension == "docx" || $extension == "odt" || $extension == "pptx"){
		$type = "document";
	}
	elseif ($extension == "png" || $extension == "jpeg" || $extension == "jpg" || $extension == "gif"){
		$type = "image";
	}
	elseif ($extension == "ods" || $extension == "xlsx" || $extension == "xls"){
		$type = "document";
	}
	elseif ($extension == "zip" || $extension == "rar" || $extension == "7z"){
		$type = "archive";
	}
	elseif ($extension == "ogg" || $extension == "mp3"){
		$type = "musique";
	}
	elseif ($extension == "avi" || $extension == "mp4"){
		$type = "video";
	}

	$size = basename($_FILES['fileToUpload']['size']);

	//Check username and password from database


// Check if file already exists
if (file_exists($target_file)) {
    $msg = "Fichier déjà existant.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1073741824) {
    $msg = "Fichier trop volumineux";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	$msg = "Problème de transféré";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
		$query = mysqli_query($db, "INSERT INTO files_data (uid, username, libelle, type, size, extension, cloud_code)VALUES ('$uid', '$username', '$libelle', '$type', '$size', '$extension', '$code_cloud')");
		
			if($query){
				$msg = "Fichier transféré";
				header("location: .\?addfiles=%2B");
			}
			else {
				$msg = "Problème de transféré";
			}
    }
}

}

if(isset($_GET["addfiles"])) {
		$addfiles ='
		<div class="boxadd">
			<h2>Add Files</h2>
			<form action="" method="post" enctype="multipart/form-data">
				<div>
					<label for="fileToUpload" class="button alt icon file fa-download">Choisir un Fichier</label>
					<input class="input-file" type="file" name="fileToUpload" id="fileToUpload" required />
				</div>
				<!-- Break --> 
				<div>
					<input class="button fit" type="submit" value="Upload Image" name="upload">
					<a>'. $msg .'</a>
				</div>
			</form>
		</div>
		<form action="">
			<input type="submit" value="–" class="addbutton addfile"/>
		</form>
		';
	}else{
		$addfiles ='
		<form action="" method="get" enctype="multipart/form-data">			
			<input type="submit" value="+" name="addfiles" class="addbutton addfile" />
		</form>
		';
	}
?>