<?php

/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 10.04.2019
 * Time: 09:28
 */
class RequestSQL
{

    function getUser($pseudo)
    {
        return "SELECT idUser,useFirstName,useLastName,useEmail,useHideDeath FROM t_user WHERE useFirstName = '$pseudo'";
    }

    function getAllPets($idUser)
    {
        return "SELECT petName, typName, idPet, t_user.idUser 
                FROM t_pet, t_typepet, t_user 
                WHERE t_pet.idPetType = t_typepet.idPetType 
                AND t_user.idUser = t_pet.idUser 
                AND useFirstName = '$idUser'";
    }

    function getAllPetsWithoutDeath($idUser)
    {
        return "SELECT petName, typName, idPet, t_user.idUser 
                FROM t_pet, t_typepet, t_user 
                WHERE t_pet.idPetType = t_typepet.idPetType 
                AND t_user.idUser = t_pet.idUser 
                AND useFirstName = '$idUser'                           
                AND petDeath IS NULL";
    }

    function getOnePet($petId){
        return "SELECT petName,petbirthDay,petDesc,petDeath,petMicroChip,weiWeight,petPicture 
                 FROM t_pet
                 LEFT JOIN t_weightpet ON t_pet.idPet = t_weightpet.idPet
                 WHERE t_pet.idPet = $petId";
    }

    function getGraphic($petId){
        return "SELECT weiWeight,weiDate,petName,t_weightpet.idPet
                FROM t_weightpet 
                LEFT JOIN t_pet ON t_weightpet.idPet = t_pet.idPet
                WHERE t_pet.idPet = $petId";
    }

    function getBreed(){
        return "SELECT idPetType,typName FROM t_typepet";
    }

    function addPet($Name,$birthday,$Deathday,$ShipNumber,$Description,$picture,$idCoUser,$breed){
        return "INSERT INTO t_pet (idPet, petName, petBirthDay, petDeath, petMicroChip, petDesc, petPicture, idUser, idPetType)
                VALUES (NULL, '$Name', '$birthday', $Deathday, $ShipNumber, '$Description', '$picture', '$idCoUser', '$breed')";
    }
    function getWeightByPet($idPet){
        // TODO : Essayer de le faire en une seule requête avec la fonction getAllPets
        return "SELECT weiWeight FROM t_weightpet WHERE idPet = $idPet ORDER BY idPetWeight DESC LIMIT 1";
    }

}