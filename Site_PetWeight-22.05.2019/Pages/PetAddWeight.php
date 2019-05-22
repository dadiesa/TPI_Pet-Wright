<?php
include('../php/include/head.php');

//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
include "../php/RequestSQL.php";
$exeRequest = new connexionPDO();
$allRequest = new RequestSQL();


$getMyPet = "SELECT petName,idPet 
            FROM t_pet
            LEFT JOIN t_user
            ON t_pet.idUser = t_user.idUser
            WHERE useFirstName = '$_SESSION[Pseudo]'";
$idUser =

$getUser = $allRequest->getUser($_SESSION['Pseudo']);

$getMyPets = $exeRequest->executeQuerySelect($getMyPet);

?>
<main>
    <?php
    //Affiche le menu de navigation
    include '../php/include/navbar.php';
    ?>
        <div class="row center">
            <div class="col s12 m3"></div>
            <div class="col s12 m6">
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <h2 class="center">Mes animaux</h2>
                        <p>Entrer un nouveau poids</p>
                            <!--Formulaire d'ajout de poids-->
                            <form method="post" action="../php/confAddWeight.php">
                                    <select class="browser-default" name="Pet">
                                        <?php
                                        $i=0;
                                        foreach ($getMyPets as $line) {
                                            $i++;
                                            echo "<option value='".$line['idPet']."'>".$line['petName']."</option>";
                                        }//end foreach
                                        ?>
                                    </select>
                                    <input type="date" name="weightDate" id="weightDate">
                                    <input placeholder="Poids" type="number" step="any" name="weight" id="weight">
                                    <button class="waves-light btn" type="submit" name="action">Ajouter</button>
                            </form>
                        <h4 class="hiddendiv">d</h4>
                    </div>
                </div>
            </div><!--fin div col s2 m6-->
        </div><!--fin div row-->
</main>
<!--Footer-->
<footer class="page-footer #00695c teal darken-3">
    <?php
    //inclut le footer pour ne pas le répéter sur tous les fichiers
    include '../php/include/footer.php';
    ?>
</footer>
</body>
</html>