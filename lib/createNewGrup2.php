<?php
require_once '../cheker.php';
include_once '../BD/grupo.inc.php';

$alias = $_GET['alias'];
$nombreCompleto = $_GET['nombreCompleto'];




try {
    createNewGroup($alias, $nombreCompleto);
    echo 'Creando grupo';
    header("refresh:4;url=../views/createNewGroup.php");
} catch (PDOException $e) {
    throw new Exception("Error al generar el grupo");

    header("refresh:5;url=../views/createNewGroup.php");
}
