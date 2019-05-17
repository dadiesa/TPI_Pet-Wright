<?php
include('../php/include/head.php');
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 17.03.2017
 * Time: 15:53
 */



//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
include "../php/RequestSQL.php";

$allRequest = new RequestSQL();
$getPets = $allRequest->getAllPets($_SESSION['Pseudo']);

//requests
$exeRequest = new connexionPDO();
$getdata = $exeRequest->executeQuerySelect($getPets);

//echo $getPetWeight;


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
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($getdata as $line) {
                $PetID = $line["idPet"];
                echo "<tr><td>" . $line["petName"] . "</td>";
                echo "<td>";
                    if($line["weiWeight"] != "")
                    {echo $line["weiWeight"];}
                    else{echo "N/A";}
                echo "</td>";
                echo "<td>" . $line["typName"] . "</td>";
                echo "<td><a class='large material-icons' style='font-size:25px;' href='PetDetail.php?id="."$PetID"."'>add_circle_outline</a></td></tr>";
            }//end foreach
            ?>
            </tbody>
        </table>


    </main>
    <!--Footer-->
    <?php
    //inclut le footer pour ne pas le répéter sur tous les fichiers
    include '../php/include/footer.php';
    ?>

</html>