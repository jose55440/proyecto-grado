<?php

require_once '../checkAdmin.php';
include '../BD/pabellon.inc.php';
include '../BD/aula.inc.php';
$pabellones = getPabellones();
?>

<!DOCTYPE html>
<html lang="es">

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
        <select name="idPabellon" id="idPabellon">
            <?php foreach ($pabellones as $key => $pabellon) { ?>
                <option value="<?= $pabellon['idPabellon'] ?>"><?= $pabellon['nombre'] ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="nombre">Nombre del aula</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="capacidad">Capacidad</label>
        <input type="number" name="capacidad" id="capacidad" required>
        <br>
        <input type="submit" value="Añadir">
    </form>
    <?php if ($_SESSION['userCheked']['admin'] == true) { ?>
        <div class="cards-container">
            <?php foreach (getAllAulas() as $key => $aula) { ?>
                <div class="card">
                    <div>
                        <p>Aula: <?= $aula['idPabellon'] . $aula['idAula'] ?></p>
                        <p>Nombre: <?= $aula['nombre'] ?></p>
                        <p>Capacidad: <?= $aula['capacidadAula'] ?></p>
                    </div>
                    <a href="../lib/deleteAula.php?idAula=<?= $aula['idAula'] ?>">Eliminar Aula</a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</body>

</html>