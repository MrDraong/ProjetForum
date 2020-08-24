<?php

require_once PATH_VUE."/vueSujets.php";
require_once PATH_MODELE."/modele.php";

class ControleurAccueil{

	private $vueSujets;
	private $modele;

	function __construct(){
		$this->modele=new Modele();
		$this->vueSujets = new VueSujets();
	}
	
	//Page d'accueil du forum
	function accueil(){
		$this->vueSujets->afficheSujets($this->modele->getAllSujets());
	}
}
?>