<?php
include("db.php");


if(isset($_SESSION['username'])) {
	
	if($_SESSION['norac_connect'] == "e8^C3ir!J999.Ca#L![9yM9sK"){

		$user_check = $_SESSION['username'];

		$sql = mysqli_query($db,"SELECT username FROM users WHERE username='$user_check' ");

		$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

		$login_user = $row['username'];
	}
	else{
		header("location: .\logout.php ");
	}



if(isset($_GET["supprimer"])) 
{
include('files.php');
include('addfiles.php');
$accueil = '
		  <!-- Main -->
			
			<section id="main">
				<div class="inner">



				<!-- One -->
					<section id="One" class="wrapper style1">
							<header class="Special">
								<h2></h2>
								<p>Récupérer des Fichiers/Dossiers dans l\'espace de partage</p>
								<h2>Fichier Partager</h2>
							</header>
					</section>

				<!-- Two -->
					<section id="two" class="wrapper style2">
						<div class="inner">
					
							<div class="12u$ 12u$(medium)">
							<form action="" method="post" enctype="multipart/form-data">
								<ul class="actions fit">
									'.$bfiltre.'
								</ul>
							</form>
							</div>
					
							<form action="" method="post" enctype="multipart/form-data" class="Special">
								<div class="recherche">
									<input type="text" name="Recherche" id="Recherche" value="'.$barre.'" placeholder="Recherche" />
								</div>
							</form>
				
				
							<div class="box">
								<div class="content">
									<section class="main">

										<div class="files">
										'. $fichier . '
										</div>
										
									</section>
								</div>
							</div>
							
							<form action="">	
								<input type="submit" value="supprimer" class="button" />
							</form>
							
						</div>
					</section>
					
					'.$addfiles.'
			
				</div>
			</section> ';
}
elseif(isset($_GET["cloud_change"])) {

include('cloud_session.php');
include ("export_code_for_index.php");
include("profil.php");
include("photo-profil.php");
include("info_compte.php");

$accueil = '
	<!-- Main -->
			
	<section id="main">
		<div class="inner">

		<!-- One -->
			<section id="One" class="wrapper style2">
				<div class="inner">
					<header class="align-center padding-2">
					
						'.$photo.'
					
						<h2>'.$nom.'</h2>
					</header>
				</div>
			
				<div class="inner">
					<div class="box">
						<div class="content">
							<h3>Mon compte :</h3>
							'.$info_compte.'
						</div>
					</div>
					'.$table.'
				</div>
			
			
			<!-- One -->
					
						<header>
							<h2></h2>
							<h2>Votre Cloud Code : '.$_SESSION["cloud_default"].'</h2>
						</header>
					

				<!-- Two -->
					<section id="two" class="wrapper style1">
						
						<div class="inner">	
						<div class="box">
						<div class="content">
							<ul class="actions fit center">
								<li >
									<div class="left-position alt">

											<h2>Rejoindre un Cloud</h2>
											<br>
											<p>Pour rejoindre un Cloud, écrivez le code cloud du Cloud que vous voulez rejoindre.</p>
											<br />
											<form action="" method="post" enctype="multipart/form-data">
													<dl>
														<input type="text" name="code" id="code" value="" placeholder="Ajouter le cloud code" maxlength="10" class="alt-color" required />
													</dl>
													<dl>
														<input type="submit" value="ajouter" name="ajouter" class="button special fit" />
													</dl>
											</form>
									</div>
								</li>
								<li>
									<div class="left-position alt">
											<h2>Changer de Cloud</h2>
											<br>
											<p>Vous pouvez naviguer entre les Clouds pour se faire sélectionner le code cloud, puis cliquer sur Changer</p>
											<br />
											<form action="" method="post" enctype="multipart/form-data">
													<dl class="select-wrapper">
														<select name="code_cloud" id="code_cloud" class="alt-color">
															<option value="'. $_SESSION['cloud_code'] .'" class="select_option "> '. $_SESSION['cloud_code'] .' (Cloud Actuelle)</option>
															'. $code_change.'
														</select>
													</dl>
													<dl>
														<input type="submit" value="changer" name="changer" class="button special fit" />
													</dl>
											</form>
									</div>
								</li>
							</ul>
							
							<ul class="actions fit center">
								<li>
									<div class="left-position alt">
											<h2>Quitter un Cloud</h2>
											<br>
											<p>Vous pouvez quitter un cloud, sélectionner le code cloud et réécriver le, puis cliquer sur quitter.</p>
											<br />
											<br />
											<form action="" method="post" enctype="multipart/form-data">
												<dl>
													<div class="row uniform">
														<div class="6u 12u$(xsmall)">
															<input type="text" name="code_exit" id="code_exit" value="" placeholder="Validation Code" class="alt-color" required />
														</div>
														<div class="6u$ 12u$">
															<div class="select-wrapper">
																<select name="code_leave" id="code_leave">
																	'. $code_leave.'
																</select>
															</div>
														</div>
													</div>
												</dl>
												<dl><input type="submit" value="quitter" name="quitter" class="button special fit" /></dl>
											</form>
									</div>
								</li>
						
								<li>
									<div class="left-position alt">
											<h2>Gérer votre Cloud</h2>
											<br>
											<p>Vous pouvez gérer votre cloud, afin de supprimer des participants indésirable ou perturbateur, pour se faire sélectionner le nom de l\'utilisateur et réécriver-le, puis cliquer sur supprimer.</p>
											<form action="" method="post" enctype="multipart/form-data">
												<dl>
													<div class="row uniform">
														<div class="6u 12u$(xsmall)">
															<input type="text" name="username" id="username" value="" placeholder="Validation Username" class="alt-color" required />
														</div>
														<div class="6u$ 12u$">
															<div class="select-wrapper">
																<select name="account" id="account">
																	'.$code_kick.'
																</select>
															</div>
														</div>
													</div>
												</dl>
												<dl><input type="submit" value="supprimer" name="supprimer" class="button special fit" /></dl>
											</form>
									</div>
								</li>
								
						</div>
						</div>
						'.$option_admin.'
						</div>
					</section>
			
		</div>
	</section>
';
}
else
{
include('files.php');
include('addfiles.php');
include ("export_code_for_index.php");
$accueil = '
		  <!-- Main -->
			
			<section id="main">
				<div class="inner">



				<!-- One -->
					<section id="One" class="wrapper style1">
							<header class="Special">
								<h2></h2>
								<p>Récupérer des Fichiers/Dossiers dans l\'espace de partage</p>
								<h2>Fichier Partager</h2>
							</header>
					</section>

				<!-- Two -->
					<section id="two" class="wrapper style2">
						<div class="inner">
					
							<div class="12u$ 12u$(medium)">
							<form action="" method="post" enctype="multipart/form-data">
								<ul class="actions fit">
									'.$bfiltre.'
								</ul>
							</form>
							</div>
					
							<form action="" method="post" enctype="multipart/form-data" class="Special">
								<div class="recherche">
									<input type="text" name="Recherche" id="Recherche" value="'.$barre.'" placeholder="Recherche" />
								</div>
							</form>
				
				
							<div class="box">
								<div class="content">
									<section class="main">

										<div class="files">
										'. $fichier . '
										</div>
										
									</section>
								</div>
							</div>
							
							<div class="row uniform">
							<div class="6u 12u$(xsmall)">
							<form action="" method="get" enctype="multipart/form-data">		
								<input type="submit" value="supprimer" name="supprimer" class="supbutton" />
							</form>
							</div>
							
							<div class="6u 12u$(xsmall)">
								<form action="" method="post" enctype="multipart/form-data">
								<div class="row uniform">
									<div class="8u 12u$(xsmall)">
										
											<ul class="actions fit">
											<li class="select-wrapper">
												<select name="code_cloud" id="code_cloud" class="alt-color">
													<option value="'. $_SESSION['cloud_code'] .'" class="select_option "> '. $_SESSION['cloud_code'] .' (Cloud Actuelle)</option>
														'. $code_change.'
												</select>
											</li>
									</div>	
									<div class="4u 12u$(xsmall)">
												<input type="submit" value="changer" name="changer" class="button special fit" />
										
									</div>
								</div>
								</form>
							</div>
							</div>
						</div>
					</section>
					
					'.$addfiles.'
			
				</div>
			</section> ';
}
}else{
		
	
	$accueil ='
		<!-- Main -->
			<section id="main">
				<div class="inner">

				<!-- One -->
					<section id="one" class="wrapper style1">

						<header class="special">
							<h2>Partage de Fichiers</h2>
							<p>Une platforme de partages disponible à tous</p>
						</header>

					</section>

				<!-- Two -->
					<section id="two" class="wrapper style2">
					
						<header>
							<h2>Connecter vous</h2>
							<p>Afin de partager ou non les fichiers avec vos collèges</p>
						</header>
						
						<div class="content">
							<ul class="actions fit center">
								<li>
									<div class="box center">
										<div class="12u$ 6u$(medium)">	
												<h2>Insciption</h2>
												<br>
												<p>Lors de votre inscription :</p>
												<br>
												<p>Inscrivez-vous afin de stocker vos fichiers et partagez par la même occasion votre cloud avec vos amis pour qu\'ils puissent vous envoyer ou récupérer des documents.</p>
												<br />
											<form action="" method="get" enctype="multipart/form-data">			
												<input type="submit" value="insciption" name="insciption" class="button special fit" />
											</form>
										</div>
									</div>
								</li>
								<li>
									<div class="box center">
										<div class="12u$ 6u$(medium)">	
											<h2>Connexion</h2>
											<br>
											<p>Lors de votre connexion :</p>
											<br>
											<p>Vous pourrez choisir de rejoindre un espace de partage en saisissant un code, si vous ne possédez aucun code, un espace de partage vous sera automatiquement générer lors de votre première connexion.</p>
											<form action="" method="get" enctype="multipart/form-data">			
												<input type="submit" value="connexion" name="connexion" class="button special fit" />
											</form>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</section>


				</div>
			</section>';
}
if(isset($_GET["insciption"])) {
		include ("connect.php");
		$accueil ='
			<section id="main">
				<div class="inner">		
					
					
					<section id="two" class="wrapper style2">
					
					
						<header>
							<h2>Insciption</h2>
							<p>Afin de partager ou non les fichiers avec vos collèges</p>
						</header>
						
						<div class="content">
							<div class="box center">
								<div class="12u$ 6u$(medium)">	
										<h2>Insciption</h2>
									
									<form method="post" action="" enctype="multipart/form-data">
									<div class="row uniform">
										<div class="12u$">
											<input type="text" name="username" id="username" value="" placeholder="Pseudo" required />
										</div>
										<div class="12u$">
											<input type="email" name="email" id="email" value="" placeholder="Email" required />
										</div>
										<div class="12u$">
											<input type="password" name="password" id="password" value="" placeholder="Mot de passe" required />
										</div>
										<div class="12u$">
											<input type="password" name="confpass" id="confpass" value="" placeholder="Confirmer Mot de passe" required />
										</div>
										<!-- Break -->
										<div class="12u$">
												<input type="submit" name="signup" value="Inscription" class="button special fit"/>
												<a class="center" id="msg">'.$msg.'</a>
										</div>
									</div>
								</form>
								</div>
							</div>
							
							<div class="box">
							<div class="content">
								<h3> Important: </h3>
								Le nouveau Mot de Passe doit absolument contenir deux types de caractère :
								<br>    - Chiffre
								<br>    - Minuscule / Majuscule
								<br>    - Caractères spéciaux
								<br>
								<br> Le code d\'espace de partage est celui cloud sur lequel vous voulez envoyer des fichiers. 
								<br> Si vous laissez la case vide, un code vous seras fournie une fois connecter.
							</div>
							</div>
						</div>
					</section>
					
				</div>
			</section>
		';
	}
if(isset($_GET["connexion"])) {
		include ("connect.php");
		$accueil ='
			<section id="main">
				<div class="inner">		
					
					
					<section id="two" class="wrapper style2">
					
					
						<header>
							<h2>Connexion</h2>
							<p>Afin de partager ou non les fichiers avec vos collèges</p>
						</header>
						
						<div class="content">
							<div class="box center">
								<div class="12u$ 6u$(medium)">	
										<h2>Connexion</h2>
									
									<form method="post" action="" enctype="multipart/form-data">
									<div class="row uniform">
										<div class="12u$">
											<input type="text" name="username" id="username" value="" placeholder="Pseudo" required />
										</div>
										<div class="12u$">
											<input type="password" name="password" id="password" value="" placeholder="Mot de passe" required />
										</div>
										<!-- Break -->
										<div class="12u$">
												<input type="submit" name="login" value="Connexion" class="button special fit"/>
												<a class="center" id="msg">'.$msg.'</a>
										</div>
									</div>
								</form>
								</div>
							</div>
						</div>
					</section>
					
				</div>
			</section>
		';
	}

echo $accueil;
?>