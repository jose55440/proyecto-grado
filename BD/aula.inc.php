<?php
require_once '../comprobador.php';
include_once 'bd.inc.php';

function checkAula($idAula)
{
    $sql = conectar()->prepare("SELECT COUNT(*) as count FROM aula WHERE idAula = :idAula");
    $sql->bindValue(":idAula", $idAula);
    try {
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        throw new Exception("Error al acceder a la base de datos: " . $e->getMessage());
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



function searchAulaById($idAula)
{
    $sql = conectar()->prepare("SELECT * FROM `okupacion` WHERE idAula=:idAula");
    $sql->bindValue("idAula", $idAula);
    try {
        $sql->execute();
        return $sql->fetchAll();
    } catch (PDOException $e) {
        throw new Exception('Error al acceder a las aulas ');
    }
}


function searchAulaByIdToOkupation($idAula)
{
    $pdo = conectar();
    $sql = $pdo->prepare("SELECT * FROM `aula` WHERE idAula = :idAula");
    $sql->bindValue(":idAula", $idAula);

    try {
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC); // Devuelve solo una fila como un array asociativo
    } catch (PDOException $e) {
        throw new Exception('Error al acceder a las aulas: ' . $e->getMessage());
    }
}


function getAllAulas()
{
    $sql = conectar()->prepare("Select * from aula");
    try {
        $sql->execute();
        return $sql->fetchAll();
    } catch (PDOException $e) {
        throw new Exception('Error al acceder a la base de datos');
    }
}
