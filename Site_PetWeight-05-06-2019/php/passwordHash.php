<?php

//Cette page n'est utilisée qua au début du projet quant le hash automatique n'est pas encore codé

include "../php/connexionPDO.php";

$requete = 'SELECT t_user.usePassword FROM t_user';
$passHash = new connexionPDO();

$getdata = $passHash->executeQuerySelect($requete);

foreach ($getdata as $password)
{
    //echo password_hash($password['usePassword'], PASSWORD_DEFAULT) . '<br>';

}
echo password_hash("Samuel", PASSWORD_DEFAULT) . '<br>';