<?php

session_start();

include_once "./modele/dao.lib.php";
include_once "./modele/dao.visiteur.php";
include_once "./modele/auth.lib.php";

if(isset($_POST["login"]) && isset($_POST["mdp"]) && $_POST["login"]!='' && $_POST["mdp"]!=''){ //si les login et mdp sont saisis, alors on essaye la connexion de l'utilisateur
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];

    login($login,$mdp);
}

$cnx = isLoggedOn(); //on teste le fait que le visiteur soit connecté

if($cnx==true){
    //si l'utilisateur est connecté, on affiche l'accueil avec l'entête permettant d'accéder aux différents menus

    include_once "./vue/enteteCo.html.php";
    include_once "./vue/vueAccueil.php";
}
else{
    //sinon on lui réaffiche la page de connexion avec une erreur

    include_once "./vue/entete.html.php";
    include_once "./vue/vueConnexion.php";
    include_once "./vue/vueErreurAuth.php";
}

include_once "./vue/pied.html.php";

?>