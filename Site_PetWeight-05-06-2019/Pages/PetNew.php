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
$exeRequest = new connexionPDO();
$getBreed = $allRequest->getBreed();


if(isset($_GET['type']) && isset($_GET['id'])) {
    $modif = $_GET['type'];
    $idPet = $_GET['id'];
    $getInfoPet = $allRequest->getOnePet($idPet);
    $exeGetInfoPet = $exeRequest->executeQuerySelect($getInfoPet);

    $petName = $exeGetInfoPet[0]['petName'];
    $petBirthDay = $exeGetInfoPet[0]['petbirthDay'];
    $petDesc = $exeGetInfoPet[0]['petDesc'];
    $petDeath = $exeGetInfoPet[0]['petDeath'];
    $getShip = $exeGetInfoPet[0]['petMicroChip'];
    $getPicture = $exeGetInfoPet[0]['petPicture'];
}
//requests
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
            <div class="backgroundIndex col s12 m6">
                <?php
                    if (isset($petName)){
                        echo "<h1 class='center'>Modifier un animal</h1>";
                    }else{
                        echo "<h1 class='center'>Ajouter un animal</h1>";
                    }
                ?>
                <div class="row">
                    <!--Formulaire d'ajout-->
                    <?php
                    if (isset($petName)){
                        echo "<form method='post' action='../php/confPetNew.php?type=modif&idPet=$_GET[id]' class='col s12' enctype='multipart/form-data'>";}
                    else{
                        echo "<form method='post' action='../php/confPetNew.php?type=add' class='col s12' enctype='multipart/form-data'>";
                    }
                    ?>
                        <div class="row">
                            <div class="input-field col s6">
                                <p></p>
                                <input name="name" placeholder="* Nom" id="name" type="text" class="validate" value="<?php if (isset($petName))echo $petName; ?>" required>
                            </div>
                            <div class="input-field col s6">
                                <p>
                                    <label>* Date de naissance</label>
                                </p>
                                <input name="BirthDay" placeholder="* Date de naissance" id="BirthDay" type="date" class="validate" value="<?php if (isset($petName))echo $petBirthDay; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <p>
                                    <label>Date de décès</label>
                                </p>
                                <input name="DeathDay" placeholder="Date de décès" id="DeathDay" type="date" value="<?php if (isset($petName))echo $petDeath; ?>">
                            </div>
                            <div class="input-field col s6">
                                <p></p>
                                <input name="microship" placeholder="Numéro de puce" id="microship" type="number" class="validate" value="<?php if (isset($petName))echo $getShip; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea name="Desc" placeholder="Descrition" id="Desc" class="validate" value="<?php if (isset($petName))echo $petDesc; ?>"></textarea>
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
                                    <?php
                                    if (isset($petName) && $getPicture != ""){
                                        echo "<input value='$getPicture' class='file-path validate' type='text' id='pict' name='pict'>";}
                                    else{
                                        echo "<input value='N/A' class='file-path validate' type='text' id='pict' name='pict'>";
                                    }
                                    ?>
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
