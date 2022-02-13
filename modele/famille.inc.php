<?php

class famille{

    private $idFamille;
    private $libelle;

    public function __construct($unId,$unLibelle){
        $this->idFamille = $unId;
        $this->libelle = $unLibelle;
    }

    public function getId(){
        return $this->idFamille;
    }

    public function getLibelle(){
        return $this->libelle;
    }
}

?>
