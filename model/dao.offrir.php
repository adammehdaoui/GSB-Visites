<?php

include "./modele/offrir.inc.php";

class daoOffrir{

    public static function getEchantillonsIdRapport($unIdR)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from offrir where idRapport=:idR");
            $req->bindValue(':idR',$unIdR,PDO::PARAM_INT);
            $req->execute();

            $leRapport = DAORapport::getRapportsIdR($unIdR);
            $offrirObj = new offrir($leRapport);
            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while($ligne){
                $leMedicament = daoMedicament::getMedicamentId($ligne["idMedicament"]);
                $quantite = $ligne["quantite"];
                $offrirObj->addMedicament($leMedicament,$quantite);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $offrirObj;
    }

    public static function addEchantillonIdR($unIdR,$unIdM,$uneQuantite){

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into offrir (idRapport,idMedicament,quantite) values ($unIdR,'$unIdM','$uneQuantite')");
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return 0;
    }

    public static function delEchantillonIdR($unIdR,$unIdM){

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("delete from offrir where idRapport=$unIdR and idMedicament=:idM");
            $req->bindValue(':idM', $unIdM, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return 0;
    }

    public static function delOffrirIdR($unIdR){ //supprime les relations entre un rapport et ses échantillons offerts (s'il y en a)

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("delete from offrir where idRapport=$unIdR");
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return 0;
    }
}

?>