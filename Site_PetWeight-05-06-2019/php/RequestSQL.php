<?php

/**
 * Created by PhpStorm.
 * User: dadiesa
 * Date: 10.04.2019
 * Time: 09:28
 */
class RequestSQL
{
    /**
     * @param $pseudo : nom de l'utilisateur connecté
     * @return string
     */
    function getUser($pseudo)
    {
        return "SELECT idUser,useFirstName,useLastName,useEmail,useHideDeath FROM t_user WHERE useFirstName = '$pseudo'";
    }

    /**
     * @param $idUser : id de l'utilisateur connecté
     * @return string
     */
    function getAllPets($idUser)
    {
        return "SELECT petName, typName, idPet, t_user.idUser 
                FROM t_pet, t_typepet, t_user 
                WHERE t_pet.idPetType = t_typepet.idPetType 
                AND t_user.idUser = t_pet.idUser 
                AND useFirstName = '$idUser'";
    }

    /**
     * @param $idUser : id de l'utilisateur connecté
     * @return string
     */
    function getAllPetsWithoutDeath($idUser)
    {
        return "SELECT petName, typName, idPet, t_user.idUser 
                FROM t_pet, t_typepet, t_user 
                WHERE t_pet.idPetType = t_typepet.idPetType 
                AND t_user.idUser = t_pet.idUser 
                AND useFirstName = '$idUser'                           
                AND petDeath IS NULL";
    }

    /**
     * @param $petId : id de l'animal
     * @return string
     */
    function getOnePet($petId){
        return "SELECT petName,petbirthDay,petDesc,petDeath,petMicroChip,weiWeight,petPicture 
                 FROM t_pet
                 LEFT JOIN t_weightpet ON t_pet.idPet = t_weightpet.idPet
                 WHERE t_pet.idPet = $petId";
    }

    /**
     * @param $petId : id de l'animal
     * @return string
     */
    function getGraphic($petId){
        return "SELECT weiWeight,weiDate,petName,t_weightpet.idPet
                FROM t_weightpet 
                LEFT JOIN t_pet ON t_weightpet.idPet = t_pet.idPet
                WHERE t_pet.idPet = $petId";
    }

    /**
     * @return string
     */
    function getBreed(){
        return "SELECT idPetType,typName FROM t_typepet";
    }

    /**
     * @param $Name : nom du pet
     * @param $birthday : date de naissance
     * @param $Deathday : date de mort
     * @param $ShipNumber : numéro de puce
     * @param $Description : description de l'animal
     * @param $picture : nom de l'image
     * @param $idCoUser : id de l'utilisateur connecté
     * @param $breed : id de la race
     * @return string
     */
    function addPet($Name,$birthday,$Deathday,$ShipNumber,$Description,$picture,$idCoUser,$breed){
        return "INSERT INTO t_pet (idPet, petName, petBirthDay, petDeath, petMicroChip, petDesc, petPicture, idUser, idPetType)
                VALUES (NULL, '$Name', '$birthday', $Deathday, $ShipNumber, '$Description', '$picture', '$idCoUser', '$breed')";
    }

    /**
     * @param $Name : nom du pet
     * @param $birthday : date de naissance
     * @param $Deathday : date de mort
     * @param $ShipNumber : numéro de puce
     * @param $Description : description de l'animal
     * @param $picture : nom de l'image
     * @param $idCoUser : id de l'utilisateur connecté
     * @param $breed : race de l'animal
     * @param $idPet : id de l'animal
     * @return string
     */
    function modifPet($Name,$birthday,$Deathday,$ShipNumber,$Description,$picture,$idCoUser,$breed,$idPet){
        return "UPDATE t_pet 
                SET petName = '$Name', petBirthDay = '$birthday', petDeath = $Deathday, petMicroChip = $ShipNumber, petDesc = '$Description', petPicture = '$picture', idUser = '$idCoUser', idPetType = $breed
                WHERE t_pet.idPet = $idPet";
    }

    /**
     * @param $idPet : id de l'animal
     * @return string
     */
    function getWeightByPet($idPet){
        // TODO : Essayer de le faire en une seule requête avec la fonction getAllPets
        return "SELECT weiWeight FROM t_weightpet WHERE idPet = $idPet ORDER BY idPetWeight DESC LIMIT 1";
    }



}