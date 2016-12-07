
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

@session_start();
require_once 'main/include.php';

if (!isset($_GET['m']) || empty($_GET['m'])) {
	$m = "vitrine";
} else {
	$m = $_GET['m'];
}

switch ($m) {
	case "connexion":
		require_once 'content/client/connexion.php';
		vitrine();
	case "deconnexion":
		unset($_SESSION['client']);
		vitrine();
	case "inscription":
		require_once 'content/client/inscription.php';
		vitrine();
	case "vitrine":
		vitrine();
	case "produit":
		beginHTML();
		require_once 'content/affichage_produit.php';
		endHTML();
		exit();
	case "panier":
		beginHTML();
		require_once 'content/affichage_panier.php';
		endHTML();
		exit();
	default:
		exit();
}

function vitrine() {
		beginHTML();
		require_once 'content/vitrine.php';
		endHTML();
		exit();
}

function beginHTML() {
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>RYZAHA</title>
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
		<?php
					if(isset($GLOBALS["error_log"])) {
						echo "$('#sc-log-form').show();
				$('#inscription').hide();smooth_show('#forms');";
					}
					?>
	};
</script>
		
		<?php 

if(Client::isConnected()) {
	$head = new HeadConnecte(Client::getClient());
} else {
	$head = new HeadDeconnecte();
}
		
		$head->toHTML(); 
		
		?>
		
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
