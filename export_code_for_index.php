<?php
	include ("db.php");	
	$username = $_SESSION['username'];
	
/* -------------------------------------------------------- */
/* ----- Lister les code clouds pour changer de cloud ----- */
	
$reponse_code_change = mysqli_query($db, "SELECT cloud_code FROM cloud_list WHERE username='$username'");
	
$table_change = array();
	
	
while ($donnees_change = mysqli_fetch_array($reponse_code_change)){
    $codelist_forchange = '
	<option value="'. $donnees_change['cloud_code'].'" class="select_option"> '.$donnees_change['cloud_code'].'</option>
	';       
	$table_change[] = $codelist_forchange;
};
 
$code_change = implode("\n", $table_change). "\n";





/* ------------------------------------------------------------ */
/* ----- Lister les users de mon clouds pour les exclure  ----- */

$cloud_code_default = $_SESSION['cloud_default'];
$reponse_kick = mysqli_query($db, "SELECT username FROM cloud_list WHERE cloud_code = '$cloud_code_default' and owner = 0");

$table_kick = array();

while ($donnees_kick = mysqli_fetch_array($reponse_kick)){
	$codelist_forkick = '
	<option value="'. $donnees_kick['username'].'" class="select_option"> '.$donnees_kick['username'].'</option>
	';       
	$table_kick[] = $codelist_forkick;
};

$code_kick = implode("\n", $table_kick). "\n"; 
 
 
 
 
 
/* ---------------------------------------------------------------- */
/* ----- Lister les code clouds pour pouvoir quitter le cloud ----- */
$reponse_leave = mysqli_query($db, "SELECT cloud_code FROM cloud_list WHERE username='$username' and owner = '0'");
	
$table_leave = array();
	
	while ($donnees_leave = mysqli_fetch_array($reponse_leave)){
	$codelist_forleave = '
	<option value="'. $donnees_leave['cloud_code'].'" class="select_option"> '.$donnees_leave['cloud_code'].'</option>
	';       
	$table_leave[] = $codelist_forleave;
};


$code_leave = implode("\n", $table_leave). "\n"; 



if(isset($_POST["changer"])) 
{
	$_SESSION["cloud_code"] = $_POST["code_cloud"];
	header("Location: .\ ");
}
?>