<?php

function controleurPrincipal($action){
        $lesActions = array();
        $lesActions["defaut"] = "connexion.php";
        $lesActions["deconnexion"] = "deconnexion.php";
        $lesActions["accueil"] = "accueil.php"; //page d'accueil

        //Synthèse

        $lesActions["medecins"] = "medecinSyn.php";
        $lesActions["medicaments"] = "medicamentSyn.php";
        $lesActions["rapports"] = "rapportSyn.php";

        if (array_key_exists($action,$lesActions)){
            return $lesActions[$action];
        }
        else{
            return $lesActions["defaut"];
    }
}

?>
