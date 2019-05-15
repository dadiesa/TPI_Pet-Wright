<?php
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 17.03.2017
 * Time: 15:53
 */
session_start();
?>
<!DOCTYPE html>
<html>

<?php

//Appel de la classs pour le PDO
include "../php/connexionPDO.php";
$NewCo = new connexionPDO();


$Pseudolog = $_SESSION['Pseudo'];
$request = "SELECT useFirstName,useLastName,useEmail FROM t_user WHERE useFirstName = '$Pseudolog'";
$data = $NewCo->executeQuerySelect($request);
?>

<!--Liens avec Materialize-->
<head>
    <!--Link to custom Css-->
    <link href="../materialize/css/cssPerso.css" rel="stylesheet">
    <!--Link to custom javascript-->
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

</head>

<body>
    <main>
        <?php
        //Affiche le menu de navigation
        include '../php/navbar.php';

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
                    <p><?php echo $Firstname;?></p>
                    <p><?php echo $Lastname;?></p>
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
    <!--Footer-->
    <footer class="page-footer #00695c teal darken-3">
        <?php
        //inclut le footer pour ne pas le répéter sur tous les fichiers
        include '../php/footer.php';
        ?>
    </footer>
</body>
</html>