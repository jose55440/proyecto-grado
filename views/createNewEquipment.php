<?php 
   
    require_once '../checkAdmin.php';
    include_once '../BD/aula.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de equipacion</title>
    <link rel="stylesheet" href="../stylesheets/createNewEquipment.css"> 
</head>
<body>
    <form action="../lib/createNewEquipment2.php" method="get">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="numSerie">Numero de Serie</label>
        <input type="text" name="numSerie" id="numSerie">
        <br>
        <label for="idAula">Aula</label>
        <select name="idAula" id="idAula">
        <?php foreach (getAllAulas() as $key => $aula) { ?>
            <option value="<?=$aula['idAula']?>"><?= $aula['idPabellon'].$aula['idAula'] ?></option>
        <?php } ?>
        </select>
        <br>
        <input type="submit" value="Agregar Equipamiento">
    </form>
</body>
</html>
