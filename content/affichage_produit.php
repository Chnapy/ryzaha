<?php

if(!isset($_GET['id'])) {
	die("Produit inexistant");
}

$id = $_GET['id'];

$p = Produit::getProduitWithId($id);
$p->echoFiche();

?>
