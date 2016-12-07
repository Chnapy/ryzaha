<?php

class Produit {
	
	private $id, 
		$categorie,
		$nom,
		$prix,
		$couleur,
		$marque,
		$sexe,
		$url_img,
		$taille,
		$quantite
		;
		
	public static function getProduitWithId($id) {
		$query = "select * from produit where IdProduit=?";
		
		$bd = SPDO::getBD();
		
		$p = $bd->prepare($query);
		$s = $p->execute(array(
			$id
		));
		
		if(!$s) {
			die("Produit non trouvé : " . $id);
			exit;
		}
		
		$r = $p->fetch(PDO::FETCH_ASSOC);
		return new Produit($id, $r['Nom'], $r['Categorie'], $r['Prix'], $r['Couleur'], $r['Marque'], $r['Sexe'], $r['URLimg'], $r['Taille']);
	}
	
	public static function getAllProduit() {
		$query = "select * from produit";
		
		$bd = SPDO::getBD();
		
		$p = $bd->prepare($query);
		$s = $p->execute();
		
		if(!$s) {
			die("Produits non trouvés");
			exit;
		}
		
		$r = $p->fetchAll(PDO::FETCH_ASSOC);
		$ret = array();
		foreach($r as $e) {
			$ret[] = new Produit($e['IdProduit'], $e['Nom'], $e['Categorie'], $e['Prix'], $e['Couleur'], $e['Marque'], $e['Sexe'], $e['URLimg'], $e['Taille']);
		}
		return $ret;
	}
	
	public function __construct($id, $nom, $categorie, $prix, $couleur, $marque, $sexe, $url_img, $taille) {
		
		$this->id = $id;
		$this->nom = $nom;
		$this->categorie = $categorie;
		$this->prix = $prix;
		$this->couleur = $couleur;
		$this->marque = $marque;
		$this->sexe = $sexe;
		$this->url_img = $url_img;
		$this->taille = $taille;
		$this->quantite = 1;
	}
	
	function getPrix() {
		return $this->prix;
	}
	
	function getQuantite() {
		return $this->quantite;
	}
	
	private function prixToTxt($prix = null) {
		return self::prixToTxt2($prix === null ? $this->prix : $prix);
	}
	
	static function prixToTxt2($prix) {
		$p = (string) $prix;
		
		while(strlen($p) < 4) {
			$p = '0' . $p;
		}
		
		$centimes = substr($p, -2);
		$euros = substr($p, 0, -2);
		
		return $euros . "€<sub>" . $centimes . "</sub>";
	}
	
	function setQuantite($q) {
		$this->quantite = $q;
	}
	
	function echoHTML() {
		?>
		
		<div id="produit-<?php echo $this->id; ?>" class="oeuvre o-film <?php echo $this->categorie; ?>">
			<div class="o-real">
			</div>
			<div class="o-tags"><?php echo $this->sexe; ?></div>
			<!--<div class="o-saga gog-btn gog-active"></div>
			<span class="glyphicon glyphicon-floppy-remove o-no-file"></span>-->
			<div class="o-notes">
				<!--<div class="o-note-glob loadable"></div>-->
				<div class="o-manote loadable l-white" style="width: 60px"><?php echo $this->prixToTxt(); ?></div>
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
	
	function echoFiche() {
		?>
		
		
		
		
		<div id="fiche" class="container-fluid smooth">
	<div id="fiche-background">
		<img id="fiche-back" class="fadein" />
		<div id="fiche-over"></div>
	</div>
	<div id="fiche-content">
		<div class="sup-header">
			<button class="gog-btn bout-retour" onclick="location.href='index.php'"><span class="fui-arrow-left"></span></button>
			<div class="modif-fiche"><!--
				<span class="gog-btn fiche-actu loadable" onclick="actualiserFiche();"><span class="glyphicon glyphicon-refresh"></span></span>
				<span class="gog-btn fiche-params loadable" onclick="smooth_show($('#fiche-param-modal'));"><span class="fui-gear"></span></span>
				<span class="gog-btn fiche-supp loadable" onclick="smooth_show($('#fiche-supp-modal'));"><span class="fui-cross"></span></span>
			--></div>
		</div>
		<div class="row header">
			<div class="col-md-10">
				<div class="title-head bloc">
					<h1 class="title-main">
						<span class="title-main-text">
							<?php echo $this->nom; ?>
						</span>
						<span class="small annee">
							<?php echo $this->marque; ?>
						</span>
						<!--<a href="" target="_blank" class="fui-export redirect-sc"></a>-->
					</h1>

				</div>
				<div class="small title-sec bloc loadable l-text">
					<?php echo $this->couleur; ?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="o-types"><!--
					<div class="o-type2 label">
					</div>-->
					<div class="o-type label">
						<?php echo $this->categorie; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row body">
			<div class="col-md-3 gauche">
				<img class="affiche" src="<?php echo $this->url_img; ?>"/>

			</div>
			<div class="col-md-6 centre">
				<div class='section'>
					<div class="mini-titre">Infos</div>
					<div class="contenu">
						<span class="reals">
							Marque <span class="label label-default"><?php echo $this->marque; ?></span><br/>
							Couleur <span class="label label-danger"><?php echo $this->couleur; ?></span><br/>
							Taille <span class="label label-primary"><?php echo $this->taille; ?></span><br/>
							Sexe <span class="label label-warning"><?php echo $this->sexe; ?></span><br/>
							
						</span><!--
						<span class="acteurs">
						</span>
						<br/>
						<span class="pays loadable l-text">
						</span>
						<br/>
						<span class="nbr_saisons">
						</span>
						<span class="duree">
						</span>-->
					</div>
				</div><!--
				<div class='section synopsis loadable'>
					<div class="mini-titre">Synopsis</div>
					<div class="contenu">
					</div>
				</div>
				<div class="trailer-box loadable">
					<div class="mini-titre">Trailer</div>
					<div class="trailer">
					</div>
				</div>
				<div class="visionnage-box loadable">
					<div class="mini-titre">Visionner</div>
					<div class="visionnage">
					</div>
				</div>-->
			</div>
			<div class="col-md-3 droite">
				<div class="mini-titre">Prix</div>
				<div class="o-notes"><!--
					<div class="o-note-glob">
					</div>-->
					<div class="o-manote" style="width: 60px">
						<?php echo $this->prixToTxt(); ?>
					</div>
					<button class="gog-btn-big gog-active" onclick="location.href='?m=panier&m2=ajout&id=<?php echo $this->id; ?>'" style="margin-top: 20px">
						Ajouter au panier
					</button>
				</div><!--
				<div class='saga loadable'>
					<div class="mini-titre">Saga</div>
					<div class="saga-list module">
						<div class='saga-head'>
							<span class="saga-head-txt"></span><a href="" target="_blank" class="fui-export redirect-sc"></a>
						</div>
						<div class='saga-body'>
						</div>
					</div>
				</div>
				<div class="mini-titre">Tags</div>
				<div class="o-tags">
				</div>-->
			</div>
		</div>
		<!--
		<button class="fiche-toleft smooth gog-btn-big"><span class="fui-arrow-left"></span><span class="fiche-toleft-titre"></span></button>
		<button class="fiche-toright smooth gog-btn-big"><span class="fiche-toright-titre"></span><span class="fui-arrow-right"></span></button>
		-->
	</div>
</div>

		
		<?php
	}
	
	function echoPanier() {
		?>
		
		<tr class="<!--list2-->">
							<td class="gog-td-label" style="text-align: right;">
								<!--<a href="?m=produit&id=<?php echo $this->id; ?>"><?php echo $this->nom; ?></a>-->
								<?php $this->echoHTML(); ?>
							</td>
							<td>
								<label for="quant<?php echo $this->id; ?>">Quantite</label>
								<input type="number" name="quantite" id="quant<?php echo $this->id; ?>" value="<?php echo $this->quantite; ?>" style="width:35px;">
							</td>
							<td>
								Prix total : <?php echo $this->prixToTxt($this->prix * $this->quantite); ?>
							</td>
							<td>
								<button class="gog-btn" style="min-width:0;" onclick="location.href='?m=panier&m2=delete&id=<?php echo $this->id; ?>'"><i class="fui-cross"></i></button>
							</td>
						</tr>
		
		<?php
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}