<?php

include_once 'bd.inc.php';




function checkReservation($idAula, $idHora, $idMes, $idDia ) {
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


function createReservation ($idAula, $idHora, $idMes, $idDia, $idGrupo, $idUsuario){

   
        $sql = conectar()->prepare("INSERT INTO ocupacion VALUES (:idAula, :idHora, :idMes, :idDia, :idGrupo, :idUsuario)");
        $sql->bindValue(":idAula", $idAula);
        $sql->bindValue(':idHora', $idHora);
        $sql->bindValue(':idMes', $idMes);
        $sql->bindValue(':idDia', $idDia);
        $sql->bindValue(':idGrupo', $idGrupo);
        $sql->bindValue(':idUsuario', $idUsuario);

        try{
            $sql->execute();

        }catch(PDOException $e){
            throw new Exception('Error al acceder a la base de datos');
        }
}