<?php

// Les différents chemins des répertoires pour le MVC

// chemin vers la racine du site, car config.php est dans un sous répertoire
define("HOME_SITE",__DIR__."/..");

// Les chemins vers les divers répertoires liés au MVC
define("PATH_VUE",HOME_SITE."/vue");
define("PATH_CONTROLEUR",HOME_SITE."/controleur");
define("PATH_MODELE",HOME_SITE."/modele");


// Données de connexion au Système de gestion de la BD

define("HOST","localhost");
define("BD","projet_forum");
define("LOGIN","root");
define("PASSWORD","");
?>
