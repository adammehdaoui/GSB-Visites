<?php

include "./modele/famille.inc.php";

class daoFamille{

    public static function getFamilleIdM($unIdM)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from famille,medicament where medicament.id=:id and medicament.idFamille=famille.id");
            $req->bindValue(':id',$unIdM,PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $resultat = new famille($ligne["id"],$ligne["libelle"]);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}

?>