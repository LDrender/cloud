<?php 



if(isset($_POST['up'])){
	$part = 1;
	$info_compte = "
	<form method='post' action=''>
		<div class='row uniform'>
			<div class='4u$ 12u$(xsmall)'>
				<input type='text' name='pseudo' id='pseudo' value='".$nom."' placeholder='Pseudo' readonly />
			</div>
		</div>
	</form>
	<form method='post' action=''>
		<div class='row uniform'>
			<div class='4u 12u$(xsmall)'>
				<input type='email' name='email' id='email' value='' placeholder='Ancien Email' required />
			</div>
			<div class='4u 12u$(xsmall)'>
				<input type='email' name='confemail' id='confemail' value='' placeholder='Nouveau Email' required />
			</div>
			<div class='4u 12u$(xsmall)'>
				<input type='submit' value='Modifier' name='upmail' class='button special' />
			</div>
		</div>
	</form>
	<form method='post' action=''>
		<div class='row uniform'>
			<div class='4u 12u$(xsmall)'>
				<input type='password' name='oldpassword' id='oldpassword' value='' placeholder='Ancien Mot de passe' required />
			</div>
			<div class='4u 12u$(xsmall)'>
				<input type='password' name='newpassword' id='newpassword' value='' placeholder='Nouveau Mot de passe' required />
			</div>
			<div class='4u 12u$(xsmall)'>
				<input type='submit' value='Modifier' name='uppwd' class='button special' />
			</div>
		</div>
	</form>
	<form action='' method='get' enctype='multipart/form-data'>			
		<input type='submit' value='Cancel' name='cloud_change' class='supbutton' />
	</form>";
}
else
{
	$info_compte =
	"<div class='row uniform'>
	<div class='4u$ 12u$(xsmall)'>
		<input type='text' name='pseudo' id='pseudo' value='".$nom."' placeholder='Pseudo' readonly />
	</div>
	<div class='4u$ 12u$(xsmall)'>
		<input type='email' name='email' id='email' value='".$mail."' placeholder='Email' readonly />
	</div>
	<div class='4u$ 12u$(xsmall)'>
		<input type='password' name='name' id='name' value='' placeholder='Mot de passe' readonly />
	</div>
	<form method='post' action=''>
		<div class='4u$ 12u$(xsmall)'>
			<input type='submit' value='Modifier' name='up' class='button special'/>
		</div>
	</form>
			<div class='4u$ 12u$(small)'>
				".$msg.$error."
			</div>
	</div>";
}



/* --------- Info Changement de Mot De Passe --------- */
if($part == 1){ 
$table = "
<div class='box'>
	<div class='content'>
		<h3> Important: </h3>
		Le nouveau Mot de Passe dois absolument contenir deux type de caractère :
		<br>    - Chiffre
		<br>    - Minuscule / Majuscule
		<br>    - Caratères spéciaux
		</p>
		Pour la photo de profil utiliser une image en 200 x 200.
		</p>
	</div>
</div>";
}
else{
$table = "";
}

if($_SESSION['status'] == "admin" or $_SESSION['status'] == "super_admin"){
	$option_admin ='
	<form action="administrateur.php" enctype="multipart/form-data">			
		<input type="submit" value="Option Administrateur" name="Option Administrateur" class="button fit supbutton" />
	</form>';
}
else{
	$option_admin ='';
}

?>