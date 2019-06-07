<?php
include('../php/include/head.php');
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 15.03.2017
 * Time: 14:38
 */


//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
include "../php/RequestSQL.php";

//requests
$exeRequest = new connexionPDO();
$allRequest = new RequestSQL();


$getUser = $allRequest->getUser($_SESSION['Pseudo']);
$getdataUser = $exeRequest->executeQuerySelect($getUser);
if($getdataUser[0]['useHideDeath'] == "0")
{
    $getPets = $allRequest->getAllPets($_SESSION['Pseudo']);
}
else{
    $getPets = $allRequest->getAllPetsWithoutDeath($_SESSION['Pseudo']);
}

$getdata = $exeRequest->executeQuerySelect($getPets);

?>
    <main>
        <?php
        //Affiche le menu de navigation
        include '../php/include/navbar.php';
        ?>
        <h1 class="center-align">Mes animaux</h1>
        <table>
            <!--Afiche le titre des colonnes-->
            <thead>
            <tr>
                <!--Nom des colonnes-->
                <th data-field="id">Nom</th>
                <th data-field="name">Dernier poids</th>
                <th data-field="author">Race</th>
                <th data-field="details">Détails</th>
                <th data-field="modify">Modifier</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($getdata as $line) {
                $PetID = $line["idPet"];
                echo "<tr><td>" . $line["petName"] . "</td>";
                echo "<td>";
                    $getWeight = $allRequest->getWeightByPet($line["idPet"]);
                    $getWeightData = $exeRequest->executeQuerySelect($getWeight);
                    if(isset($getWeightData[0]["weiWeight"]) != "") {
                        echo $getWeightData[0]["weiWeight"];
                    }
                    else{
                        echo "N/A";
                    }
                echo "</td>";
                echo "<td>" . $line["typName"] . "</td>";
                //Bouton détails
                echo "<td><a class='large material-icons' style='font-size:25px;' href='PetDetail.php?id="."$PetID"."'>add_circle_outline</a></td>";
                echo "<td><a class='large material-icons' style='font-size:25px;' href='PetNew.php?id="."$PetID"."&type=modif'>create</a></td></tr>";
            }//fin du foreach
            ?>
            </tbody>
        </table>
        <?php





            echo "<a class='waves-light btn' href='PetNew.php'>Ajouter un animal</a>";
        ?>
    </main>
    <!--Footer-->
    <?php
    //inclut le footer pour ne pas le répéter sur tous les fichiers
    include '../php/include/footer.php';
    ?>
</html>