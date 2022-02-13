<br>
<br>

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
                <?php for($i=0;$i<count($medicaments);$i++){ ?>
                    <tr>
                        <th scope="row"><?=$medicaments[$i]->getNomCommercial()?></>
                        <td><?=$medicaments[$i]->getFamille()->getLibelle()?></td>
                        <td><?=$medicaments[$i]->getComposition()?></td>
                        <!--<td><?/*=$medicaments[$i]->getEffets()*/?></td>
                        <td><?/*=$medicaments[$i]->getContreIndications()*/?></td>-->
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>