<?php
require_once '../cheker.php';
include_once 'bd.inc.php';
$diasSemana = array(1 => 'lunes', 2 => 'martes', 3 => 'miercoles', 4 => 'jueves', 5 => 'viernes');


function getDatosOkupacionById($idAula)
{
    $sql = conectar()->prepare('select * from okupacion where idAula=:idAula');
    $sql->bindValue(':idAula', $idAula);
    try {
        $sql->execute();
        return $sql->fetchAll();
    } catch (PDOException $e) {
        throw new Exception('Error al acceder a la base de datos');
    }
}

function getIdAulas()
{
    $sql = conectar()->prepare('SELECT DISTINCT( idAula) FROM `okupacion`  ');
    try {
        $sql->execute();
        return $sql->fetchAll();
    } catch (PDOException $e) {
        throw new Exception('Error al acceder a la base de datos');
    }
}

// Recoge todas las aulas sin repeticiones
function getAulasByLetter($letter)
{
    // Preparar la consulta SQL
    $sql = conectar()->prepare('SELECT DISTINCT(idAula) FROM `okupacion` WHERE idAula LIKE :letter');

    // Bind del valor con el comodín %
    $sql->bindValue(':letter', $letter . '%');

    try {
        // Ejecutar la consulta
        $sql->execute();

        // Devolver todos los resultados
        return $sql->fetchAll();
    } catch (PDOException $e) {
        // Manejo de errores
        throw new Exception('Error al acceder a la base de datos: ' . $e->getMessage());
    }
}


// Comprueba la ocupacion de todos los meses
function checkOkupationToOcupation($idAula, $hora, $dia, $mes)
{
    $year = date('Y'); // Año actual

    // Crear un objeto DateTime para obtener el nombre del día
    $date = new DateTime("$year-$mes-$dia");

    // Obtener el nombre del día en inglés
    $dayNameEnglish = $date->format('l');

    // Mapeo de nombres de días en inglés a español
    $daysMap = [
        'Monday' => 'lunes',
        'Tuesday' => 'martes',
        'Wednesday' => 'miércoles',
        'Thursday' => 'jueves',
        'Friday' => 'viernes',
        'Saturday' => 'sábado',
        'Sunday' => 'domingo'
    ];

    // Mapeo de nombres de días a columnas en la base de datos
    $daysColumnMap = [
        'lunes' => 'lunes',
        'martes' => 'martes',
        'miércoles' => 'miercoles', // Asegúrate de que este mapeo coincida con los nombres de las columnas en tu base de datos
        'jueves' => 'jueves',
        'viernes' => 'viernes',
    ];

    // Obtener el nombre del día en español
    if (!array_key_exists($dayNameEnglish, $daysMap)) {
        throw new Exception('Nombre del día no válido');
    }

    $dayNameSpanish = $daysMap[$dayNameEnglish];

    // Obtener la columna correspondiente en la base de datos
    if (!array_key_exists($dayNameSpanish, $daysColumnMap)) {
        throw new Exception('Nombre del día no válido para columna');
    }
    // Con esto consigo el dia de la semana para comprobarlo en okupacion
    $dayColumn = $daysColumnMap[$dayNameSpanish];

    
    $sql = conectar()->prepare("SELECT $dayColumn FROM okupacion WHERE idAula = :idAula AND hora = :hora");
    $sql->bindValue(':idAula', $idAula);
    $sql->bindValue(':hora', $hora);

    try {
        $sql->execute();
        $comprobante = $sql->fetchColumn();
        return $comprobante == 1;
    } catch (PDOException $e) {
        throw new Exception('Error al acceder a la tabla okupacion');
    }
}

// Poner un cuadrado verde o rojo segun si esta ocupada esa aula a esa hora ese dia y ese mes con ayuda del metodo checkOkupationToOcupation de okupacion.php y del metodo de checkReservation de ocupacion.inc.php