<?php   
require_once '../cheker.php';
include_once 'bd.inc.php';




function createEquipment($nombre,$numSerie,$idAula){
    $sql = conectar()->prepare('INSERT INTO `equipamiento`(`nombre`, `numSerie`, `idAula`) VALUES (:nombre,:numSerie,:idAula)');
    $sql->bindValue(':nombre',$nombre);
    $sql->bindValue(':numSerie',$numSerie);
    $sql->bindValue(':idAula',$idAula);
    try{
        $sql->execute();
    }catch(PDOException $e){
        throw new Exception('Error al acceder ha equipamiento');
    }
    
}