<html>
<br>
<br>
<br>

<center>

<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <form action="./?action=rapports&type=execModifRapport&id=<?=$rapport->getId()?>" method="post">

                        <div class="form-group">
                            <label for="motif">Motif</label>
                            <select class="form-control form-control-sm" name="motif" id="motif-select">
                                <option value="<?=$rapport->getMotif()?>"><?=$rapport->getMotif()?></option>
                                <option value="recommandation de confrère">Recommandation de confrère</option>
                                <option value="Prise de contact">Prise de contact</option>
                                <option value="Demande du médecin">Demande du médecin</option>
                                <option value="Visite annuelle">Visite annuelle</option>
                                <option value="Installation nouvelle">Installation nouvelle</option>
                                <option value="installation récente">Installation récente</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="motif">Choisir le médécin</label>
                            <select class="form-control form-control-sm" name="medecin" id="medecin-select">
                                <option value="<?=$rapport->getMedecin()->getId()?>"><?=$rapport->getMedecin()->getNom()."\n".$rapport->getMedecin()->getPrenom()?></option>
                                <?php for($e=0;$e<count($medecins);$e++)
                                {
                                    ?><option value=<?=$medecins[$e]->getId()?>><?=$medecins[$e]->getNom()?> <?=$medecins[$e]->getPrenom()?></option><?php
                                        }
                                        ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="bilan">Bilan</label>
                            <br>
                            <input for="text" value="<?=$rapport->getBilan()?>" name="bilan" row="3">
                        </div>

                        <div class="form-group">
                            <p>Date actuelle : <?=$date?> </p>
                            <input id="datefield" for="date" id="date" type="date" value="<?$rapport->getDate()?>" name="date">
                        </div>

                        <br>
                        <button class="btn btn-primary btn-xl" type="submit" value="submit">Appliquer les modifications</button>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>

        <br>
        <a class="btn btn-danger btn-xl" href="./?action=rapports&type=execSupRapport&id=<?=$rapport->getId()?>">Supprimer le rapport</a>

    </div>
</div>
</center>

<br>
<br>

<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("datefield").setAttribute("max", today);
</script>

</html>