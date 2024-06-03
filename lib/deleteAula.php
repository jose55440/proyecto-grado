<?php


require_once '../comprobador.php';
include_once '../BD/aula.inc.php';

if (isset($_GET['idAula'])) {
    $idAula = $_GET['idAula'];
    

    // Llamar a la función para eliminar la reserva
    deleteAulaById($idAula);
    
    // Redirigir a la página anterior o a alguna otra página
    header("Location: ../views/createNewAula.php");
    exit();
} else {
    // Manejar el caso en que no se proporcionen todos los parámetros necesarios
    echo "Faltan parámetros para eliminar la aula.";
}
?>