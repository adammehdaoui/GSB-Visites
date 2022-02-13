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

if($type=="AddOrDelMedicament"){
    $idRapport = $_GET["id"];

    $Offerts = daoOffrir::getEchantillonsIdRapport($idRapport);

    $medicamentsOfferts = $Offerts->getMedicaments();

    $tabMed = array();

    //on récupère un tableau d'id de médicaments
    for($i=0;$i<count($medicamentsOfferts);$i++){
        $tabMed[] = $medicamentsOfferts[$i][0]->getId();
    }

    //on récupère les médicaments qui ne sont pas le tableau d'id afin d'afficher la possibilité de les ajouter (on ne vas pas afficher
    //la possibilité d'ajouter un échantillon qui est déjà contenu dans le rapport)
    $listeMedicaments = daoMedicament::getMedicamentsNonOfferts($tabMed);

    if(count($medicamentsOfferts)==0){
        include "./vue/vueAucunMedicament.php";
        include "./vue/vueListeMedicamentsForm.php";
    }
    else{
        include "./vue/vueOffertsRapport.php";
        include "./vue/vueListeMedicamentsForm.php";
    }
}
elseif($type=="execAddMed"){
    $idRapport = $_GET["idR"];
    $idMedicament = $_GET["idM"];
    $quantite = $_POST["nombre"];

    //Si la quantité saisie est nulle, on recharge la page sans modification afin de pas ajouter une quantité à 0 dans la BDD
    if($quantite!=null){
        daoOffrir::addEchantillonIdR($idRapport,$idMedicament,$quantite);

        $Offerts = daoOffrir::getEchantillonsIdRapport($idRapport);

        $medicamentsOfferts = $Offerts->getMedicaments();

        $tabMed = array();

        for($i=0;$i<count($medicamentsOfferts);$i++){
            $tabMed[] = $medicamentsOfferts[$i][0]->getId();
        }

        $listeMedicaments = daoMedicament::getMedicamentsNonOfferts($tabMed);

        if(count($medicamentsOfferts)==0){
            include "./vue/vueAucunMedicament.php";
            include "./vue/vueListeMedicamentsForm.php";
        }
        else{
            include "./vue/vueOffertsRapport.php";
            include "./vue/vueListeMedicamentsForm.php";
        }
    }
    else{
        $Offerts = daoOffrir::getEchantillonsIdRapport($idRapport);

        $medicamentsOfferts = $Offerts->getMedicaments();

        $tabMed = array();

        for($i=0;$i<count($medicamentsOfferts);$i++){
            $tabMed[] = $medicamentsOfferts[$i][0]->getId();
        }

        $listeMedicaments = daoMedicament::getMedicamentsNonOfferts($tabMed);

        if(count($medicamentsOfferts)==0){
            include "./vue/vueAucunMedicament.php";
            include "./vue/vueListeMedicamentsForm.php";
        }
        else{
            include "./vue/vueOffertsRapport.php";
            include "./vue/vueListeMedicamentsForm.php";
        }
    }
}
elseif($type=="execDelMed"){
    $idRapport = $_GET["idR"];
    $idMedicament = $_GET["idM"];

    daoOffrir::delEchantillonIdR($idRapport,$idMedicament);

    $Offerts = daoOffrir::getEchantillonsIdRapport($idRapport);

    $medicamentsOfferts = $Offerts->getMedicaments();

    $tabMed = array();

    for($i=0;$i<count($medicamentsOfferts);$i++){
        $tabMed[] = $medicamentsOfferts[$i][0]->getId();
    }

    $listeMedicaments = daoMedicament::getMedicamentsNonOfferts($tabMed);

    if(count($medicamentsOfferts)==0){
        include "./vue/vueAucunMedicament.php";
        include "./vue/vueListeMedicamentsForm.php";
    }
    else{
        include "./vue/vueOffertsRapport.php";
        include "./vue/vueListeMedicamentsForm.php";
    }
}
elseif($type=="listeOfferts"){
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
        include "./vue/vueOfferts.php";
    }
}

include "./vue/pied.html.php";