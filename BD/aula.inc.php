<?php

include 'bd.inc.php';




function createAula ($idAula,$idPabellon,$nombre,$capacidad){
   
    $sql= conectar()->prepare("INSERT INTO `aula`(`idAula`, `idPabellon`, `nombre`, `capacidadAula`) VALUES (:idAula,:idPabellon,:nombre,:capacidad)");
    $sql->bindValue(":idAula", $idAula);
    $sql->bindValue(":idPabellon", $idPabellon);
    $sql->bindValue(":nombre", $nombre);
    $sql->bindValue(":capacidad", $capacidad);
    try {
        $sql->execute();
    } catch (PDOException $e) {
        throw new Exception("¡Ha ocurrido un error al general aula!");
    }
}