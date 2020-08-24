<?php

require_once PATH_VUE."/vueSujets.php";
require_once PATH_VUE."/vueLecture.php";
require_once PATH_MODELE."/modele.php";

class ControleurLecture{

	private $vueLecture;
	private $modele;

	function __construct(){
		$this->modele=new Modele();
		$this->vueLecture = new VueLecture();
	}
	
	//Lire un sujet
	function lire($id){
		try{
		$this->vueLecture->lireSujet($this->modele->getSujetById($id),$this->modele->getReponsesById($id));
		}
		catch(PDOException $e){
			$this->deconnexion();
			throw new TableAccesException("problème avec la table parties");
		}
	}
}
?>