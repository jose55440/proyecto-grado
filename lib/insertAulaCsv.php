<?php
require_once '../checkAdmin.php';


function upLoadCSV($archivo) {
    $datos = []; // Array para almacenar los datos del CSV

    // Abre el archivo CSV en modo de lectura
    if (($handle = fopen($archivo, "r")) !== false) {
        // Itera sobre cada fila en el archivo CSV
        while (($data = fgetcsv($handle, 1000, ";")) !== false) {
            if (!empty($data)) {
                // Agrega la fila al array $datos
                $datos[] = $data;
            }
        }
        // Cierra el archivo CSV
        fclose($handle);
    } else {
        // Maneja el error si no se puede abrir el archivo
        echo "No se pudo abrir el archivo CSV.";
        return null; // Devuelve null en caso de error
    }

    return $datos; // Devuelve los datos leídos del archivo CSV
}

// Procesar archivo subido
if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['csvFile']['tmp_name'];
    $datosCSV = upLoadCSV($fileTmpPath);

    if ($datosCSV !== null) {
        // Aquí puedes insertar los datos en la base de datos
        $conn = conectar();

    
        $sql = $conn->prepare('DELETE FROM aula');
        $sql->execute();
        // Iterar sobre los datos y preparar la inserción en la base de datos
        foreach ($datosCSV as $fila) {
            try {
                // Extraer la primera letra del primer valor de la fila
                

                // Suponiendo que la tabla se llama 'aula' y tiene columnas que coinciden con los datos del CSV
                $sql = $conn->prepare("INSERT INTO aula (idAula, idPabellon, nombre) VALUES (?, ?, ?)");
                
                // Aquí se enlazan los parámetros, ajusta el número de parámetros y sus tipos según sea necesario
                $sql->bindParam(1, $fila[0]);
                $sql->bindParam(2, $fila[1]);
                $sql->bindParam(3, $fila[2]);
                

                // Ejecuta la consulta
                $sql->execute();
            } catch (PDOException $e) {
                echo 'Error al insertar fila: ' . $e->getMessage();
            }
            
         
        }
        echo "Datos insertados exitosamente.";
        header("refresh:3;url=../views/inicio.php");
    } else {
        echo "Hubo un problema al leer el archivo CSV.";
    }
} else {
    echo "Error al subir el archivo.";
    header("refresh:3;url=../views/inicio.php");
}
?>
