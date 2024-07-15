<?php

include "./modele/rapport.inc.php";

class daoRapport{

    public static function maxIdAllRapports(){ //retourne le plus grand id d'un rapport dans la BDD
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select max(rapport.id) as id from rapport");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $ligne = $ligne["id"];

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ligne;
    }

    public static function addRapport($uneDate,$unMotif,$unBilan,$unIdV,$unIdM){
        $idRapport = daoRapport::maxIdAllRapports()+1; //on récupère le dernière id attribué pour affecter le nouveau rapport au suivant

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into rapport (id,date,motif,bilan,idVisiteur,idMedecin) values ($idRapport,'$uneDate','$unMotif',:unBilan,'$unIdV',$unIdM);");
            $req->bindValue(':unBilan', $unBilan, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return 0;
    }

    public static function updateRapportIdAvecDate($unIdRapport,$uneDate,$unMotif,$unBilan,$unIdV,$unIdM)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("UPDATE rapport SET date=:uneDate,motif=:unMotif,bilan=:unBilan,idVisiteur=
                                :unIdV,idMedecin=:unIdM WHERE id=:unId;");
            $req->bindValue(':uneDate', $uneDate, PDO::PARAM_STR);
            $req->bindValue(':unMotif', $unMotif, PDO::PARAM_STR);
            $req->bindValue(':unBilan', $unBilan, PDO::PARAM_STR);
            $req->bindValue(':unIdV', $unIdV, PDO::PARAM_INT);
            $req->bindValue(':unIdM', $unIdM, PDO::PARAM_INT);
            $req->bindValue(':unId', $unIdRapport, PDO::PARAM_INT);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return 0;
    }

    public static function updateRapportIdSansDate($unIdRapport,$unMotif,$unBilan,$unIdV,$unIdM)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("UPDATE rapport SET motif=:unMotif,bilan=:unBilan,rapport.idVisiteur=
                                :unIdV,rapport.idMedecin=:unIdM WHERE id=:unId;");
            $req->bindValue(':unMotif', $unMotif, PDO::PARAM_STR);
            $req->bindValue(':unBilan', $unBilan, PDO::PARAM_STR);
            $req->bindValue(':unIdV', $unIdV, PDO::PARAM_STR);
            $req->bindValue(':unIdM', $unIdM, PDO::PARAM_STR);
            $req->bindValue(':unId', $unIdRapport, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return 0;
    }

    public static function getRapportsIdV($unIdV){
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from rapport where idVisiteur=:idV order by date desc");
            $req->bindValue(':idV', $unIdV, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while ($ligne){
                $visiteur = daoVisiteur::getVisiteurIdRapport($ligne["id"]);
                $medecin = daoMedecin::getMedecinIdRapport($ligne["id"]);
                $resultat[] = new rapport($ligne["id"],$ligne["date"],$ligne["motif"],$ligne["bilan"],$visiteur,
                $medecin);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getRapportsIdM($unIdM){
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from rapport where rapport.idMedecin=$unIdM");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while ($ligne){
                $visiteur = daoVisiteur::getVisiteurIdRapport($ligne["id"]);
                $medecin = daoMedecin::getMedecinIdRapport($ligne["id"]);
                $resultat[] = new rapport($ligne["id"],$ligne["date"],$ligne["motif"],$ligne["bilan"],$visiteur, $medecin);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getRapportsIdR($unIdR){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from rapport where id=:idR");
            $req->bindValue(':idR', $unIdR, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $visiteur = daoVisiteur::getVisiteurIdRapport($ligne["id"]);
            $medecin = daoMedecin::getMedecinIdRapport($ligne["id"]);
            $ligne = new rapport($ligne["id"],$ligne["date"],$ligne["motif"],$ligne["bilan"],$visiteur,
                                        $medecin);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ligne;
    }

    public static function getRapportsIdVDate($unIdV,$uneDate){
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from rapport where idVisiteur=:idV and date=:laDate");
            $req->bindValue(':idV', $unIdV, PDO::PARAM_STR);
            $req->bindValue(':laDate', $uneDate, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while ($ligne){
                $visiteur = daoVisiteur::getVisiteurIdRapport($ligne["id"]);
                $medecin = daoMedecin::getMedecinIdRapport($ligne["id"]);
                $resultat[] = new rapport($ligne["id"],$ligne["date"],$ligne["motif"],$ligne["bilan"],$visiteur,
                    $medecin);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function delRapportSansEch($unIdR){ //supprime un enregistrement de rapport sans prendre en compte les échantillons offerts

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("delete from rapport where id=$unIdR");
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return 0;
    }

    public static function delRapport($unIdR){
        daoOffrir::delOffrirIdR($unIdR); //on supprime toutes les relations entre offrir et rapport pour ne pas produire d'erreur lors de la suppression d'un rapport
        daoRapport::delRapportSansEch($unIdR); //supprime un enregistrement de rapport sans prendre en compte les échantillons offerts
    }

    public static function maxIdRapport($unIdV){
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select max(rapport.id) as id from rapport,visiteur where idVisiteur=:unIdV and visiteur.id = rapport.idVisiteur");
            $req->bindValue(':unIdV', $unIdV, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $ligne = $ligne["id"];

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ligne;
    }
}

?>