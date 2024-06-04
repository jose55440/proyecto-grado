<?php
require_once '../cheker.php';
include_once 'bd.inc.php';

// Comprobar pabellon para saber si ya esta creado
function checkPabellon($idPabellon)
{
    $sql = conectar()->prepare("SELECT COUNT(*) as count FROM pabellon WHERE idPabellon = :idPabellon");
    $sql->bindValue(":idPabellon", $idPabellon);
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

// Crea pabellon
function createPabellon($idPabellon, $nombre)
{
    $sql = conectar()->prepare("INSERT INTO `pabellon`(`idPabellon`, `nombre`) VALUES (:idPabellon,:nombre)");
    $sql->bindValue(":idPabellon", $idPabellon);
    $sql->bindValue(":nombre", $nombre);
    try {
        $sql->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

// Recoge todos los pabellones
function getPabellones (){
    $sql = conectar()->prepare("SELECT * FROM `pabellon` ");
    try {
        $sql->execute();
        return $sql->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
}
