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
            <form action="" method="post">
                <div>
                    Recherche par nom :
                </div>
                <div class="form-group">
                    <input name="text" type="text" id="text" class="form-check">
                </div>
                <div>
                    <button class="btn btn-primary btn-xl" type="submit" value="submit">Appliquer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<br>

<div class="row" style="right=5px">
    <div class="card col-12">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <table style="width: 50%;" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Specialité Complémentaire</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for($i=0;$i<count($medecins);$i++){ ?>
                        <tr>
                            <th scope="row"><?=$medecins[$i]->getNom()?></th>
                            <td><?=$medecins[$i]->getPrenom()?></td>
                            <td><?=$medecins[$i]->getAdresse()?></td>
                            <td><a href="./?action=rapports&type=listeRapportsMedecin&id=<?=$medecins[$i]->getId()?>"><?=$medecins[$i]->getTel()?></a></td>
                            <td><?=$medecins[$i]->getSpe()?></td>
                            <td><a href="./?action=medecins&type=modificationMedecin&id=<?=$medecins[$i]->getId()?>"><img src="assets/images/crayon.png"></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<br>
<br>