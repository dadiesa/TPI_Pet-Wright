<?php
include('../php/include/head.php');

/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 13.05.2019
 * Time: 15:53
 */

//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
include "../php/RequestSQL.php";
$exeRequest = new connexionPDO();
$allRequest = new RequestSQL();

$petId = $_GET['id'];

//request
$getPetDetail = $allRequest->getOnePet($petId);

// Toutes les infos sur l'utilisateur
$getUser = $allRequest->getUser($_SESSION['Pseudo']);

$getdata = $exeRequest->executeQuerySelect($getPetDetail);
$HideDeath = $exeRequest->executeQuerySelect($getUser);
?>
    <main>
        <?php
        //Affiche le menu de navigation
        include '../php/include/navbar.php';

        foreach ($getdata as $line) {
            $petName = $line['petName'];
            $petBirthDay = $line['petbirthDay'];
            $petDesc = $line['petDesc'];
            $petDeath = $line['petDeath'];
            $petShip = $line['petMicroChip'];
            $LastWeight = $line['weiWeight'];
            $picture = $line['petPicture'];
        }//end foreach

        foreach ($HideDeath as $line){
            $hideDeath = $line['useHideDeath'];
        }

        ?>
    <div class="row">
        <div class="center-align input-field col s6">
            <b class="left-align"><?php echo $petName; ?></b>
            <p><?php echo $petBirthDay; if ($petDeath != ""){ echo " / ".$petDeath; }?></p>
            <?php
            if ($petShip != "")
                {echo "<p>Numéro de puce : $petShip </p>";}
            ?>
            <?php
            if ($LastWeight != "")
                {echo "<p>Dernier poids : $LastWeight </p>";}
            ?>
            <p><?php echo $petDesc; ?></p>
        </div>
        <div class="input-field col s6">
                <img class="responsive-img" width="25%" src="../images/<?php echo $picture?>">
        </div>
    </div>
    <div class="row">
        <div class="right-align col s2 m3">
            <a href="PetsList.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons ">arrow_back</i></a>
        </div>
        <div class="center-align input-field col s6">
            <?php
            //récupère la request afin d'avoir les donnée du tableau
            $getGraphic = $allRequest->getGraphic($petId);
            //Exécute la requete
            $getgraficData = $exeRequest->executeQuerySelect($getGraphic);

            $allPetWeight = '';
            //donnée du tableau vertical
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
            if ($dates != ""){
            $dates = $dates."'".$getgraficData[$arrayLength]['weiDate']."'";}
            ?>
            <div class="chart-container" style="position: relative; height:35vh; width:40vw">
                <canvas id="myChart"></canvas>
            </div>
            <script>
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels:[<?php echo $dates; ?>],
                            datasets: [{
                                //First Data
                                label: '<?php echo $getgraficData[0]['petName'];?>',
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
            echo "<a href='../php/delete.php?id=$petId' class='waves-light btn red' onClick=\"javascript: return confirm('Voulez-vous supprimer votre animal de compagnie');\">Supprimer l'animal</a>" ?>
        </div>
    </div>
    </main>
    <!--Footer-->
    <?php
    //inclut le footer pour ne pas le répéter sur tous les fichiers
    include '../php/include/footer.php';
    ?>
</html>