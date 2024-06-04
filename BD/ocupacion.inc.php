<?php
require_once '../cheker.php';
include_once 'bd.inc.php';
include_once 'okupacion.php';


// Comprueba si la reserva esta ya creada
function checkReservation($idAula, $idHora, $idMes, $idDia)
{
    // Conectar a la base de datos
    $pdo = conectar();

    // Preparar la consulta SQL
    $sql = $pdo->prepare("
        SELECT COUNT(*) as count
        FROM ocupacion
        WHERE idAula = :idAula
          AND idHora = :idHora
          AND idMes = :idMes
          AND idDia = :idDia
          
    ");

    // Vincular los parámetros
    $sql->bindValue(":idAula", $idAula);
    $sql->bindValue(":idHora", $idHora);
    $sql->bindValue(":idMes", $idMes);
    $sql->bindValue(":idDia", $idDia);


    try {
        // Ejecutar la consulta
        $sql->execute();

        // Obtener el resultado
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        // Verificar si existe una reserva
        if ($result['count'] > 0) {
            return true;  // Ya existe una reserva
        } else {
            return false; // No existe una reserva
        }
    } catch (PDOException $e) {
        throw new Exception("Error al verificar la reserva: " . $e->getMessage());
    }
}

// Agrega la reserva 
function createReservation($idAula, $idHora, $idMes, $idDia, $idGrupo, $idUsuario)
{


    $sql = conectar()->prepare("INSERT INTO ocupacion VALUES (:idAula, :idHora,:idDia , :idMes, :idGrupo, :idUsuario)");
    $sql->bindValue(":idAula", $idAula);
    $sql->bindValue(':idHora', $idHora);
    $sql->bindValue(':idMes', $idMes);
    $sql->bindValue(':idDia', $idDia);
    $sql->bindValue(':idGrupo', $idGrupo);
    $sql->bindValue(':idUsuario', $idUsuario);

    try {
        $sql->execute();
    } catch (PDOException $e) {
        throw new Exception('Error al acceder a la base de datos');
    }
}


// Recoger todas las reservas por el idProfesor que se recoge con el session start
function getAllReservations()
{


    $sql = conectar()->prepare('SELECT * FROM ocupacion WHERE idProfesor = :idProfesor ORDER BY idHora, idDia, idMes');
    $sql->bindValue(":idProfesor", $_SESSION['userCheked']['nre']);



    try {
        $sql->execute();
        return  $sql->fetchAll();
    } catch (PDOException $e) {
        throw new Exception('Error al acceder a la base de datos');
    }
}

// Borrar reservas
function deleteReservationById($idAula, $idHora, $idMes, $idDia)
{
    $sql = conectar()->prepare('DELETE FROM ocupacion WHERE idAula = :idAula AND idHora = :idHora AND idMes = :idMes AND idDia = :idDia');
    $sql->bindValue(":idAula", $idAula);
    $sql->bindValue(":idHora", $idHora);
    $sql->bindValue(":idMes", $idMes);
    $sql->bindValue(":idDia", $idDia);

    try {
        $sql->execute();
    } catch (PDOException $e) {
        throw new Exception('Error al eliminar la reserva de la base de datos');
    }
}
