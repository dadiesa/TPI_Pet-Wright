<?php
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 13.05.2017
 * Time: 08:05
 */
?>
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
<body>
    <main>
        <div class="row center">
            <div class="col s12 m3"></div>
            <div class="col s12 m6">
                <div class="card white darken-1">
                    <div class="card-content black-text">
                        <h1 class="center">Pet Weight</h1>
                        <h4 class="center">Inscription</h4>
                        <div class=" col s12 m12">
                            <!--Formulaire de connexion-->
                            <form method="post" action="../php/confRegistration.php">
                                <div class="col s12 m3"></div>
                                <div class="input-field col s6">
                                    <div class="input-field col s6">
                                        <input name="firstName" placeholder="Prénom" id="firstName" type="text" class="validate">
                                    </div>
                                    <div class="input-field col s6">
                                        <input name="LastName" placeholder="Nom de famille" id="lastName" type="text" class="validate">
                                    </div>
                                    <div class="input-field col s12">
                                        <input name="Email" placeholder="Email" id="email" type="text" class="validate">
                                    </div>
                                    <div class="input-field col s6">
                                        <input name="Password" placeholder="Mot de passe" id="Password" type="password" class="validate">
                                    </div>
                                    <div class="input-field col s6">
                                        <input name="PasswordValid" placeholder="Mot de passe" id="PasswordValid" type="password" class="validate">
                                    </div>
                                        <p>
                                            <input name="hideDeath" type="checkbox" class="filled-in" id="hideDeath"/>
                                            <label for="hideDeath">Voir le décès des animaux</label>
                                        </p>
                                    <button class="right waves-light btn" type="submit" name="action">Valider</button>
                                </div>
                            </form>
                        </div>
                        <a class="right-align" href="loginPage.php">Connexion</a>
                        </div>
                    </div>
                </div><!--fin div col s2 m6-->
            </div>
        </div><!--fin div row-->
    </main>
</body>
</html>
