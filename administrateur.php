<?php
	include("h&f.php");
	include("check.php");
	include("option_admin.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>SIO Cloud</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		<link rel="shortcut icon" href="./assets/icons/favicon.png" />
		<link rel="stylesheet" href="assets/css/main.css" />
	
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<ul class="actions center">
						<li><form action="index.php" method="get"><input type="submit" value="Mon Compte" name="cloud_change" class="button special fit" /></form></li>
						<li>
 							<header id="header">
								<div class="logo "><a href="index.php">SIO Cloud <span>by LD~RENDER</span></a></div>
							</header>
						</li>
						<li>
							<form action="./logout.php">			
								<input type="submit" value="Deconnexion" class="button special fit" />
							</form>
						</li>
				</ul>
			</header>
	<body>
	
	<section id="main">
		<div class="inner">

		<!-- One -->
			<section id="One" class="wrapper style2">
				<header class="Special">
					<h2></h2>
					<p>Page d'administration du site SIO CLOUD</p>
					<h2><?php echo $_SESSION['username']; ?></h2>
					</header>
			
				<div class="inner">				
					<div class="content">
							
						<div>
							<div class="box">
							<div class="content">
							<h3>Upgrade Compte</h3>
								<form method="post" action="">
									<div class="row uniform">
										<div class="6u 12u$(xsmall)">
											<input type="text" name="username" id="username" value="" placeholder="Username" required />
										</div>
										<div class="6u$ 12u$">
											<div class="select-wrapper">
												<select name="statue" id="statue">
													<option value="user">Utilisateur</option>
													<option value="admin">Administrateur</option>
												</select>
											</div>
										</div>
										<!-- Break -->
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" name="upstat" value="Upgrade" class="button special fit" /></li>
												<li><a colspan="2" align="center" class="error"><?php echo $msg;?></a></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
							</div>
						</div>
						
						<div>
							<div class="box">
							<div class="content">
							<h3>Supprimer Compte</h3>
								<form method="post" action="">
									<div class="row uniform">
										<div class="6u 12u$(xsmall)">
											<input type="text" name="username" id="username" value="" placeholder="Username" required />
										</div>
										<div class="6u$ 12u$">
											<div class="select-wrapper">
												<select name="account" id="account">
													<?php
														echo $exportname;
													?>
												</select>
											</div>
										</div>
										<!-- Break -->
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" name="delacc" value="Supprimer" class="button special fit" /></li>
												<li><a colspan="2" align="center" class="error"><?php echo $msgd;?></a></li>
											</ul>
										</div>
									</div>
								</form>
							</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>

			
		</div>
	</section>
			
		<!-- Footer -->
		<?php echo "$footer"; ?>

	</body>
</html>