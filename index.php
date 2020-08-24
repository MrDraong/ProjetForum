<?php
//le fichier de configuration avec les infos de la BDD
require "config/config.php";
require PATH_CONTROLEUR."/routeur.php";

//En arrivant sur l'index utilise la fonction routerRequete du routeur
$routeur=new Routeur();
$routeur->routerRequete();

?>