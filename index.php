
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
//register_shutdown_function('shutDownFunction');
@session_start();

require_once 'main/include.php';


if (!isset($_GET['m']) || empty($_GET['m'])) {
	$m = "vitrine";
} else {
	$m = $_GET['m'];
}

switch ($m) {
	case "vitrine":
		beginHTML();
		require_once 'content/vitrine.php';
		endHTML();
		exit();
	default:
		exit();
}

function beginHTML() {
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>todo</title>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<link rel="icon" type="image/x-icon" href="img/favicon.ico">

			<link rel="stylesheet" href="css/bootstrap.min.css" />

			<link href="css/flat-ui.min.css" rel="stylesheet" type="text/css" />

			<link href="css/style.css" rel="stylesheet" type="text/css" />
			<link href="css/oeuvre.css" rel="stylesheet" type="text/css" />
			<link href="css/oeuvre_list.css" rel="stylesheet" type="text/css" />
			<link href="css/fiche.css" rel="stylesheet" type="text/css" />
		</head>
		<body>
		
		<script>
	window.onload = function () {
		
		setAffichage('list2');
		
		onLoad();
	};
</script>
		
<nav>
<!--
	<div class="nav_item nav_left a" onclick="smooth_show($('#apropos-modal'));">
		<img class="logo" src="todo" alt="">
	</div>
	-->
	<div class="nav_middle row">
		<a class="nav_item a" href="index.php">
			Accueil
		</a>
	</div>
	<div class="nav_item nav_right">
		<div class="head-sc nav_item a">
			<div class="sc-log not-log">
				<div class="sc_green">
					<img src="img/icones/sc/sc_logo_1.png" class="sc_green_1"/>
					<img src="img/icones/sc/sc_logo_2.png" class="sc_green_2"/>
					<span class="fui-cross sc_green_not_access sc_not_accessible error"></span>
				</div>
				<div class='deco-btn'>
					<span class="gog-btn" onclick="deconnexion();"><span class="fui-exit"></span></span>
				</div>
				<a class='sc-log-content' target='_blank'>
					Se connecter
				</a>
				<form action="#" method="POST" class="sc-log-form gog-form smooth" id='sc-log-form'>
					<div class="sc-log-form-tip"></div>
					<h2 class="gog-form-title"><!--<i class="sc-logo"></i>-->Connexion</h2>
					<ol class="gog-fieldset">
						<li class="gog-field">
							<input type="email" name="email" required="required" placeholder="Email" class="gog-input"/>
						</li>
						<li class="gog-field">
							<input type="password" name="pass" required="required" placeholder="Mot de passe" class="gog-input" maxlength="4096"/>
						</li>
						<li class="gog-field">
							<button type="submit" name="submit" class="gog-btn-big gog-active ">Se connecter maintenant</button>
						</li>
					</ol>
					<p class="gog-form-description sc-log-form-error error"></p>
					<p class="gog-form-description">
					
					</p>
					<div class="gog-form-footer">
						<div class="gog-form-section">
							<a class="gog-btn-big" href="#">Réinitialiser le mot de passe</a>
						</div>
						<div class="gog-form-section">
							<a class="gog-btn-big" href="?m=inscription">Je n'ai pas de compte</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</nav>
<span id='alpha'>v0.2a</span>

<div id="all">


		
			<?php
		}

		function endHTML() {
			?>
</div>
			<div id="alerts">
			</div>
			<script src="js/jquery-2.2.1.min.js"></script>
			<script src="js/flat-ui.min.js"></script>

			
			<script src="js/ajax.js"></script>
			<script src="js/alert.js"></script>
			<script src="js/init.js"></script>
			<script src="js/vitrine.js"></script>
			<script src="js/first.js"></script>
			<script src="js/sc.js"></script>
			<script src="js/recherche.js"></script>
			<script src="js/affichage.js"></script>
			<script src="js/form.js"></script>
			<script src="js/vlc.js"></script>
			
		</body>
	</html>
	<?php
}
