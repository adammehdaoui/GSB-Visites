<?php

session_start();

include "./modele/auth.lib.php";
include "./modele/dao.visiteur.php";

//on déconnecte le visiteur
logout();

include "./vue/entete.html.php";

//on affiche le formulaire de connexion
include "./vue/vueConnexion.php";

//on lui confirme sa déconnexion
include "./vue/vueDeconnexion.php";
include "./vue/pied.html.php";

?>