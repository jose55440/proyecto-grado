<?php
include 'bd.inc.php';

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
