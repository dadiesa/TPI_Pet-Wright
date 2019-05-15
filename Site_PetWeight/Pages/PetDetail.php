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
        ?>
    <div class="row">
        <div class="input-field col s3"></div>
        <div class="input-field col s6">
            <b class="left-align">Nom de l'animal</b>
            <p>Date de naissance / Date de décès</p>
            <p>Numéro de puce</p>
            <p>Dernier poids</p>
            <p>Description</p>
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