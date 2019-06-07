<!DOCTYPE html>
<html>
<?php
session_start();
?>

<?php
include "connexionPDO.php";
$co = new connexionPDO();
//Ràcupère les donnée du formualaire

$addWeight = "INSERT INTO `t_weightpet` (`idPetWeight`, `weiWeight`, `weiDate`, `idPet`) VALUES (NULL, '$_POST[weight]', '$_POST[weightDate]', '$_POST[Pet]')";

$insert = $co->executeQuerySelect($addWeight);

?>
<main>

</main>
<?php

$redirect = "../Pages/PetDetail.php?id=$_POST[Pet]";

header("Location: $redirect");
?>
</html>
