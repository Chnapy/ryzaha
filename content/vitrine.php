

<div id="content" class="smooth">
	<div id="content-header" class="">
		<div id="content-header-top" class="cf">
			<h1 class="content-header-top-title"><span class="loadable load-oeuvre l-text"></span><span class="nbr_oeuvres"></span><span class="nbr_total_oeuvres"></span> FILMS & SERIES</h1>

			<div class="content-header-top-right">
				<div class="content-header-top-item dropdown-back" data-function="setAffichage" id="dropdown-affichage">
					AFFICHAGE :
					<span class="dropdown-back-value"></span><!--
					--><span class="dropdown-back-content">
						<span class="dropdown-back-wrapper">
							<i class="dropdown-back-icon glyphicon glyphicon-chevron-down"></i>
							<i class="dropdown-back-pointer-up"></i>
						</span>
						<span class="dropdown-back-items">
							<span class="dropdown-back-item" data-value="list1"><span class="fui-list-columned"></span></span>
							<span class="dropdown-back-item" data-value="list2"><span class="fui-list-small-thumbnails"></span></span>
						</span>
					</span>
				</div>
			</div>
		</div>

	</div>
	
	<div id="content-body" class="smooth" style="min-height: 100%; padding-bottom: 200px;position:relative;">
	
	<?php
	
	$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : 'all';
	
	$all = Produit::getAllProduit($categorie);
	foreach($all as $p) {
		$p->echoHTML();
	}
	
	?>
	
	
	
	<?php require_once 'content/footer.php'; ?>
	</div>
</div>