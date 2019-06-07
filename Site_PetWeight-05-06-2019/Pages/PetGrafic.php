<?php
include('../php/include/head.php');

//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
include "../php/RequestSQL.php";
$DBco = new connexionPDO();
$allRequest = new RequestSQL();

?>

<main>
    <?php
    //Affiche le menu de navigation
    include '../php/include/navbar.php';
    ?>
    </div>
    <!--Site description-->
    <div class="row">
        <h3></h3>
        <div class="col s2 m3"></div>
        <div class="backgroundIndex col s2 m6">
            <h1 class="center-align">Évolution des poids</h1>
            <?php
                $getAllPet = $allRequest->getAllPets($_SESSION['Pseudo']);
                $exeGetallPet = $DBco->executeQuerySelect($getAllPet);

            foreach ($exeGetallPet as $line){
                $PetName = $line['petName'];
                $idPet = $line['idPet'];

                $getPetWeight = "SELECT weiWeight,weiDate,petName
                                 FROM t_weightpet 
                                 INNER JOIN t_pet ON t_weightpet.idPet = t_pet.idPet
                                 WHERE t_pet.idPet = $idPet
                                 ORDER BY weiDate ASC";

                $getgraficData = $DBco->executeQuerySelect($getPetWeight);

                $allPetWeight = '';

                foreach ($getgraficData as $line){
                    $PetWeight = $line['weiWeight'];
                    $allPetWeight = $allPetWeight.$PetWeight.',';
                }

                $allWeight = '';
                $dates = '';
                //Donnée du tableau horizontale
                $arrayLength = count($getgraficData)-1;
                for ($i=0;$i < $arrayLength;$i++){
                    $getgraficData[$i]['weiDate'];
                    $date = $getgraficData[$i]['weiDate'];
                    $dates = $dates."'".$date."',";
                }
                if ($dates != "") {
                    $dates = $dates . "'" . $getgraficData[$arrayLength]['weiDate'] . "'";
                }
                ?>

                <?php echo "<h5 class='center-align'>".$PetName."</h5>"; ?>
                <div class="chart-container" style="position: relative; height:35vh; width:40vw ">
                    <canvas id="<?php echo $PetName; ?>"></canvas>
                </div>
                    <script>
                        var ctx = document.getElementById('<?php echo $PetName; ?>');
                        var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels:[<?php echo $dates; ?>],
                                    datasets: [{
                                        //First Data
                                        label: '',
                                        data: [<?php echo $allPetWeight; ?>],
                                        borderColor: 'rgb(0,0,0)',
                                        pointBackgroundColor: 'rgb(0,0,0)',
                                        backgroundColor: 'transparent',
                                    },]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    scales: {
                                        yAxes: [{
                                            stacked: true,
                                            gridLines: {
                                                display: true,
                                            }
                                        }],
                                        xAxes: [{
                                            gridLines: {
                                                display: false
                                            }
                                        }]
                                    }
                                }
                            }
                        );
                    </script>
            <?php
            }//end foreach
            ?>
        </div>
    </div>
</main>
    <?php
    //inclut le footer pour ne pas le répéter sur tous les fichiers
    include '../php/include/footer.php';
    ?>
</html>