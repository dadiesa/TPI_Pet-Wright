<?php
include('../php/include/head.php');

//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
include "../php/RequestSQL.php";

$allRequest = new RequestSQL();
$getUser = $allRequest->getUser($_SESSION['Pseudo']);

$NewCo = new connexionPDO();
$data = $NewCo->executeQuerySelect($getUser);
?>
   <main>
        <?php
        //Affiche le menu de navigation
        include '../php/include/navbar.php';

        foreach ($data as $line) {
        $Email = $line['useEmail'];
        $Firstname = $line['useFirstName'];
        $Lastname = $line['useLastName'];
        $HideDeath = $line['useHideDeath'];
        }//end foreach
        ?>
    <div class="row">
            <div class="input-field col s5"></div>
            <div class="input-field col s5">
                    <h1>Mon Compte</h1>
                    <b class="left-align"><?php echo $Email;?></b>
                    <p><?php echo "Prénom : ".$Firstname;?></p>
                    <p><?php echo "Nom de famille : ".$Lastname;?></p>
                    <b class="left-align">Changer de mot de passe</b><br>
                    <form method="post" action="../php/confModifUser.php">
                        <div class="col s6">
                            <br>Mot de passe actuel:
                            <div class="input-field inline">
                                <input id="ActuPwd" name="ActuPwd" type="password">
                            </div>
                            <br>Nouveau mot de passe:
                            <div class="input-field inline">
                                <input id="newPwd" name="newPwd" type="password">
                            </div>
                            Confirmer le mode de passe:
                            <div class="input-field inline">
                                <input id="confPwd" name="confPwd" type="password">
                            </div>
                                <p>
                                    <input type="checkbox" class="filled-in" name="hideDeath" id="hideDeath" <?php if ($HideDeath == '0') echo "checked"; ?>/>
                                    <label for="hideDeath">Voir les animaux décédés</label>
                                </p>
                            <br>
                            <button>Sauvegarder les<br> modifications</button>
                            <?php
                            if (isset($_GET['modif'])){
                            $GetModif = $_GET['modif'];
                                if ($GetModif == 1){
                                    echo "<p>Modification(s) effectuée(s)</p>";
                                }
                                elseif ($GetModif == 2){
                                    echo "<p style='color: blue'>Mot de passe incorrecte</p>";
                                }
                            }
                            ?>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </main>
    <?php
    //inclut le footer pour ne pas le répéter sur tous les fichiers
    include '../php/include/footer.php';
    ?>
</body>
</html>