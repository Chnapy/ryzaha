<?php

if(!Client::isConnected()) {
	header('Location: index.php');
	exit;
}

$client = Client::getClient();

if(isset($_GET['m2']) && isset($_GET['id']) && $_GET['id'] > 0) {
	switch($_GET['m2']) {
		case 'ajout':
			$client->panier->ajouterProduit($_GET['id']);
			break;
		case 'delete':
			$client->panier->supprimerProduit($_GET['id']);
			break;
	}
	header('Location: ?m=panier');
	exit;
}

$produits = $client->panier->getListeProduits();
$prixTotal = 0;
?>

<div>
		<div class="log-form scan_pane module gog-form" style="background: transparent;box-shadow: none;">

			<form action="#" method="POST" class="gog-form smooth" id='param-form'>
				<h2 class="gog-form-title">
					Panier
				</h2>
				<table class="gog-table" style="width:auto;margin: auto;">
					<tbody>
						<?php
						
						foreach($produits as $p) {
							$pr = Produit::getProduitWithId($p[0]);
							$pr->setQuantite($p[1]);
							$pr->echoPanier();
							$prixTotal += $pr->getPrix() * $pr->getQuantite();
						}
						
						?>
		<tr>
							<td class="" style="text-align: right;">
								Prix total : <?php echo Produit::prixToTxt2($prixTotal); ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="gog-field">
					<button type="submit" class="gog-btn-big gog-active">Passer la commande</button>
				</div>
				<p class="gog-form-description param-form-error error"></p>
			</form>
		</div>
	</div>