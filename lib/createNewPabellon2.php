<?php
require_once '../comprobador.php';
include_once '../BD/pabellon.inc.php';

$idPabellon = $_GET['idPabellon'];
$nombre = $_GET['nombre'];


try {

    // Comprueba si el pabellon existe 
    if (!checkAula($idAula)) {
        // Crea aula
        createPabellon($idPabellon, $nombre);
        echo 'Generando Pabellon Nuevo';
    } else {
        echo 'Este pabellon ya existe';
    }
    // Crear un pabellon

    header("refresh:3;url=../views/createNewPabellon.php");
} catch (PDOException $e) {
    $e->getMessage();
    echo 'Error al generar el pabellon';
    header("refresh:3;url=../views/createNewPabellon.php");
}
