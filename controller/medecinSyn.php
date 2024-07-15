<?php

session_start();

include "./vue/enteteCo.html.php";

include "./modele/dao.lib.php";
include "./modele/auth.lib.php";
include "./modele/dao.rapport.php";
include "./modele/dao.offrir.php";
include "./modele/dao.medecin.php";
include "./modele/dao.visiteur.php";
include "./modele/dao.famille.php";
include "./modele/dao.medicament.php";

$type = $_GET["type"];

if($type == "listeMedecins"){
    $medecins = array();

    if(!isset($_POST["text"])){
        $medecins = daoMedecin::getMedecins();
    }
    else{
        $medecins = daoMedecin::getMedecinsNom($_POST["text"]);
    }

    if(count($medecins)==0){
        include "./vue/vueAucunMedecin.php";
    }
    else{
        include "./vue/vueMedecins.php";
    }
}
elseif($type == "modificationMedecin"){
    $medecin = daoMedecin::getMedecinId($_GET["id"]);

    include "./vue/vueModifMedecin.php";
}
elseif($type == "execModifMedecin"){
    $idMedecin = $_GET["id"];

    if($_POST["nom"]!=null && $_POST["prenom"]!=null && $_POST["adresse"]!=null && $_POST["tel"]!=null){
        daoMedecin::updateMedecinId($idMedecin,$_POST["nom"],$_POST["prenom"],$_POST["adresse"],$_POST["tel"],$_POST["spe"]);
        $medecin = daoMedecin::getMedecinId($idMedecin);
        include "./vue/vueConfirmModifM.php";
        include "./vue/vueModifMedecin.php";
    }
    else{
        $medecin = daoMedecin::getMedecinId($idMedecin);
        include "./vue/vueErreurModifM.php";
        include "./vue/vueModifMedecin.php";
    }
}

include "./vue/pied.html.php";

?>