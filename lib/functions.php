<?php
require_once './BD/bd.inc.php';

function login($user, $password){
    checkLogin($user)
}

function upLoadCSV($archivo)
{
    $datos = []; // Array para almacenar los datos del CSV

    // Abre el archivo CSV en modo de lectura
    if (($handle = fopen($archivo, "r")) !== false) {
        // Itera sobre cada fila en el archivo CSV
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $fila = []; // Array para almacenar los datos de cada fila
            // Itera sobre cada campo de la fila y lo agrega al array $fila
            foreach ($data as $value) {
                $fila[] = $value;
            }
            // Agrega la fila al array $datos
            $datos[] = $fila;
        }
        // Cierra el archivo CSV
        fclose($handle);
        return $datos; // Devuelve el array de datos
    } else {
        // Maneja el error si no se puede abrir el archivo
        echo "No se pudo abrir el archivo CSV.";
        return null; // Devuelve null en caso de error
    }
}