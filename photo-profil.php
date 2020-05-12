<?php


$editeur = $_SESSION['username'];
$target_dir = "files/profils_images/";
$error = "";


if(isset($_POST["upphoto"])) {	
	
	
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


$oldname = $target_dir .basename($_FILES['fileToUpload']['name']);
$newname = $target_dir .$editeur .'.' .$imageFileType;
$namefiles = $editeur .'.' .$imageFileType;

$maxWidth = 200;
$maxHeight = 200;



// Check if image file is a actual image or fake image
if(isset($_POST["upphoto"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $error = "Le fichier est une image - " . $check["mime"] . ".";
		list($width, $height) = $check;
        $uploadOk = 1;
    } else {
        $error = "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $error = "Désolé, veuillez changer le nom avant de l'exporter.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    $error = "Désolé, votre fichier est trop volumineux.";
    $uploadOk = 0;
}
if ($width > $maxWidth || $height > $maxHeight) {
	$error = "Désolé, votre fichier est trop grande.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés..";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $err = "Désolé, votre fichier n'a pas été téléchargé.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $error = "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " a été téléchargé.";
		if ($exist == 1){
		unlink("files/profils_images/$pp");
		}
		rename("$oldname", "$newname");
		mysqli_query($db, "UPDATE users SET profil_image = '$namefiles' WHERE username='$editeur'");
		$_SESSION['profil_image'] = $namefiles;
		header("Location: .\?cloud_change=Cloud+List ");
    } else {
        $error = "Désolé, une erreur s'est produite lors de l'envoi de votre fichier..";
    }
}

}
?>