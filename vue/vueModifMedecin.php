<html>
<br>
<br>
<center>

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <form action="./?action=medecins&type=execModifMedecin&id=<?=$medecin->getId()?>" method="post">
                            <div class="form-group">
                                <label for="Nom">Nom</label>
                                <br>
                                <input for="text" value="<?=$medecin->getNom()?>" name="nom">
                            </div>

                            <div class="form-group">
                                <label for="Prénom">Prénom</label>
                                <br>
                                <input for="text" value="<?=$medecin->getPrenom()?>" name="prenom">
                            </div>

                            <div class="form-group">
                                <label for="Adresse">Adresse</label>
                                <br>
                                <input for="text" value="<?=$medecin->getAdresse()?>" name="adresse">
                            </div>

                            <div class="form-group">
                                <label for="tel">Téléphone (exemple : 0753499000)</label>
                                <br>
                                <input pattern="[0]{1}[0-9]{9}" title="test test" value="<?=$medecin->getTel()?>" name="tel">
                            </div>

                            <div class="form-group">
                                <label for="Spécialité Complémentaire">Spécialité Complémentaire</label>
                                <br>
                                <input for="text" value="<?=$medecin->getSpe()?>" name="spe">
                            </div>
                            <br>
                            <button class="btn btn-primary btn-xl" type="submit" value="submit">Appliquer les modifications</button>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>

<br>
<br>

</html>