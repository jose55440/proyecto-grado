<?php
require_once '../comprobador.php';
include '../BD/okupacion.php';

// Obtener el idPabellon de la URL
$idPabellon = $_GET['idPabellon'];

// Obtener los detalles del pabellon utilizando la función recogerPabellones o una nueva función específica
$pabellones = getAulasByLetter($idPabellon);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pabellón</title>
</head>

<body>
    <?php foreach ($pabellones as $key => $aula) {
        ?>
       <h4><?= $aula['idAula']?> </h4>
    <?php } ?>
    <p>Detalles del pabellón...</p>
    <!-- Aquí puedes incluir más información sobre el pabellón -->
</body>

</html>
