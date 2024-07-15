<body>
<br>
<br>
<center>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div name="date">
                        <p>Date de la visite : </p>
                        <?=$rapport->getDate()?>
                    </div>

                    <br>

                    <div name="motif">
                        <p>Motif de la visite : </p>
                        <?=$rapport->getMotif()?>
                    </div>

                    <br>

                    <div name="bilan">
                        <p>Bilan de la visite : </p>
                        <?=$rapport->getBilan()?>
                    </div>

                    <br>

                    <div name="medecin">
                        <p>Médecin : </p>
                        <?=$rapport->getMedecin()->getNom()." "?><?=$rapport->getMedecin()->getPrenom()?>
                    </div>

                    <br>

                    <div name="medicaments">
                        <p>Médicaments offerts :</p>
                        <?php
                        if(count($medicamentsOfferts)==0){
                            echo("Il n'y a pas d'échantillons offerts pour ce rapport.");
                        }
                        else{
                            for ($i = 0; $i < count($medicamentsOfferts); $i++) {
                                if ($medicamentsOfferts[$i][1] == 1) {
                                    echo($medicamentsOfferts[$i][1] . " échantillon de " . $medicamentsOfferts[$i][0]->getNomCommercial().".");
                                } else {
                                    echo($medicamentsOfferts[$i][1] . " échantillons de " . $medicamentsOfferts[$i][0]->getNomCommercial().".");
                                }
                                ?>
                                <br>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</center>

<br>
<br>

<center>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-success">
                        Veuillez consulter l'onglet "Modifier un rapport" à l'accueil afin de modifier les champs du
                        rapport ou l'onglet "Déclarer des échantillons" afin d'y ajouter des échantillons offerts.
                    </h5>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</center>

<br>
<br>

</body>