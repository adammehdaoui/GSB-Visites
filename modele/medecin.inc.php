<?php

class medecin{

    private $idMedecin;
    private $nom;
    private $prenom;
    private $adresse;
    private $tel;
    private $specialiteComplementaire;
    private $departement;

    public function __construct($unId,$unNom,$unPrenom,$uneAdresse,$unTel,$uneSpecialiteComp,$unDepartement){
        $this->idMedecin = $unId;
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
        $this->adresse = $uneAdresse;
        $this->tel = $unTel;
        $this->specialiteComplementaire = $uneSpecialiteComp;
        $this->departement = $unDepartement;
    }

    public function getId(){
        return $this->idMedecin;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getTel(){
        return $this->tel;
    }

    public function getSpe(){
        return $this->specialiteComplementaire;
    }

    public function getDep(){
        return $this->departement;
    }
}

?>