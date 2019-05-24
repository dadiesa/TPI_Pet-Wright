<?php
include('../php/include/head.php');
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 23.05.2019
 * Time: 09:09
 */

//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
include "../php/RequestSQL.php";

$allRequest = new RequestSQL();
$getBreed = $allRequest->getBreed();

//requests
$exeRequest = new connexionPDO();
$getPetBreed = $exeRequest->executeQuerySelect($getBreed);

?>
    <main>
        <?php
        //Affiche le menu de navigation
        include '../php/include/navbar.php';
        ?>
        <!--Site description-->
        <div class="row">
            <!--Permet de diviser le site en plusieurs parties-->
            <div class="col s2 m3"></div>
            <div class="backgroundIndex col s2 m6">
                <?php
                    echo "<h1 class='center'>Ajouter un animal</h1>";
                ?>
                <div class="row">
                    <!--Formulaire d'ajout-->
                    <form method="post" action="../php/confPetNew.php" class="col s12" enctype="multipart/form-data">
                        <div class="row">
                            <div class="input-field col s6">
                                <p></p>
                                <input name="name" placeholder="* Nom" id="name" type="text" class="validate" value="" required>
                            </div>
                            <div class="input-field col s6">
                                <p>
                                    <label>* Date de naissance</label>
                                </p>
                                <input name="BirthDay" placeholder="* Date de naissance" id="BirthDay" type="date" class="validate" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <p>
                                    <label>Date de décès</label>
                                </p>
                                <input name="DeathDay" placeholder="Date de décès" id="DeathDay" type="date" value="">
                            </div>
                            <div class="input-field col s6">
                                <p></p>
                                <input name="microship" placeholder="Numéro de puce" id="microship" type="number" class="validate" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea name="Desc" placeholder="Descrition" id="Desc" class="validate" value=""></textarea>
                            </div>
                        </div>
                        <!--Champ pour importer les photos-->
                        <div class="row">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Photo</span>
                                    <input name="pic" type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <select class="browser-default" name="breed">
                                <?php
                                $i=0;
                                foreach ($getPetBreed as $line) {
                                    $i++;
                                    echo "<option value='".$line['idPetType']."'>".$line['typName']."</option>";
                                }//end foreach
                                ?>
                            </select>
                        </div>
                        <!--Boutons d'envoie et de réinitialisation-->
                        <button class="btn waves-effect waves-light" type="reset" name="rez">Réinitialiser
                            <i class="material-icons right"></i>
                        </button>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Valider
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                    <p>* Champs obligatoires</p>
                </div >
            </div>
        </div>
    </main>
<!--Footer-->
<?php
//inclut le footer pour ne pas le répéter sur tous les fichiers
include '../php/include/footer.php';
?>
