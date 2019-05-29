<!DOCTYPE html>
<html>
<!--Liens avec Materialize-->
<head>
    <?php
    include "../php/materializeConnexion.php";

    ?>
    <meta charset="UTF-8">
    <title>Index</title>

    <link href="../materialize/css/cssPerso.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<main>
    <body>
        <div class="row center">
            <div class="col s12 m3"></div>
            <div class="col s12 m6">
                <div class="card white darken-1">
                    <div class="card-content black-text">
                            <h1 class="center">Pet Weight</h1>
                            <h4 class="center">Pet Weight</h4>
                            <div class=" col s12 m12">
                                <!--Formulaire de connexion-->

                                <form method="post" action="../php/confirmConnexion.php">
                                    <div class="col s12 m3"></div>
                                    <div class="input-field col s6">
                                        <input placeholder="Email" id="Email" type="text" class="validate" name="Email">
                                        <input placeholder="Mot de passe" id="Password" type="password" class="validate" name="Password">
                                        <?php if (isset($_GET['wrong'])){echo "<p style='color: blue'>Email ou mot de passe erroné</p>";}?>
                                        <p>Mot de passe oublié ?</p>
                                        <button class="right waves-light btn" type="submit" name="action">Connexion</button>
                                    </div>
                                </form>
                            </div>
                        <a href="registration.php">Créer un compte</p>
                    </div>
                </div>
            </div><!--fin div col s2 m6-->
        </div><!--fin div row-->
    </body>
</main>
</html>