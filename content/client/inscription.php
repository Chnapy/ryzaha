<?php
//inscription
	if(isset($_POST['mail'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
	$mdp = sha1($_POST['mdp']);
	
	try {
	$c = Client::inscription ($nom,$prenom,$mail,$mdp);
	//var_dump($c);
	
	$_SESSION['client'] = serialize($c);
	} catch(Exception $e) {
		$error_ins = $e->getMessage();
	}
	}
?>