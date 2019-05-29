<?php
/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 17.03.2017
 * Time: 14:01
 */

session_start();
$firstName = $_POST['firstName'];
$LasName = $_POST['LastName'];
$Email = $_POST['Email'];
$pwd = $_POST['Password'];
$pwdCheck = $_POST['PasswordValid'];
if (isset($_POST['hideDeath'])){ $hideDeath = "0";}
else $hideDeath = "1";


if($pwd == $pwdCheck) {

    $pwdHash = password_hash($_POST['Password'], PASSWORD_DEFAULT);
}
else
$pwdHash = "";

//Appel de la classs pour le PDO
include "connexionPDO.php";
$insert = "INSERT INTO t_user (idUser, useFirstName, useLastName, useEmail, usePassword, useHideDeath) 
           VALUES (NULL, '$firstName', '$LasName', '$Email', '$pwdHash', '$hideDeath')";
$allUser = "SELECT useEmail FROM t_user";
$co = new connexionPDO();
$getUsers = $co->executeQuerySelect($allUser);

echo $insert;

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
    include '../php/include/navbar.php';
    ?>


    <!--Site description-->
    <div class="row">
        <div class="col s2 m3">
            <?php
            //Parcour tous les utilisateurs existants
            $userexist = false;
            if($pwd == $pwdCheck){
                foreach($getUsers as $users)
                {
                    //Vérifie si l'utilisateur existe déjà
                    if($Email == $users['useEmail'])
                    {
                        echo "ddd";
                        $userexist = true;
                        echo "<h4>Cet email est déja utilisé. Veuillez en choisir un autre</h4>";
                        header("Location: ../Pages/registration.php?wrong=1");
                        //break;
                    }
                }
                //Si l'utilisateur existe pas il est créé
                if ($userexist == false){
                        echo "<h4>L'utilisateur " . $firstName . " à bien été créé</h4>";
                        $co->executeQuery($insert);
                    session_start();
                    $_SESSION['Pseudo'] = $firstName;
                        header("Location: ../Pages/PetsList.php");
                }
            }
            else{
                header("Location: ../Pages/registration.php?wrong=2");
            }
            ?>
        </div>
    </div>
</main>
<?php
//Footer
include '../php/include/footer.php'
?>
</body>
</html>
