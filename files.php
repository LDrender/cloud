<?php  
 
include("db.php");


if(isset($_POST["Recherche"])) {
	$recherche = $_POST["Recherche"];
	$barre = $recherche;
}
else{
	$recherche = "";
	$barre = $recherche;
}
$recherche = "'%" .$recherche ."%'";



if(isset($_POST["filtre"])) {

		$filtre = $_POST["filtre"];

	if($_POST["filtre"] == $_SESSION['filtre']){
		$filtre = "";
		$_SESSION['filtre'] = "";
		}

	
	$_SESSION['filtre'] = $filtre;
}else{$filtre = $_SESSION['filtre'];}

$code_cloud = $_SESSION['cloud_code'];

$sfiltre = "'%" .$filtre ."%'";


$combo3 = mysqli_query($db,"SELECT uid, username, idfiles, libelle, type, size ,extension FROM files_data WHERE (username like $recherche or libelle like $recherche or type like $recherche or extension like $recherche) and type like $sfiltre and cloud_code = '$code_cloud' ");

$table = array();

$repertoire = "files/". $code_cloud . "/" ;


$total = mysqli_query($db,"SELECT COUNT(idfiles) as NbrFiles FROM files_data WHERE (username like $recherche or libelle like $recherche or type like $recherche or extension like $recherche) and type like $sfiltre and cloud_code = '$code_cloud' ");
$total = mysqli_fetch_assoc($total);
$total = $total["NbrFiles"];

$nombre = (intval($total / 3));// Nombre d'images a afficher par ligne

if(isset($_GET["supprimer"])) 
{
	for ($i = 0; $i < $total;) {
	$row3 = mysqli_fetch_assoc($combo3);
		
	$type = $row3['extension'];
	
	$ico = "assets/icons/others.png";
	
	if ($type == "txt" || $type == "pdf" || $type == "docx" || $type == "odt" || $type == "pptx"){
		$ico = "assets/icons/fichier.png";
	}
	elseif ($type == "png" || $type == "jpeg" || $type == "jpg" || $type == "gif"){
		$ico = "assets/icons/image.png";
	}
	elseif ($type == "ods" || $type == "xlsx" || $type == "xls"){
		$ico = "assets/icons/calcul.png";
	}
	elseif ($type == "zip" || $type == "rar" || $type == "7z"){
		$ico = "assets/icons/archive.png";
	}
	elseif ($type == "ogg" || $type == "mp3"){
		$ico = "assets/icons/musique.png";
	}
	elseif ($type == "avi" || $type == "mp4"){
		$ico = "assets/icons/video.png";
	}
	$i++;
	
    $image = '
<a id="'.$row3["libelle"].'" onclick="confdel(\''.$row3["libelle"].'\')"><img src="'.$ico.'" alt="" /><h3>'.$row3["libelle"].'</h3></a>
	';

		$table[] = $image;

  }
}
else
{
	for ($i = 0; $i < $total;) {
	$row3 = mysqli_fetch_assoc($combo3);
		
	$type = $row3['extension'];
	
	$ico = "assets/icons/others.png";
	
	if ($type == "txt" || $type == "docx" || $type == "odt" || $type == "pptx"){
		$ico = "assets/icons/fichier.png";
	}
	elseif ($type == "png" || $type == "jpeg" || $type == "jpg" || $type == "gif"){
		$ico = "assets/icons/image.png";
	}
	elseif ($type == "ods" || $type == "xlsx" || $type == "xls"){
		$ico = "assets/icons/calcul.png";
	}
	elseif ($type == "zip" || $type == "rar" || $type == "7z"){
		$ico = "assets/icons/archive.png";
	}
	elseif ($type == "ogg" || $type == "mp3"){
		$ico = "assets/icons/musique.png";
	}
	elseif ($type == "avi" || $type == "mp4"){
		$ico = "assets/icons/video.png";
	}
	elseif ($type == "pdf"){
		$ico = "assets/icons/pdf.png";
	}
	$i++;
	
    $image = '<a href="'.$repertoire.$row3["libelle"].'" download><img src="'.$ico.'" alt="" /><h3>'.$row3["libelle"].'</h3></a>';

		$table[] = $image;

  }
}
	
// On affiche le tableau avec les images

$fichier = implode("\n", $table). "\n";





// Barre de filtre
if ($filtre == "document"){
	$bfiltre = 		'
							<li><input type="submit" value="document" name="filtre" class="button fit" /></li>
							<li><input type="submit" value="image" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="archive" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="musique" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="video" name="filtre" class="button special fit" /></li>
				';
}
elseif($filtre == "image"){
	$bfiltre = 		'
							<li><input type="submit" value="document" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="image" name="filtre" class="button fit" /></li>
							<li><input type="submit" value="archive" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="musique" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="video" name="filtre" class="button special fit" /></li>
				';
}
elseif($filtre == "calcul"){
	$bfiltre = 		'
							<li><input type="submit" value="document" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="image" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="archive" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="musique" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="video" name="filtre" class="button special fit" /></li>
				';
}
elseif($filtre == "archive"){
	$bfiltre = 		'
							<li><input type="submit" value="document" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="image" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="archive" name="filtre" class="button fit" /></li>
							<li><input type="submit" value="musique" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="video" name="filtre" class="button special fit" /></li>
				';
}
elseif($filtre == "musique"){
	$bfiltre = 		'
							<li><input type="submit" value="document" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="image" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="archive" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="musique" name="filtre" class="button fit" /></li>
							<li><input type="submit" value="video" name="filtre" class="button special fit" /></li>
				';
}
elseif($filtre == "video"){
	$bfiltre = 		'
							<li><input type="submit" value="document" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="image" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="archive" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="musique" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="video" name="filtre" class="button fit" /></li>
				';
}
else {$bfiltre = 		'
							<li><input type="submit" value="document" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="image" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="archive" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="musique" name="filtre" class="button special fit" /></li>
							<li><input type="submit" value="video" name="filtre" class="button special fit" /></li>
				';
}
?>
