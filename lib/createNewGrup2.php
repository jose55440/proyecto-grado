<?php
require_once '../cheker.php';
include_once '../BD/grupo.inc.php';

$alias = $_GET['alias'];
$nombreCompleto = $_GET['nombreCompleto'];




try {
    createNewGroup($alias, $nombreCompleto);
    header("refresh:4;url=../views/createNewAula.php");
} catch (PDOException $e) {
    throw new Exception("Error al generar el aula");

    header("refresh:5;url=../views/createNewAula.php");
}
