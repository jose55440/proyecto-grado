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
    <script>
      const validateForm= (event)=> {
        var nombre = document.getElementById('nombre').value;
        var numSerie= document.getElementById('numSerie').value;
        var idAula= document.getElementById('idAula').value;
       
        
        if (!nombre || !numSerie || !idAula) {
            alert('Por favor, completa los cambios necesarios');
            event.preventDefault(); // Previene el envío del formulario
        }
    }
    </script>
</head>
<body>
<a href="./inicio.php" >Inicio</a>
    <form action="../lib/createNewEquipment2.php" method="get" onsubmit="validateForm(event)">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="numSerie">Numero de Serie</label>
        <input type="text" name="numSerie" id="numSerie" required>
        <br>
        <label for="idAula">Aula</label>
        <select name="idAula" id="idAula" required>
            <!-- Muestro las aulas  -->
        <?php foreach (getAllAulas() as $key => $aula) { ?>
            <option value="<?=$aula['idAula']?>"><?= $aula['idPabellon'].$aula['idAula'] ?></option>
        <?php } ?>
        </select>
        <br>
        <input type="submit" value="Agregar Equipamiento">
    </form>
</body>
</html>
