<?php
/**
 * User: dadiesa
 * Date: 31.03.2017
 */

include "../php/connexionPDO.php";

$NewCo = new connexionPDO();

//Récupère le pseudo et le mot de passe de l'utilisateur
$login = $_POST['Email'];
$passwordEnter = $_POST['Password'];


//Récupère le mdp lier au nom d'utilisateur entré
$requete = "SELECT useFirstName, useEmail,usePassword FROM t_user WHERE useEmail = '$login'";
$data = $NewCo->executeQuerySelect($requete);


//Vérifie si l'utilisateur existe
if ( !$data ) {
    //indique que l'utilisateur s'est trompé
    $wrong = "?wrong=1";
    $wrongPwd = "../Pages/loginPage.php".$wrong." ";
    header("Location: $wrongPwd");
}
else
{
    foreach ($data as $line) {
        $passwordDB = $line['usePassword'];

        echo $line['useEmail'];

        //Vérifie si l'utilisateur a mis le bon pseudo avec le bon mot de passe.
        if (password_verify($passwordEnter, $passwordDB)) {
            session_start();
            $_SESSION['Pseudo'] = $line['useFirstName'];
            header('Location: ../Pages/myPets.php');
        }//end if
        else {
            //indique que l'utilisateur s'est trompé
            $wrong = "?wrong=1";
            $wrongPwd = "../Pages/loginPage.php".$wrong." ";
            header("Location: $wrongPwd");

        }
    }//end foreach
}
?>