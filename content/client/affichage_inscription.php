<div>
	<div class="">
		<h1>Inscription </h1>
	</div>
	<form role="form" action="ajouterClient.php" method="POST">
		<div class="">
			<label for="nom">Nom</label>
			<input type="text" class="" id="nom" name="nom" placeholder="Entrer votre nom de famille">										
		</div>
		<div class="">
			<label for="prenom">Prenom</label>
			<input type="text" class="" id="prenom" name="prenom" placeholder="Entrer votre prenom">							
		</div>
		<div class="">					
			<label for="mail" >Adresse mail</label>
			<input type="email" class="" id="mail" name="mail" placeholder="Entrer votre adresse mail"required>
		</div>
		
		<div class="">
			<label for="mdp">Mot de passe</label>
			<input type="password" class="" id="mdp" name="mdp" placeholder="Mot de passe"required>
		</div>
		<div class="">
			<button type="submit" class="">Ajouter</button>
		</div>
	</form>
</div>