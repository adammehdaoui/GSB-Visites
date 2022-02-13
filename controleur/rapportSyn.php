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

if($type == "rapport"){
    $medecins = daoMedecin::getMedecins();

    include "./vue/vueNouvRapport.php";
}
elseif($type == "nouvRapport"){
    $medecins = daoMedecin::getMedecins();

    $idRapport = daoRapport::maxIdRapport($_SESSION["id"]) + 1;

    if($_POST["motif"]!=null && $_POST["bilan"]!=null && $_POST["date"]!=null && $_POST["médecin"]!=null){
        daoRapport::addRapport($_POST["date"],$_POST["motif"],$_POST["bilan"],$_SESSION["id"],$_POST["médecin"]);
        include "./vue/vueConfirmRapport.php";
    }
    else{
        include "./vue/vueErreurNouvRapport.php";
    }

    include "./vue/vueNouvRapport.php";
}
elseif($type == "modificationRapport"){
    $medecins = daoMedecin::getMedecins();

    $idRapport = $_GET["id"];

    $rapport = daoRapport::getRapportsIdR($idRapport);

    $rapports = daoRapport::getRapportsIdV($_SESSION["id"]);

    $access = false;
    for($i=0;$i<count($rapports);$i++){
        if($rapports[$i]->getId() == $idRapport){
            $access = true;
        }
    }

    $date = $rapport->getDate();
    $date = $format_fr = implode('/',array_reverse  (explode('-',$date)));

    if($access==true){
        include "./vue/vueModifRapport.php";
    }
    else{
        include "./vue/vueAucunePermission.php";
    }
}
elseif($type == "execModifRapport"){
    $idRapport = $_GET["id"];
    $medecins = daoMedecin::getMedecins();

    if($_POST["date"]!=null && $_POST["motif"]!=null && $_POST["bilan"]!=null){
        daoRapport::updateRapportIdAvecDate($idRapport,$_POST["date"],$_POST["motif"],$_POST["bilan"],$_SESSION["id"],$_POST["medecin"]);
        $medecin = daoMedecin::getMedecinId($_POST["medecin"]);
        $rapport = daoRapport::getRapportsIdR($idRapport);
        $date = $rapport->getDate();
        $date = $format_fr = implode('/',array_reverse  (explode('-',$date)));
        include "./vue/vueConfirmModifR.php";
        include "./vue/vueModifRapport.php";
    }
    elseif($_POST["date"]==null && $_POST["motif"]!=null && $_POST["bilan"]!=null){
        daoRapport::updateRapportIdSansDate($idRapport,$_POST["motif"],$_POST["bilan"],$_SESSION["id"],$_POST["medecin"]);
        $medecin = daoMedecin::getMedecinId($_POST["medecin"]);
        $rapport = daoRapport::getRapportsIdR($idRapport);
        $date = $rapport->getDate();
        $date = $format_fr = implode('/',array_reverse  (explode('-',$date)));
        include "./vue/vueConfirmModifR.php";
        include "./vue/vueModifRapport.php";
    }
    else{
        $medecin = daoMedecin::getMedecinId($_POST["medecin"]);
        $rapport = daoRapport::getRapportsIdR($idRapport);
        $date = $rapport->getDate();
        $date = $format_fr = implode('/',array_reverse  (explode('-',$date)));
        include "./vue/vueErreurNouvRapport.php";
        include "./vue/vueModifRapport.php";
    }
}
elseif($type == "execSupRapport"){
    $idRapport = $_GET["id"];

    daoRapport::delRapport($idRapport);

    $rapports = daoRapport::getRapportsIdV($_SESSION["id"]);

    include "./vue/vueConfirmDelR.php";
    include "./vue/vueRapports.php";
}
elseif($type == "listeRapports"){
    /*$rapports = daoRapport::getRapportsIdV($_SESSION["id"]);

    include "./vue/vueRapports.php";*/

    if(!isset($_POST["date"]) || $_POST["date"]==null){
        $rapports = daoRapport::getRapportsIdV($_SESSION["id"]);
    }
    else{
        $rapports = daoRapport::getRapportsIdVDate($_SESSION["id"],$_POST["date"]);
    }

    if(count($rapports)==0){
        include "./vue/vueAucunRapport.php";
    }
    else{
        include "./vue/vueRapports.php";
    }
}
elseif($type == "consultRapports"){
    //Si aucune date n'est saisie, on affiche tous les rapports. Sinon, filtre par date.
    if(!isset($_POST["date"]) || $_POST["date"]==null){
        $rapports = daoRapport::getRapportsIdV($_SESSION["id"]);
    }
    else{
        $rapports = daoRapport::getRapportsIdVDate($_SESSION["id"],$_POST["date"]);
    }

    if(count($rapports)==0){
        include "./vue/vueAucunRapport.php";
    }
    else{
        include "./vue/vueConsultRapports.php";
    }
}
elseif($type == "consultUnRapport"){
    $idRapport = $_GET["id"];

    $rapport = daoRapport::getRapportsIdR($idRapport);

    $rapports = daoRapport::getRapportsIdV($_SESSION["id"]);

    $access = false;
    for($i=0;$i<count($rapports);$i++){
        if($rapports[$i]->getId() == $idRapport){
            $access = true;
        }
    }

    $Offerts = daoOffrir::getEchantillonsIdRapport($idRapport);

    $medicamentsOfferts = $Offerts->getMedicaments();

    if($access == true){
        include "./vue/vueConsultUnRapport.php";
    }
    else{
        include "./vue/vueAucunePermission.php";
    }
}
elseif($type == "listeRapportsMedecin"){
    $rapports = daoRapport::getRapportsIdM($_GET["id"]);

    if(count($rapports)==0){
        include "./vue/vueAucunRapport.php";
    }
    else{
        include "./vue/vueRapports.php";
    }
}

include "./vue/pied.html.php";

?>