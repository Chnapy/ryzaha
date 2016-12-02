

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
	
	<div id="content-body" class="smooth">
	
	<?php
	
	
	//$p = new Produit(12, "NomProduit", "Chaussette", 1500, "Noir", "Adidas", "Homme", "http://demandware.edgesuite.net/sits_pod14-adidas/dw/image/v2/aagl_prd/on/demandware.static/-/Sites-adidas-products/default/dw55f9d113/zoom/AY8707_01_standard.jpg?sw=500&sfrm=jpg");
	$all = Produit::getAllProduit();
	foreach($all as $p) {
		$p->echoHTML();
	}
	
	?>
	
	</div>
</div>