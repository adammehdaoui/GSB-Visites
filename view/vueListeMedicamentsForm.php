<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Nom commercial</th>
                    <th scope="col">Famille</th>
                    <th scope="col">Composition</th>
                    <!--<th scope="col">Effets</th>
                    <th scope="col">Contre indications</th>-->
                </tr>
                </thead>
                <tbody>
                <?php for($i=0;$i<count($listeMedicaments);$i++){ ?>
                    <tr>
                        <th scope="row"><?=$listeMedicaments[$i]->getNomCommercial()?></>
                        <td><?=$listeMedicaments[$i]->getFamille()->getLibelle()?></td>
                        <td><?=$listeMedicaments[$i]->getComposition()?></td>
                        <!--<td><?/*=$medicaments[$i]->getEffets()*/?></td>
                        <td><?/*=$medicaments[$i]->getContreIndications()*/?></td>-->
                        <td>
                            <form action="./?action=medicaments&type=execAddMed&idR=<?=$idRapport?>&idM=<?=$listeMedicaments[$i]->getId()?>" method="post">
                                <div class="form-group">
                                    <label for="nombre"></label>
                                    <input type="number" min="1" max="20" class="form-control" name="nombre" row="3">
                                </div>
                                <button class="btn btn-primary btn-xl" type="submit" value="submit">Ajouter la quantité</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br>
<br>