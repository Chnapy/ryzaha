<?php

	if(isset($_POST['email'])) {
    $mail = $_POST['email'];
	$mdp = sha1($_POST['pass']);
	
	try {
    $c = Client::connexion($mail,$mdp);
	//var_dump($c);
	
	$_SESSION['client'] = serialize($c);
	} catch(Exception $e) {
		$error_log = $e->getMessage();
	}
	}
?>