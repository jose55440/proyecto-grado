<?php
require_once '../comprobador.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Grupo</title>
    <link rel="stylesheet" href="../stylesheets/createNewGroup.css"> <!-- Asegúrate de que la ruta al archivo CSS sea correcta -->
</head>
<body>
    <form action="../lib/createNewGrup2.php" method="get">
        <label for="alias">Alias</label>
        <input type="text" name="alias" id="alias">
        <br>
        <label for="nombreCompleto">Nombre completo</label>
        <input type="text" name="nombreCompleto" id="nombreCompleto">
        <input type="submit" value="Crear">
    </form>
</body>
</html>
