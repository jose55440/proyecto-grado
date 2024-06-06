<?php
require_once '../cheker.php';
include '../BD/okupacion.php';

// Obtener el idPabellon de la URL
$idPabellon = $_GET['idPabellon'];

// Obtener los detalles del pabellon utilizando la función recogerPabellones o una nueva función específica
$pabellones = getAulasByLetter($idPabellon);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pabellón</title>
    <link rel="stylesheet" href="../stylesheets/detalles_pabellon.css"> <!-- Enlace al archivo CSS -->
</head>

<body>
<a href="./inicio.php" >Inicio</a>
    <div class="container">
        <h1>Detalles del Pabellón <?= $idPabellon?></h1>
        <div class="links-container">
            <!-- Recogiendo el id del pabellon muestro sus respectivas aulas -->
            <?php foreach ($pabellones as $key => $aula) { ?>
                <div>
                    <a href="./aula.php?idAula=<?= htmlspecialchars($aula['idAula']) ?>"><?= htmlspecialchars($aula['idAula']) ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>
