<?php

include 'bd.inc.php';


function checkAula($idAula)
{
    $sql = conectar()->prepare("select count(*) from aula where idAula=:idAula");
    $sql->bindValue(":idAula", $idAula);
    try {

        $sql->execute();
        $probe = $sql->fetch();
        if ($probe == 1) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        throw new Exception("Error al acceder a la base de datos");
    }
}



function createAula($idAula, $idPabellon, $nombre, $capacidad)
{
    $sql = conectar()->prepare("INSERT INTO `aula`(`idAula`, `idPabellon`, `nombre`, `capacidadAula`) VALUES (:idAula,:idPabellon,:nombre,:capacidad)");
    $sql->bindValue(":idAula", $idAula);
    $sql->bindValue(":idPabellon", $idPabellon);
    $sql->bindValue(":nombre", $nombre);
    $sql->bindValue(":capacidad", $capacidad);
    try {
        $sql->execute();
        echo 'Generando Aula Nueva';
    } catch (PDOException $e) {
        echo 'Error al introducir el aula';
    }
}
