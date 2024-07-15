<?php

class offrir{

    private $rapport;
    private $lesMedicament = array(); //tableau à deux dimensions prenant en clef l'objet médicament et en valeur sa quantité

    public function __construct($unRapport){
        $this->rapport = $unRapport;
    }

    public function addMedicament($unMedicament,$uneQuantite){
        $this->lesMedicament[] = [$unMedicament,$uneQuantite];
    }

    public function getMedicaments(){
        return $this->lesMedicament;
    }

    public function getRapport(){
        return $this->rapport;
    }
}