<?php

require_once PATH_CONTROLEUR."/controleurAccueil.php";
require_once PATH_CONTROLEUR."/controleurLecture.php";
require_once PATH_CONTROLEUR."/controleurCreation.php";

class Routeur {
	private $ctrlAccueil;
	private $ctrlLecture;
	private $ctrlCreation;
	
	public function __construct() {
		$this->ctrlAccueil = new ControleurAccueil();
		$this->ctrlLecture = new ControleurLecture();
		$this->ctrlCreation = new ControleurCreation();
	}

  // Traite une requête entrante
	public function routerRequete() {
		if(isset($_GET['id_sujet'])){
			$this->ctrlLecture->lire($_GET['id_sujet']);
		}
		elseif(isset($_GET['creer'])){
			$this->ctrlCreation->afficheCreationSujet();
		}
		elseif(isset($_GET['repondre'])){
			$this->ctrlCreation->afficheCreationReponse();
		}
		elseif(isset($_POST['soumettreSujet'])){
			$this->ctrlCreation->creerSujet($_POST['pseudo'],$_POST['titre'],$_POST['message']);
		}
		else{
			$this->ctrlAccueil->accueil();
		}	
	}

}
?>