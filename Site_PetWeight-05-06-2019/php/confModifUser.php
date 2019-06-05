<?php
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 15.05.2019
 * Time: 15:07
 */

session_start();
//Ràcupère les données du formualaire
$ActuPwd = $_POST['ActuPwd'];
$newPwd = $_POST['newPwd'];
$confnewPwd = $_POST['confPwd'];
if(isset($_POST['hideDeath'])) {
    $HideDeath = '0';
}
else{
    $HideDeath = '1';
}

//Appel de la classs pour le PDO
include "connexionPDO.php";
$co = new connexionPDO();

include "RequestSQL.php";
$exeRequest = new RequestSQL();
//récupère les infos de l'utilisateur connecté
$idUser = $exeRequest->getUser($_SESSION['Pseudo']);
$getIdUser = $co->executeQuerySelect($idUser);

//Récupère le mdp lié a l'utilisateur connecté
$requete = "SELECT useFirstName, useEmail,usePassword FROM t_user WHERE useFirstName = '$_SESSION[Pseudo]'";
$data = $co->executeQuerySelect($requete);

foreach ($data as $line) {
    //vérifie que le mot de passe entré est correct
    if (password_verify($_POST['ActuPwd'], $line['usePassword'])){
        if ($newPwd != "" && $newPwd == $confnewPwd){
            $pwdHash = password_hash("$_POST[newPwd]",PASSWORD_DEFAULT);
            $UpdatePwd = "UPDATE t_user SET usePassword = '$pwdHash',useHideDeath = '$HideDeath' WHERE t_user.useFirstName = '$_SESSION[Pseudo]'";
            $setPassword = $co->executeQuerySelect($UpdatePwd);
            $modifOK = "OK";
        }//fin du deuxième if
    }//fin du premier if
    else if ($ActuPwd == "")
    {
        $UpdatePwd = "UPDATE t_user SET useHideDeath = '$HideDeath' WHERE t_user.useFirstName = '$_SESSION[Pseudo]'";
        $setPassword = $co->executeQuerySelect($UpdatePwd);
        $modifOK = "OK";
    }//fin du else
    else if ($ActuPwd != ""){
        header('Location:../Pages/user.php?modif=2');
        echo $modifOK = "KO";
    }
}//fin du foreach
?>
<!DOCTYPE html>
<html>
<!--Liens avec Materialize-->
<head>
    <meta charset="UTF-8">
    <title>Index</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../materialize/css/cssPerso.css" rel="stylesheet">

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
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>

    <?php
    //inclue la navbar de façon dynamiques
    include 'include/navbar.php';

    if ($modifOK == "OK") {
        header('Location:../Pages/user.php?modif=1');
    }
    ?>
    <h1 class="center">Modifications effectuée(s)</h1>
</main>
<?php
include 'include/footer.php';
?>
</html>
