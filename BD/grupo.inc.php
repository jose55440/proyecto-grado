<?php   
require_once '../cheker.php';
include_once 'bd.inc.php';


// Crea un nuevo grupo
function createNewGroup($alias,$nombreCompleto){
    $sql= conectar()->prepare('INSERT INTO `grupo` (`alias`, `nombreCompleto`)  VALUES (:alias,:nombreCompleto)');
    $sql->bindValue(":alias",$alias);
    $sql->bindValue(":nombreCompleto",$nombreCompleto);

    try{
        $sql->execute();
    
    }catch(PDOException $e){
        throw new Exception('Error al acceder a los grupos');
    }
}

// Recoge todos los grupos
function getGrupos(){
    $sql =conectar()->prepare("select * from grupo");
    try{
        $sql->execute();
        return $sql->fetchAll();
    }catch(PDOException $e){
        throw new Exception('Error al acceder a los grupos');
    }
}

// Consigue el alias por el id del grupo
function getAliasGrupById($idGrupo){
    $sql =conectar()->prepare("select alias from grupo where id=:id");
    $sql->bindValue(':id',$idGrupo);
    try{
        $sql->execute();
        return $sql->fetchColumn();
    }catch(PDOException $e){
        throw new Exception('Error al acceder a los grupos');
    }
}