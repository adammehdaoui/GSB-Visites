<?php

class rapport{

    private $idRapport;
    private $date;
    private $motif;
    private $bilan;
    private $visiteur;
    private $medecin;
    private $echantillonsOfferts = array();

    public function __construct($unId,$uneDate,$unMotif,$unBilan,$unVisiteur,$unMedicament){
        $this->idRapport = $unId;
        $this->date = $uneDate;
        $this->motif = $unMotif;
        $this->bilan = $unBilan;
        $this->visiteur = $unVisiteur;
        $this->medecin = $unMedicament;
    }

    public function addEchantillon($unIdMedicament,$quantite){
        $this->echantillonsOfferts[] = [$unIdMedicament,$quantite]; //tableau à deux dimensions
    }

    public function getId(){
        return $this->idRapport;
    }

    public function getDate(){
        return $this->date;
    }

    public function getMotif(){
        return $this->motif;
    }

    public function getBilan(){
        return $this->bilan;
    }

    public function getVisiteur(){
        return $this->visiteur;
    }

    public function getMedecin(){
        return $this->medecin;
    }
}

?>