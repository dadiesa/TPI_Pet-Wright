<?php
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 17.03.2017
 * Time: 15:53
 */
?>
<!DOCTYPE html>
<html>
<?php
session_start();


//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
include "../php/RequestSQL.php";
$DBco = new connexionPDO();
$allRequest = new RequestSQL();


$request = "SELECT weiWeight,weiDate
            FROM t_weightpet 
            INNER JOIN t_pet ON t_weightpet.idPet = t_pet.idPet";

$getAverage = $DBco->executeQuerySelect($request);


?>
<!--Liens avec Materialize-->
<head>

    <link href="../materialize/css/cssPerso.css" rel="stylesheet">
    <!--fait le lien avec le fichier javascript-->
    <script src="../javascript/javaPerso.js" type="text/javascript"></script>

    <meta charset="UTF-8">
    <title>Ouvrages</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--Lien pour le premier graphics-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</head>

<body>
<main>
    <?php
    //Affiche le menu de navigation
    include '../php/navbar.php';
    ?>

    <!--Site description-->
    <div class="row">
        <h3 class="center">Evolution du poids</h3>
        <div class="col s2 m3"></div>
        <div class="backgroundIndex col s2 m6">
            <?php

            $allDatas = '';
            $Titles = '';

            //Donnée de la partie vertical
            foreach ($getAverage as $line){
            $allData = $line['averageNotes'];
            $allDatas = $allDatas.$allData.',';
            }

            //Donnée du tableau horizontale
            $arrayLength = count($gettitle)-1;
            for ($i=0;$i < $arrayLength;$i++){
                $gettitle[$i]['booTitle'];
                $title = $gettitle[$i]['booTitle'];
                $Titles = $Titles."'".$title."', ";
            }
            $Titles = $Titles."'".$gettitle[$arrayLength]['booTitle']."'";
            ?>

            <canvas style="height:25vh;width:15vw" id="myChart"></canvas>
            <script>
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:['eee','wr333','55ff5','j7k77','33f'],
                        datasets: [{
                            //First Data
                            label: 'Moyenne des notes',
                            data: [3,4,2,1,3,],
                            borderColor: 'rgb(0,0,0)',
                            backgroundColor: 'transparent',
                        },]
                    },
                    options: {
                        responsive: true,
                        scales: {
                        yAxes: [{
                            ticks:{
                                min: 0,
                                max: 5,
                                stepSize: 1
                                }
                            }]
                        }
                }
                }
                );

            </script>
        </div>
    </div>
</main>
<!--Footer-->
<footer class="page-footer #00695c teal darken-3">
    <?php
    //inclut le footer pour ne pas le répéter sur tous les fichiers
    include '../php/footer.php';
    ?>
</footer>
</body>
</html>