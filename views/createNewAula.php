<?php 
    require_once '../comprobador.php';
    include '../BD/pabellon.inc.php';
    $pabellones = recogerPabellones();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Aula</title>
    <link rel="stylesheet" href="../stylesheets/createNewAula.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <form action="../lib/createNewAula2.php" method="get">
        <label for="idAula">Id del Aula</label>
        <input type="text" name="idAula" id="idAula" required>
        <br>
        <label for="idPabellon">Id del Pabellon</label>
        <input type="text" name="idPabellon" id="idPabellon" required>
        <br>
        <label for="nombre">Nombre del aula</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="capacidad">Capacidad</label>
        <input type="number" name="capacidad" id="capacidad" required>
        <br>
        <input type="submit" value="Añadir">
    </form>
</body>
</html>
