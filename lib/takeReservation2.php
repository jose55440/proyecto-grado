<?php
require_once '../comprobador.php';
include_once '../BD/ocupacion.inc.php';
include_once '../BD/okupacion.php';
include_once './aula.inc.php';

$idAula=$_GET['idAula'];
$idHora=$_GET['idHora'];
$idMes=$_GET['idMes'];
$idDia=$_GET['idDia'];
$idGrupo=$_GET['idGrupo'];
$idUsuario=$_SESSION['userCheked']['nre'];
$pabellon=searchAulaById($idAula)['idPabellon'];


if (checkReservation($idAula, $idHora, $idMes, $idDia)) {
    echo "Ese aula ya esta reservada";
    header("refresh:3;url=../views/takeReservation.php");
} else {
    if (!checkOkupationToOcupation($pabellon.''.$idAula,$idHora,$idDia,$idMes)){
        try {
            createReservation($idAula, $idHora, $idMes, $idDia, $idGrupo, $idUsuario);
            header("Location: ../views/inicio.php");
        } catch (PDOException $e) {
            die("Error al realizar la reserva: " . $e->getMessage());
        }
    }else{
        echo 'Ese aula ya esta reservada 2';
    }
    
}
