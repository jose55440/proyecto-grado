<?php
require_once '../comprobador.php';
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



function checkOkupationToOcupation($idAula, $hora, $dia, $mes)
{
    $year = date('Y'); // Año actual

    // Crear un objeto DateTime para obtener el nombre del día
    $date = new DateTime("$year-$mes-$dia");

    // Crear el formateador para el nombre del día
    $dayFormatter = new IntlDateFormatter(
        'es_ES',
        IntlDateFormatter::FULL,
        IntlDateFormatter::NONE,
        'UTC',
        IntlDateFormatter::TRADITIONAL,
        'EEEE'
    );
    // Obtener el nombre del día
    $dayName = $dayFormatter->format($date);

    // Mapeo de nombres de días a columnas en la base de datos
    $daysMap = [
        'lunes' => 'lunes',
        'martes' => 'martes',
        'miércoles' => 'miercoles', // Asegúrate de que este mapeo coincida con los nombres de las columnas en tu base de datos
        'jueves' => 'jueves',
        'viernes' => 'viernes',
    ];

    // Obtener el nombre del día en minúsculas
    $dayColumn = strtolower($dayName);

    // Validar si el nombre del día está en el mapeo
    if (!array_key_exists($dayColumn, $daysMap)) {
        throw new Exception('Nombre del día no válido');
    }

    // Obtener la columna correspondiente en la base de datos
    $dayColumn = $daysMap[$dayColumn];

    // Construir la consulta SQL dinámicamente de forma segura
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


