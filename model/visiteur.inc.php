<?php

class visiteur{

    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    private $adresse;
    private $cp;
    private $ville;
    private $dateEmbauche;

    public function __construct($unId, $unNom, $unPrenom, $unLogin, $unMdp, $uneAdresse, $unCp, $uneVille, $uneDate){
        $this->id = $unId;
        $this->nom = $unNom;
        $this->prenom = $unPrenom;
        $this->login = $unLogin;
        $this->mdp = $unMdp;
        $this->adresse = $uneAdresse;
        $this->cp = $unCp;
        $this->ville = $uneVille;
        $this->dateEmbauche = $uneDate;
    }

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getCp(){
        return $this->cp;
    }

    public function getVille(){
        return $this->ville;
    }

    public function getAdresseComplete(){
        $str = $this->getAdresse()." à ".$this->getVille();
        return $str;
    }

    public function getDate(){
        return $this->dateEmbauche;
    }
}

?>