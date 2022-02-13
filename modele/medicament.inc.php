<?php

class medicament{

    private $idMed;
    private $nomCommercial;
    private $famille;
    private $composition;
    private $effets;
    private $contreIndications;

    public function __construct($unIdM,$unNom,$uneFamille,$uneCompo,$desEffets,$desContresIndications){
        $this->idMed = $unIdM;
        $this->nomCommercial = $unNom;
        $this->famille = $uneFamille;
        $this->composition = $uneCompo;
        $this->effets = $desEffets;
        $this->contreIndications = $desContresIndications;
    }

    public function getId(){
        return $this->idMed;
    }

    public function getNomCommercial(){
        return $this->nomCommercial;
    }

    public function getFamille(){
        return $this->famille;
    }

    public function getComposition(){
        return $this->composition;
    }

    public function getEffets(){
        return $this->effets;
    }

    public function getContreIndications(){
        return $this->contreIndications;
    }
}

?>