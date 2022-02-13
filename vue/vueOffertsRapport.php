<body>
<br>
<br>
<center>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div name="para">
                        Vous avez offert ces échantillons lors de votre visite :
                        <br>
                        <br>
                    </div>
                    <div class="row">
                                <?php
                                    for($i=0;$i<count($medicamentsOfferts);$i++){
                                        ?>
                                        <div>
                                        <?php
                                        if($medicamentsOfferts[$i][1]==1){
                                            echo($medicamentsOfferts[$i][1] . " échantillon de " . $medicamentsOfferts[$i][0]->getNomCommercial());
                                        }
                                        else{
                                            echo($medicamentsOfferts[$i][1] . " échantillons de " . $medicamentsOfferts[$i][0]->getNomCommercial());
                                        }
                                        ?>
                                        </div>
                                        <a href="./?action=medicaments&type=execDelMed&idR=<?=$idRapport?>&idM=<?=$medicamentsOfferts[$i][0]->getId()?>"><img src="assets/images/poubelle.jpg" class="col-1"></a>
                                <?php
                                    }
                                ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>

    <br>
    <br>
</center>

</body>