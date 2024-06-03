<?php
require_once '../comprobador.php';
include_once '../BD/user.inc.php';





if (isset($_GET['nre'])) {
    $nre = $_GET['nre'];
    

    // Llamar a la función para eliminar la reserva
    deleteUserById($nre);
    
    // Redirigir a la página anterior o a alguna otra página
    header("Location: ../views/createNewUser.php");
    exit();
} else {
    // Manejar el caso en que no se proporcionen todos los parámetros necesarios
    echo "Faltan parámetros para eliminar la usuario.";
}
