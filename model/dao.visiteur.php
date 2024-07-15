<?php

include "visiteur.inc.php";

class daoVisiteur{

    public static function getVisiteurByLogin($login) {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from visiteur where login=:login");
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = new visiteur($resultat["id"],$resultat["nom"],$resultat["prenom"],$resultat["login"],$resultat["mdp"],
                                     $resultat["adresse"],$resultat["cp"],$resultat["ville"],$resultat["dateEmbauche"]);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getVisiteurIdRapport($unIdRapport) {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from visiteur,rapport where rapport.id=:idP and rapport.idVisiteur=visiteur.id");
            $req->bindValue('idP', $unIdRapport, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = new visiteur($resultat["id"],$resultat["nom"],$resultat["prenom"],$resultat["login"],$resultat["mdp"],
                $resultat["adresse"],$resultat["cp"],$resultat["ville"],$resultat["dateEmbauche"]);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

}

?>