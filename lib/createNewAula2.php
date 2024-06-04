<?php
require_once '../cheker.php';
include_once '../BD/aula.inc.php';


$idAula = $_GET['idAula'];
$idPabellon = $_GET['idPabellon'];
$nombre = $_GET['nombre'];
$capacidad = $_GET['capacidad'];




try {
    if (!checkAula($idAula)) {
        // Crea aula
        createAula($idAula, $idPabellon, $nombre, $capacidad);
        header("refresh:4;url=../views/createNewAula.php");
    } else {
        echo 'Este aula ya esta creada';
        header("refresh:4;url=../views/createNewAula.php");
    }
} catch (PDOException $e) {
    throw new Exception("Error al generar el aula");

    header("refresh:5;url=../views/createNewAula.php");
}
