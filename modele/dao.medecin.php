<?php

include "./modele/medecin.inc.php";

class daoMedecin
{

    public static function getMedecins()
    {
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medecin order by nom ASC, prenom ASC");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while ($ligne) {
                $resultat[] = new medecin($ligne["id"], $ligne["nom"], $ligne["prenom"], $ligne["adresse"], $ligne["tel"],
                    $ligne["specialitecomplementaire"], $ligne["departement"]);

                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getMedecinId($unId)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medecin where id=:id");
            $req->bindValue(':id', $unId, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $ligne = new medecin($ligne["id"], $ligne["nom"], $ligne["prenom"], $ligne["adresse"], $ligne["tel"],
                                    $ligne["specialitecomplementaire"], $ligne["departement"]);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ligne;
    }

    public static function getMedecinIdRapport($unIdRapport)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select medecin.id,medecin.nom,medecin.prenom,medecin.adresse,medecin.tel,
                                        medecin.specialiteComplementaire,medecin.departement from medecin,rapport where 
                                        rapport.id=:idR and rapport.idMedecin=medecin.id");
            $req->bindValue(':idR', $unIdRapport, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $ligne = new medecin($ligne["id"], $ligne["nom"], $ligne["prenom"], $ligne["adresse"], $ligne["tel"],
                                $ligne["specialiteComplementaire"], $ligne["departement"]);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ligne;
    }

    public static function updateMedecinId($unIdMedecin,$unNom,$unPrenom,$uneAdresse,$unTel,$uneSpe)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("UPDATE medecin SET nom=:unNom,prenom=:unPrenom,adresse=:uneAdresse,tel=
                                :unTel,specialitecomplementaire=:uneSpe WHERE id=:unId;");
            $req->bindValue(':unNom', $unNom, PDO::PARAM_STR);
            $req->bindValue(':unPrenom', $unPrenom, PDO::PARAM_STR);
            $req->bindValue(':uneAdresse', $uneAdresse, PDO::PARAM_STR);
            $req->bindValue(':unTel', $unTel, PDO::PARAM_STR);
            $req->bindValue(':uneSpe', $uneSpe, PDO::PARAM_STR);
            $req->bindValue(':unId', $unIdMedecin, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return 0;
    }

    public static function getMedecinsNom($unNom){
        $resultat = array();

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from medecin where nom like lower('$unNom%')");
            $req->execute();
            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            while ($ligne) {
                $resultat[] = new medecin($ligne["id"], $ligne["nom"], $ligne["prenom"], $ligne["adresse"], $ligne["tel"],
                    $ligne["specialitecomplementaire"], $ligne["departement"]);

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