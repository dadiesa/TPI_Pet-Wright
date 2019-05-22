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
        }//end foreach
        ?>
    <div class="row">
            <div class="input-field col s3"></div>
            <div class="input-field col s6">
                    <b class="left-align"><?php echo $Email;?></b>
                    <p><?php echo "Prénom : ".$Firstname;?></p>
                    <p><?php echo "Nom de famille : ".$Lastname;?></p>
                    <b class="left-align">Changer de mot de passe</b><br>
                    <div class="col s6">
                        <br>Mot de passe actuel:
                        <div class="input-field inline">
                            <input id="ActuPwd" type="password">
                        </div>
                        <br>Nouveau mot de passe:
                        <div class="input-field inline">
                            <input id="newPwd" type="password">
                        </div>
                        Confirmer le mode de passe:
                        <div class="input-field inline">
                            <input id="confPwd" type="password">
                        </div>
                        <form action="#">
                            <p>
                                <input type="checkbox" class="filled-in" id="filled-in-box"/>
                                <label for="filled-in-box">Voir le décès des animaux</label>
                            </p>
                        </form>
                        <br>
                        <button>Sauvegarder les<br> modifications</button>
                    </div>
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