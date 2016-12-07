<?php

class Client {
  private $id=null;
  private $nom;
  private $prenom;
  private $mail;
  
  public static function isConnected() {
	  return isset($_SESSION['client']);
  }
  
  private function __construct($id=null){
		
  }
  
  /*
  private function getInfoId($id){
    $pdo = SPDO::getBD();
    $req = 'SELECT * FROM individu WHERE id=:id';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(':id', $id);
    if ($stmt->execute()){
      $nbRows = $stmt->rowCount();
      if ($nbRows==1){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
        $this->nom = $row['nom'];
        $this->taille = $row['taille'];
        $this->masse = $row['masse'];
      }
      else{
        $this->id = null;
        $this->nom = null;
        $this->taille = null;
        $this->masse = null;
      }
    }
    else{
      $message = print_r($stmt->errorInfo(), true);
      throw new Exception($message);
    }
  }
  */
  
  public function __set($propriete, $valeur){
    switch ($propriete){
	  case 'nom':
        if (is_nan($valeur) == false) // si l'id n'est pas un nombre
          $this->id = $valeur;
      case 'nom':
        $valeur = trim($valeur);
        if ($valeur != '')
          $this->nom = $valeur;
        break;
      case 'prenom':
        $valeur = trim($valeur);
        if ($valeur != '')
          $this->prenom = $valeur;
        break;
      case 'mail':
        $valeur = trim($valeur);
        if ($valeur != '')
          $this->mail = $valeur;
        break;
	   case 'mdp':
        $valeur = trim($valeur);
        if ($valeur != '')
          $this->mdp = $valeur;
        break;	
      default :
        throw new Exception(__FILE__."\r\n".__LINE__."\r\n".__CLASS__."\r\n".__METHOD__."\r\n"."Ecriture ".__CLASS__."->$propriete impossible");
        break;
    }
  }
  
  public function __get($propriete){
    switch ($propriete){
	  case 'id' :
	  case 'nom':
      case 'nom':
      case 'prenom':
	  case 'mail':
      case 'mdp':
        return $this->$propriete;
        break;
      default :
        throw new Exception(__FILE__."\r\n".__LINE__."\r\n".__CLASS__."\r\n".__METHOD__."\r\n"."Lecture ".__CLASS__."->$propriete impossible");
        break;
    }
  }
 
	public static function inscription($nom,$prenom,$mail,$mdp){
		
		$pdo = SPDO::getBD();
		$req = 'INSERT INTO client (Nom, Prenom, Mail, MotDePasse) VALUES (:nom, :prenom, :mail, :mdp)';
		$stmt = $pdo->prepare($req);
		$stmt->bindValue(':nom', $nom);
		$stmt->bindValue(':prenom', $prenom);
		$stmt->bindValue(':mail', $mail);
		$stmt->bindValue(':mdp', $mdp);
		if ($stmt->execute()){
			
			// on renvoie l'objet client avec ses propriétés
			
			$c = new Client();
			$c->nom = $nom;
			$c->prenom = $prenom;
			$c->mail = $mail;
			
			// RECUPERATION DE L'ID Client
			
			$req = 'SELECT IdClient FROM client ORDER BY IdClient DESC LIMIT 1';
			$stmt = $pdo->prepare($req);
			
			if ($stmt->execute()){
				$nbRows = $stmt->rowCount(); // compte les lignes
				if ($nbRows==1){ // le nombre de ligne est-il égale à 1 ?
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					$c->id = $row['IdClient'];
				}
			}
			
			return $c;
		}
		else
		{
			$message = print_r($stmt->errorInfo(), true);
			throw new Exception($message);
		}
		
	}
	
	
	public static function connexion ($mail,$mdp) {
		$pdo = SPDO::getBD();
		$req = 'SELECT * FROM client WHERE Mail=:mail AND MotDePasse=:mdp';
		$stmt = $pdo->prepare($req);
		$stmt->bindValue(':mail', $mail);
		$stmt->bindValue(':mdp', $mdp);
		if ($stmt->execute()) {
		  $nbRows = $stmt->rowCount(); // compte les lignes 
		  if ($nbRows==1){ // le nombre de ligne est-il égale à 1 ?
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			// on renvoie l'objet client 
			$c = new Client();
			$c->id = $row['IdClient'];
			$c->nom = $row['Nom'];
			$c->prenom = $row['Prenom'];
			$c->mail = $row['Mail'];
			return $c;
			
		  }
		  else{
			throw new Exception("Mot de passe ou mail incorrect.");
		  }
		}
		else{
		  $message = print_r($stmt->errorInfo(), true);
		  throw new Exception($message);
		}
	}
	
	public function ajouterProduitPanier($idProduit,$quantite)
	{
		$pdo = SPDO::getBD();
		$req = 'INSERT INTO panier (id_produit,id_client,quantite) VALUES (:id_produit, :id_client,:quantite)';
		$stmt = $pdo->prepare($req);
		$stmt->bindValue(':id_produit', $idProduit);
		$stmt->bindValue(':id_client', $this->id);
		$stmt->bindValue(':quantite', $quantite);
		if ($stmt->execute())
		{	
			echo "bien enregistrer";

		}
		else
		{
			$message = print_r($stmt->errorInfo(), true);
			throw new Exception($message);
		}
	}

	public function supprimerProduitPanier($idProduit)
	{
		$pdo = SPDO::getBD();
		$req = 'DELETE FROM panier WHERE id_produit = :id_produit AND id_client = :id_client';
		$stmt = $pdo->prepare($req);
		$stmt->bindValue(':id_produit', $idProduit);
		$stmt->bindValue(':id_client', $this->id);
		if ($stmt->execute())
		{	
			echo "bien supprimer";

		}
		else
		{
			$message = print_r($stmt->errorInfo(), true);
			throw new Exception($message);
		}				
	}
	
	
	
}


?>
