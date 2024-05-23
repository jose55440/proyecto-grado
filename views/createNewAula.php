<?php 
    require_once '../comprobador.php';
    include '../BD/pabellon.inc.php';
    $pabellones= recogerPabellones();
?>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Aula</title>
</head>
<body>
    <form action="../lib/createNewAula2.php" method="get">
        <label for="idAula">Id del Aula</label>
        <input type="text" name="idAula" id="idAula">
        <br>
        <label for="idPabellon">Id del Pabellon</label>
        <input type="text" name="idPabellon" id="idPabellon">
        <br>
        <label for="nombre">Nombre del aula</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="capacidad">Capacidad</label>
        <input type="number" name="capacidad" id="capacidad">
        <input type="submit" value="Añadir">
    </form>
</body>
</html>