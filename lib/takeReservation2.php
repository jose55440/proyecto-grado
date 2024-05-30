<?php
require_once '../comprobador.php';
include_once '../BD/ocupacion.inc.php';


$idAula=$_GET['idAula'];
$idHora=$_GET['idHora'];
$idMes=$_GET['idMes'];
$idDia=$_GET['idDia'];
$idGrupo=$_GET['idGrupo'];
$idUsuario=$_SESSION['userCheked']['nre'];



if (checkReservation($idAula, $idHora, $idMes, $idDia)) {
    echo "Ese aula ya esta reservada";
} else {
    try {
        createReservation($idAula, $idHora, $idMes, $idDia, $idGrupo, $idUsuario);
        echo "Reserva realizada con éxito.";
    } catch (PDOException $e) {
        die("Error al realizar la reserva: " . $e->getMessage());
    }
}
