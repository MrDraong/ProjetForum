<?php
// Classe pour définir une exception 
class MonException extends Exception{
	private $chaine;
	public function __construct($chaine){
		$this->chaine=$chaine;
	}

	public function afficher(){
		return $this->chaine;
	}

}


// Exception relative à un probleme de connexion
class ConnexionException extends MonException{
}

// Exception relative à un probleme d'accès à une table
class TableAccesException extends MonException{
}


// Classe qui gère les accès à la BD
class Modele{
	private $connexion;
// Constructeur de la classe
	public function __construct(){
		try{  
			$chaine="mysql:host=".HOST.";dbname=".BD;
			$this->connexion = new PDO($chaine,LOGIN,PASSWORD);
			$this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			$exception=new ConnexionException("Problème de connexion à la base de données");
			throw $exception;
		}
	}


// Méthode pour se déconnecter de la BD
	public function deconnexion(){
		$this->connexion=null;
	}


// méthode qui permet de récupérer les sujets dans la table sujets
// post-condition:
// retourne un tableau avec chaque ligne retournée par la requête
// si un problème est rencontré, une exception de type TableAccesException est levée
	public function getAllSujets(){
		try{  
			$statement=$this->connexion->query("SELECT id, titre, auteur, date_derniere_reponse FROM sujets ORDER BY date_derniere_reponse DESC;");
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			$this->deconnexion();
			throw new TableAccesException("problème avec la table sujets");
		}  
	}
	
// méthode qui permet de récupérer le sujet par son id
// pré-condition: 
// l'id du sujet
// post-condition:
// retourne le sujet en question
// si un problème est rencontré, une exception de type TableAccesException est levée
	public function getSujetById($id){
		try{  
			$statement=$this->connexion->prepare("SELECT * FROM sujets WHERE id = ?;");
			$statement->bindParam(1, $id);
			$statement->execute();
			return $statement->fetch();
		}
		catch(PDOException $e){
			$this->deconnexion();
			throw new TableAccesException("problème avec la table sujets");
		}  
	}
	
// méthode qui permet de récupérer les réponses pour un sujet dans la table reponses
// pré-condition: 
// l'id du sujet
// post-condition:
// retourne toutes les réponses pour un sujet
// si un problème est rencontré, une exception de type TableAccesException est levée
	public function getReponsesById($id){
		try{  
			$statement=$this->connexion->prepare("SELECT * FROM reponses WHERE correspondance_sujet = ?;");
			$statement->bindParam(1, $id);
			$statement->execute();
			return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e){
			$this->deconnexion();
			throw new TableAccesException("problème avec la table reponses");
		}  
	}

// méthode qui permet de créer le sujet dans la BD
// pré-condition: 
// Un pseudo, un titre et un message
// si un problème est rencontré, une exception de type TableAccesException est levée
	public function creerSujet($pseudo, $titre, $message, $date){
		try{ 
			$statement=$this->connexion->prepare("INSERT INTO sujets (auteur, titre, message, date_derniere_reponse) VALUES(?,?,?,?);");
			$statement->bindParam(1, $pseudo);
			$statement->bindParam(2, $titre);
			$statement->bindParam(3, $message);
			$statement->bindParam(4, $date);
			$statement->execute();
		}
		catch(PDOException $e){
			$this->deconnexion();
			throw new TableAccesException("problème avec la table sujets");
		}  
	}
}

?>