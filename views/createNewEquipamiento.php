<?php 
    require_once '../comprobador.php';
    include_once '../BD/aula.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de equipacion</title>
</head>
<body>
    <form action="../lib/createNewEquipamiento2.php" method="get">
        <label for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="numSerie">Numero de Serie</label>
        <input type="text" name="numSerie" id="numeSerie">
        <br>

        <select name="" id="">
        <?php  foreach (getAllAulas() as $key => $aula) {
          ?>
            <option value=<?= $aula['idAula'] ?>> <?= $aula['idPabellon'].$aula['idAula'] ?></option>
        <?php  }  ?>

        <input type="submit" value="Agregar Equipamiento">
        </select>
    </form>
</body>
</html>