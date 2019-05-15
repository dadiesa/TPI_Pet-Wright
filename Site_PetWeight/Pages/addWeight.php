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
    <body>
        <div class="row center">
            <div class="col s12 m3"></div>
            <div class="col s12 m6">
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <h1 class="center">Mes animaux</h1>
                        <p>Entrer un nouveau poids</p>
                            <!--Formulaire d'ajout de poids-->
                            <form method="post" action="#">
                                    <select class="browser-default">
                                        <option value="" disabled selected>Animal</option>
                                        <option value="1">Animal 1</option>
                                        <option value="2">Animal 2</option>
                                        <option value="3">Animal 3</option>
                                    </select>
                                    <input type="date">
                                    <input placeholder="Poids" type="number" step="any">
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
    include '../php/footer.php';
    ?>
</footer>
</body>
</html>