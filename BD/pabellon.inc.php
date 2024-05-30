<?php
require_once '../comprobador.php';
include_once 'bd.inc.php';

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


function recogerPabellones (){
    $sql = conectar()->prepare("SELECT * FROM `pabellon` ");
    try {
        $sql->execute();
        return $sql->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
}
