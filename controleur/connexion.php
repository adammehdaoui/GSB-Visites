<?php

if(isset($_SESSION)){
    session_destroy();
}

session_start();

include_once "./modele/dao.lib.php";
include_once "./modele/auth.lib.php";
include_once "./vue/entete.html.php";

//page de connexion
include_once "./vue/vueConnexion.php";
include_once "./vue/pied.html.php";

?>