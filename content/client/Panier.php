<?php

class Panier {
	
	private $listeProduits,
		$client;
	
	function __construct($client) {
		$this->listeProduits = array();
		$this->client = $client;
	}
	
	function defAllProduits() {
		$this->listeProduits = array();
		$req = 'select * from panier where id_client=?';
		
		$pdo = SPDO::getBD();
		$stmt = $pdo->prepare($req);
		$e = $stmt->execute(array(
			$this->client->id
		));
		
		if($e) {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach($result as $r) {
				$this->listeProduits[] = array($r['id_produit'], $r['quantite']);
			}
		} else {
			$message = print_r($stmt->errorInfo(), true);
			throw new Exception($message);
		}
	}
	
	function ajouterProduit($idProduit, $quantite = 1) {
		
		if($this->setQuantite($idProduit, $quantite)) {
			return;
		}
		$pdo = SPDO::getBD();
		
		$req = 'INSERT INTO panier (id_produit,id_client,quantite) VALUES (:id_produit, :id_client,:quantite)';
		$stmt = $pdo->prepare($req);
		$stmt->bindValue(':id_produit', $idProduit);
		$stmt->bindValue(':id_client', $this->client->id);
		$stmt->bindValue(':quantite', $quantite);
		if ($stmt->execute()) {	
			$this->listeProduits[] = array($idProduit, $quantite);
		} else {
			$message = print_r($stmt->errorInfo(), true);
			throw new Exception($message);
		}
	}
	
	function setQuantite($idProduit, $quantite) {
		
		$pos = $this->getPositionProduit($idProduit);
		if($pos === -1) {
			return false;
		}
		$pdo = SPDO::getBD();
		$req = 'update panier set quantite=quantite+? where id_produit=? and id_client=?';
		$stmt = $pdo->prepare($req);
		$e = $stmt->execute(array(
			$quantite,
			$idProduit,
			$this->client->id
		));
		if($e) {
			$this->listeProduits[$pos][1] += $quantite;
		} else {
			$message = print_r($stmt->errorInfo(), true);
			throw new Exception($message);
		}
		return true;
	}
	
	function supprimerProduit($idProduit) {
		unset($this->listeProduits[$this->getPositionProduit($idProduit)]);
		
		$pdo = SPDO::getBD();
		$req = 'DELETE FROM panier WHERE id_produit = :id_produit AND id_client = :id_client';
		$stmt = $pdo->prepare($req);
		$stmt->bindValue(':id_produit', $idProduit);
		$stmt->bindValue(':id_client', $this->client->id);
		if ($stmt->execute()) {	
			//echo "bien supprimer";
		} else {
			$message = print_r($stmt->errorInfo(), true);
			throw new Exception($message);
		}	
	}
	
	function getListeProduits() {
		return $this->listeProduits;
	}
	
	function getProduit($idProduit) {
		return $this->listeProduits[$this->getPositionProduit($idProduit)];
	}
	
	private function getPositionProduit($idProduit) {
		for($i = 0; $i < count($this->listeProduits); $i++) {
			if($this->listeProduits[$i][0] === $idProduit) {
				return $i;
			}
		}
		return -1;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}