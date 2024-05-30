<?php
// deleteReservation.php

require_once '../comprobador.php';
include '../BD/ocupacion.inc.php';
if (isset($_GET['idAula']) && isset($_GET['idHora']) && isset($_GET['idMes']) && isset($_GET['idDia'])) {
    $idAula = $_GET['idAula'];
    $idHora = $_GET['idHora'];
    $idMes = $_GET['idMes'];
    $idDia = $_GET['idDia'];

    // Llamar a la función para eliminar la reserva
    deleteReservationById($idAula, $idHora, $idMes, $idDia);
    
    // Redirigir a la página anterior o a alguna otra página
    header("Location: ../views/inicio.php");
    exit();
} else {
    // Manejar el caso en que no se proporcionen todos los parámetros necesarios
    echo "Faltan parámetros para eliminar la reserva.";
}
?>