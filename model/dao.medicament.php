<?php

include "./modele/medicament.inc.php";

class daoMedicament{

    public static function getMedicaments()
    {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medicament");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while ($ligne) {
                $laFamille = daoFamille::getFamilleIdM($ligne["id"]);
                $resultat[] = new medicament($ligne["id"], $ligne["nomCommercial"],$laFamille,$ligne["composition"],
                                            $ligne["effets"],$ligne["contreIndications"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getMedicamentId($unId){

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medicament where id=:idM");
            $req->bindValue(':idM', $unId, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $laFamille = daoFamille::getFamilleIdM($ligne["id"]);
            $medicamentObj = new medicament($ligne["id"], $ligne["nomCommercial"],$laFamille,$ligne["composition"],
                                        $ligne["effets"],$ligne["contreIndications"]);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }

        return $medicamentObj;
    }

    private static function getMedicamentsExcept($char){
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medicament where ".$char);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while ($ligne) {
                $laFamille = daoFamille::getFamilleIdM($ligne["id"]);
                $resultat[] = new medicament($ligne["id"], $ligne["nomCommercial"],$laFamille,$ligne["composition"],
                    $ligne["effets"],$ligne["contreIndications"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getMedicamentsNonOfferts($tabIdMed){ //à partir d'un tableau d'id de médicaments, on retourne les médicaments qui ne sont pas dedans
        $resultat = array();

        $char = '';

        if(count($tabIdMed)==0){
            $resultat = daoMedicament::getMedicaments();
        }
        else{

            for($i=0;$i<count($tabIdMed);$i++){
                if($i==0){
                    $char = $char." id!='$tabIdMed[$i]'";
                }
                else {
                    $char = $char . " and id!='$tabIdMed[$i]'";
                }
            }

            $resultat = daoMedicament::getMedicamentsExcept($char);
        }

        return $resultat;
    }

    public static function getMedicamentIdO($idO)
    {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medicament,offrir where offrir.id=:idO and offrir.idMedicament=medicament.id");
            $req->bindValue(':idO', $idO, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while ($ligne) {
                $laFamille = daoFamille::getFamilleIdM($ligne["id"]);
                $resultat[] = new medicament($ligne["id"], $ligne["nomCommercial"],$laFamille,$ligne["composition"],
                                            $ligne["effets"],$ligne["contreIndications"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}

?>