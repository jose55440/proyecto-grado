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



function comprobarInicio($nre, $contraseña)
{
    $sql = conectar()->prepare("select * from usuario where nre=:nre");
    $sql->bindValue(":nre", $nre);
    $sql->execute();
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    return  $sql->fetch();
}
function subidaCSV($archivo)
{

    // Abre el archivo CSV en modo de lectura
    if (($handle = fopen($archivo, "r")) !== false) {
        // Itera sobre cada fila en el archivo CSV
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            // Imprime cada campo de la fila
            foreach ($data as $value) {
                echo $value . ", ";
            }
            echo "<br>";
        }
        // Cierra el archivo CSV
        fclose($handle);
    } else {
        // Maneja el error si no se puede abrir el archivo
        echo "No se pudo abrir el archivo CSV.";
    }
}
