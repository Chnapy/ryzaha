<?php

class HeadConnecte {
	
	private $client;
	
	function __construct($_client) {
		$this->client = $_client;
	}
	
	function toHTML() {
		?>
		
<nav>
	<div class="nav_item nav_left a">
		<img class="logo" src="img/logo.png" alt="" style="">
	</div>
	<div class="nav_middle row">
		<a class="nav_item a" href="index.php">
			Accueil
		</a>
		<a class="nav_item a" href="?m=panier">
			Panier
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
					<span class="gog-btn" onclick="location.href='?m=deconnexion';"><span class="fui-exit"></span></span>
				</div>
				<a class='sc-log-content' target='_blank'>
					
					<?php echo $this->client->prenom; ?>
				</a>
			</div>
		</div>
	</div>
</nav>
		<?php
	}
	
} 