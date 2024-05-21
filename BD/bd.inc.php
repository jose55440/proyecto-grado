<?php
include_once "../lib/functions.php";
function conectar()
{
    try {
        $host = "localhost";
        $basedatos = "seleccion-clases";
        $usuario = "root";
        $password = "";

        return new PDO("mysql:host=$host;dbname=$basedatos", $usuario, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}










