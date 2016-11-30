<?php

class Produit {
	
	private $id, 
		$categorie,
		$nom,
		$prix,
		$couleur,
		$marque,
		$sexe,
		$url_img
		;
	
	public function __construct($id, $nom, $categorie, $prix, $couleur, $marque, $sexe, $url_img) {
		
		$this->id = $id;
		$this->nom = $nom;
		$this->categorie = $categorie;
		$this->prix = $prix;
		$this->couleur = $couleur;
		$this->marque = $marque;
		$this->sexe = $sexe;
		$this->url_img = $url_img;
	}
	
	function echoHTML() {
		?>
		
		<div id="produit-<?php echo $this->id; ?>" class="oeuvre o-film <?php echo $this->categorie; ?>">
			<div class="o-real">
			</div>
			<div class="o-tags"><?php echo $this->sexe; ?></div>
			<div class="o-saga gog-btn gog-active"></div>
			<!--<span class="glyphicon glyphicon-floppy-remove o-no-file"></span>-->
			<div class="o-notes">
				<!--<div class="o-note-glob loadable"></div>-->
				<div class="o-manote loadable l-white" style="width: 60px"><?php echo $this->prix; ?></div>
			</div>
			<a class="o-clickable clickable" href="?m=produit&id=<?php echo $this->id; ?>" style="background-image: none">
				<div class="o-affiche">
					<img src="<?php echo $this->url_img; ?>"/>
				</div>
				<div class="o-nom"><?php echo $this->nom; ?></div>
				<div class="o-annee small"><?php echo $this->marque; ?></div>
				<br/>
				<div class="o-saisons"></div>
				<div class="o-duree"></div>
				<div class="o-langues">
					<!--<span class="glyphicon glyphicon-volume-up"></span>-->
				</div>
				<div class="o-sub">
					<!--<span class="glyphicon glyphicon-subtitles"></span>-->
				</div>
				<div class="o-types">
					<div class="o-type label">
						<?php echo $this->categorie; ?>
					</div>
				</div>
				<div class="o-border">
				</div>
			</a>
		</div>
		
		<?php
	}
	
}