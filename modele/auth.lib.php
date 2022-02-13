<?php

function login($login, $mdp) { //connexion d'un utilisateur

    $leVisiteur = daoVisiteur::getVisiteurByLogin($login);
    $idVisiteur = $leVisiteur->getId();
    $prenomVisiteur = $leVisiteur->getPrenom();
    $nomVisiteur = $leVisiteur->getNom();
    $adresseComplete = $leVisiteur->getAdresseComplete();
    $mdpV = $leVisiteur->getMdp();
    $loginV = $leVisiteur->getLogin();

    if ($mdpV==$mdp && $loginV==$login) {
        $_SESSION["login"] = $login;
        $_SESSION["mdp"] = $mdp;
        $_SESSION["id"] = $idVisiteur;
        $_SESSION["prenom"] = $prenomVisiteur;
        $_SESSION["nom"] = $nomVisiteur;
        $_SESSION["adresse"] = $adresseComplete;
    }
}

function logout() { //déconnexion d'un utilisateur
    unset($_SESSION["login"]);
    unset($_SESSION["mdp"]);
    unset($_SESSION["prenom"]);
}

function isLoggedOn(){ //test si un visiteur est connecté ou non
    $ret = false;

    if (isset($_SESSION["login"])) {
        $util = daoVisiteur::getVisiteurByLogin($_SESSION["login"]);
        if ($util->getLogin() == $_SESSION["login"] && $util->getMdp() == $_SESSION["mdp"]){
            $ret = true;
        }
    }

    return $ret;
}

?>