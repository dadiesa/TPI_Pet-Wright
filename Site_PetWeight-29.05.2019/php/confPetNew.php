<?php
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 15.05.2019
 * Time: 15:07
 */

session_start();

//Ràcupère les données du formualaire
$addOrModif = $_GET['type'];
if ($addOrModif == "modif"){
$idPet = $_GET['idPet'];
echo $picture = $_POST['pict'];
}
else{
    echo $picture = $_FILES['pic']['name'];
}
$Name = $_POST['name'];
$birthday = $_POST['BirthDay'];
$Description = $_POST['Desc'];
//Vérifie si l'utilisation à rentré une date de mort
if($_POST['DeathDay'] != NULL) {
    $Deathday = "'$_POST[DeathDay]'";
}
else{
    $Deathday = 'NULL';
}


//Vérifie si l'utilisation à rentré un numéro de puce
    if($_POST['microship'] != NULL) {
        $ShipNumber = $_POST['microship'];
    }
    else{
        $ShipNumber = 'NULL';
    }
$dest = "../images/".$picture;
$tmpPicName = $_FILES['pic']['tmp_name'];
$breed = $_POST['breed'];

//Appel de la classs pour le PDO
include "connexionPDO.php";
$co = new connexionPDO();


include "RequestSQL.php";
$exeRequest = new RequestSQL();
//récupère l'id de l'utilisateur connecté
$idUser = $exeRequest->getUser($_SESSION['Pseudo']);
$getIdUser = $co->executeQuerySelect($idUser);

$idCoUser = $getIdUser[0]['idUser'];

if ($addOrModif == "modif" && $picture != "") {
    echo $newPet = $exeRequest->modifPet($Name,$birthday,$Deathday,$ShipNumber,$Description,$picture,$idCoUser,$breed,$idPet);
}
else if($addOrModif == "add") {
    echo $newPet = $exeRequest->addPet($Name,$birthday,$Deathday,$ShipNumber,$Description,$picture,$idCoUser,$breed);
}
$insertPet = $co->executeQuerySelect($newPet);

//Ajoute l'image au livre dans le dossier du site
$resultat = move_uploaded_file($tmpPicName,$dest);



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
       header('Location:../Pages/PetsList.php');
    ?>

</main>
<!--Rediriger vers la liste des livres-->
<!--<meta http-equiv="refresh" content="1; url=../Pages/ShowBook.php" />-->
</body>
</html>
