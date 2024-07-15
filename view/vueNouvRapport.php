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
                        <form action="./?action=rapports&type=nouvRapport" method="post">
                            <br>

                            <div class="form-group">
                                <label for="motifs">Motifs</label>
                                <select class="form-control form-control-sm" name="motif" id="motif-select">
                                    <option value="">Liste des motifs</option>
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
                                <select class="form-control form-control-sm" name="médecin" id="medecin-select">
                                    <option value="">Liste des médecins</option>
                                    <?php for($e=0;$e<count($medecins);$e++)
                                    {
                                    ?><hmtl><option value=<?=$medecins[$e]->getId()?>><?=$medecins[$e]->getNom()?> <?=$medecins[$e]->getPrenom()?><?php
                                            }
                                            ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="bilan">Bilan</label>
                                <textarea class="form-control" name="bilan" row="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <br>
                                <input id="datefield" for="date" type="date" name="date">
                            </div>

                            <br>
                            <button class="btn btn-primary btn-xl" type="submit" value="submit">Enregistrer le rapport</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
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