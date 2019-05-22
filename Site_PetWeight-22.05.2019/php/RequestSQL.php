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

    function getAllPets($idUser){
        return "SELECT weiDate,weiWeight,petName,typName,t_pet.idPet 
                 FROM  t_pet
                 LEFT JOIN t_weightpet ON t_weightpet.idPet = t_pet.idPet 
                 LEFT JOIN t_typepet ON t_typepet.idPetType = t_pet.idPetType
                 LEFT JOIN t_user ON t_pet.idUser = t_user.idUser
                 WHERE t_user.useFirstName = '$idUser'  
                 GROUP BY(petName)
                 ORDER By idPetWeight DESC";
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

}