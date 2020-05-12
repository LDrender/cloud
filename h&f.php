<?php 
ini_set('display_errors','on');
$header = '
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
				<div class="logo"><a href="index.php">SIO Cloud <span>by LD~RENDER</span></a></div>
			</header>
';

$footer = '
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="https://twitter.com/DrimS__"				class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://www.instagram.com/ld.render/"  	class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; <a href="https://www.instagram.com/ld.render/">LD~RENDER</a>. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/button.delete.js"></script>
';

session_start();

if(isset($_SESSION['username'])) {
	
	if(isset($_GET["cloud_change"])) {
	$header = '
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
						<li><form action=""><input type="submit" value="retour" class="button fixe "/></form></li>
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
	
	';
	}
	else{
	$header = '
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
						<li>
							<form action="" method="get" enctype="multipart/form-data">			
								<input type="submit" value="Mon Compte" name="cloud_change" class="button special fit" />
							</form>
						</li>
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
	
';
}
}



if(isset($_GET["insciption"])) {

$header = '
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
						<li><form action=""><input type="submit" value="retour" class="button fixe "/></form></li>
						<li>
							<header id="header">
								<div class="logo "><a href="index.php">SIO Cloud <span>by LD~RENDER</span></a></div>
							</header>
						</li>
						<li>
							<form action="" method="get" enctype="multipart/form-data">			
								<input type="submit" value="connexion" name="connexion" class="button special fit" />
							</form>
						</li>
				</ul>
			</header>
	
';
}

if(isset($_GET["connexion"])) {

$header = '
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
						<li><form action=""><input type="submit" value="retour" class="button fixe "/></form></li>
						<li>
							<header id="header">
								<div class="logo "><a href="index.php">SIO Cloud <span>by LD~RENDER</span></a></div>
							</header>
						</li>
						<li>
							<form action="" method="get" enctype="multipart/form-data">			
								<input type="submit" value="insciption" name="insciption" class="button special fit" />
							</form>
						</li>
				</ul>
			</header>
	
';
}




?>