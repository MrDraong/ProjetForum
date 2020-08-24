<?php

require_once PATH_VUE."/vueSujets.php";
require_once PATH_VUE."/vueCreerSujet.php";
require_once PATH_VUE."/vueCreerReponse.php";
require_once PATH_MODELE."/modele.php";

class ControleurCreation{
	
	private $vueSujets;
	private $vueCreerSujet;
	private $vueCreerReponse;
	private $modele;

	function __construct(){
		$this->modele=new Modele();
		$this->vueSujets = new VueSujets();
		$this->vueCreerSujet = new VueCreerSujet();
		$this->vueCreerReponse = new VueCreerReponse();
	}
	
	//appel la vue pour creer un sujet
	function afficheCreationSujet(){
		$this->vueCreerSujet->afficheCreationSujet();
	}
	
	//appel la vue pour creer une réponse
	function afficheCreationReponse(){
		$this->vueCreerReponse->afficheCreationReponse();
	}
	
	function creerSujet($pseudo,$titre,$message){
		// Définir le nouveau fuseau horaire
		date_default_timezone_set('Europe/Paris');
		//Récupérer la date et l'heure
		$date = date('y-m-d H:i:s');
		
		$this->modele->creerSujet($pseudo,$titre,$message,$date);
		$this->vueSujets->afficheSujets($this->modele->getAllSujets());
	}
}
?>