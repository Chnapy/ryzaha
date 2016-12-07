<?php

class HeadDeconnecte {
	
	function toHTML() {
		
		?>
		
			
<nav>
	<div class="nav_item nav_left a" onclick="location.href='index.php'">
		<img class="logo" src="img/logo.png" alt="" style="">
	</div>
	<div class="nav_middle row">
		<a class="nav_item a" href="?categorie=t-shirt" <?php if(isset($_GET['categorie']) && $_GET['categorie']==='t-shirt') {echo "style='box-shadow: 0 2px 0 white;'";} ?>>
			T-shirt
		</a>
		<a class="nav_item a" href="?categorie=pull" <?php if(isset($_GET['categorie']) && $_GET['categorie']==='pull') {echo "style='box-shadow: 0 2px 0 white;'";} ?>>
			Pull
		</a>
		<a class="nav_item a" href="?categorie=jeans" <?php if(isset($_GET['categorie']) && $_GET['categorie']==='jeans') {echo "style='box-shadow: 0 2px 0 white;'";} ?>>
			Jeans
		</a>
		<a class="nav_item a" href="?categorie=chaussette" <?php if(isset($_GET['categorie']) && $_GET['categorie']==='chaussette') {echo "style='box-shadow: 0 2px 0 white;'";} ?>>
			Chaussette
		</a>
	</div>
	<style>/*
	.nav_middle .nav_item {
		width: 20%;
	}*/
	</style>
	<div class="nav_item nav_right">
		<div class="head-sc nav_item a">
			<div class="sc-log not-log">
				<div class="sc_green">
					<img src="img/icones/sc/sc_logo_1.png" class="sc_green_1"/>
					<img src="img/icones/sc/sc_logo_2.png" class="sc_green_2"/>
					<span class="fui-cross sc_green_not_access sc_not_accessible error"></span>
				</div><!--
				<div class='deco-btn'>
					<span class="gog-btn" onclick="deconnexion();"><span class="fui-exit"></span></span>
				</div>-->
				<a class='sc-log-content' target='_blank'>
					Se connecter
				</a>
				<div id="forms" class="hide2">
				<form action="?m=connexion" method="POST" class="sc-log-form gog-form smooth" id='sc-log-form'>
					<div class="sc-log-form-tip"></div>
					<h2 class="gog-form-title">Connexion</h2>
					<ol class="gog-fieldset">
						<li class="gog-field">
							<input type="email" name="email" required="required" placeholder="Email" class="gog-input"/>
						</li>
						<li class="gog-field">
							<input type="password" name="pass" required="required" placeholder="Mot de passe" class="gog-input" maxlength="4096"/>
						</li>
						<li class="gog-field">
							<button type="submit" name="submit" class="gog-btn-big gog-active ">Se connecter maintenant</button>
						</li>
					</ol>
					<p class="gog-form-description sc-log-form-error error">
					<?php
					if(isset($GLOBALS["error_log"])) {
						echo $GLOBALS["error_log"];
					}
					?>
					</p>
					<p class="gog-form-description">
					
					</p>
					<div class="gog-form-footer">
						<div class="gog-form-section">
							<div class="gog-btn-big clickable" onclick="$('#sc-log-form').hide();$('#inscription').removeClass('hide');$('#inscription').attr('style', 'display:block');">Je n'ai pas de compte</div>
						</div>
					</div>
				</form>
				<form action="?m=inscription" method="POST" class="sc-log-form gog-form smooth hide" id='inscription'>
					<div class="sc-log-form-tip"></div>
					<h2 class="gog-form-title"><!--<i class="sc-logo"></i>-->Inscription</h2>
					<ol class="gog-fieldset">
						<li class="gog-field">
							<input type="email" name="mail" required="required" placeholder="Email" class="gog-input"/>
						</li>
						<li class="gog-field">
							<input type="password" name="mdp" required="required" placeholder="Mot de passe" class="gog-input" maxlength="4096"/>
						</li>
						<li class="gog-field">
							<input type="text" name="nom" required="required" placeholder="Nom" class="gog-input"/>
						</li>
						<li class="gog-field">
							<input type="text" name="prenom" required="required" placeholder="Prenom" class="gog-input" maxlength="4096"/>
						</li>
						<li class="gog-field">
							<button type="submit" name="submit" class="gog-btn-big gog-active ">S'inscrire maintenant</button>
						</li>
					</ol>
					<p class="gog-form-description sc-log-form-error error">
					<?php
					if(isset($GLOBALS["error_ins"])) {
						echo $GLOBALS["error_ins"];
					}
					?>
					</p>
					<p class="gog-form-description">
					
					</p>
					<div class="gog-form-footer">
						<div class="gog-form-section">
							<div class="gog-btn-big clickable" onclick="$('#inscription').hide();$('#sc-log-form').show();">Se connecter</div>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</nav>
		
		<?php
	}
	
} 