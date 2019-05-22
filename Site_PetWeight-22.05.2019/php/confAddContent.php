<?php
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 15.05.2019
 * Time: 15:07
 */

session_start();
//Ràcupère les donnée du formualaire
$dataToInsert = $_POST[''];


$dest = "../images/".$picture;
$tmpPicName = $_FILES['pic']['tmp_name'];

//Appel de la classs pour le PDO
include "connexionPDO.php";

//Ajoute l'image au livre dans le dossier du site
$resultat = move_uploaded_file($tmpPicName,$dest);

//Si l'utilisateur veux ajouter un livre
$insert = "";

$co = new connexionPDO();
$insertBook = $co->executeQuerySelect($insert);
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
    include '../php/navbar.php';
    ?>

</main>
<?php

header('Location:../Pages/ShowBook.php');

?>
<!--Rediriger vers la liste des livres-->
<!--<meta http-equiv="refresh" content="1; url=../Pages/ShowBook.php" />-->
</body>
</html>
