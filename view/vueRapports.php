<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-10">
        </div>
        <div class="col-2">
            <!--<form action="./?action=test" method="post">
                <div class="form-group">
                    <input type="date" for="date" nom="date">
                </div>

                <button class="btn btn-success btn-xl" type="submit" value="submit">Appliquer la date</button>
            </form>-->
            <form method="post" action="./?action=rapports&type=listeRapports">
                <div>
                    Filtrer par date :
                </div>
                <div class="form-group">
                    <input name="date" type="date" id="date" class="form-check">
                </div>
                <div>
                    <button class="btn btn-primary btn-xl" type="submit" value="submit">Appliquer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<br>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-center">
            <table style="width: 50%;" class="table">
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Motif</th>
                    <th scope="col">Bilan</th>
                    <th scope="col">Médecin</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                for($i=0;$i<count($rapports);$i++){ ?>
                    <tr>
                        <th scope="row"><?=$rapports[$i]->getDate()?></th>
                        <td><?=$rapports[$i]->getMotif()?></td>
                        <td><?=$rapports[$i]->getBilan()?></td>
                        <td><?=$rapports[$i]->getMedecin()->getNom()."\n".$rapports[$i]->getMedecin()->getPrenom()?></td>
                        <td><a href="./?action=rapports&type=modificationRapport&id=<?=$rapports[$i]->getId()?>"><img src="assets/images/crayon.png"></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<br>
<br>