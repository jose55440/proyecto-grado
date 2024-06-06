<?php
require_once '../checkAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Grupo</title>
    <link rel="stylesheet" href="../stylesheets/createNewGroup.css"> <!-- Asegúrate de que la ruta al archivo CSS sea correcta -->
    <script>
      const validateForm= (event)=> {
        var alias = document.getElementById('alias').value;
        var nombreCompleto= document.getElementById('nombreCompleto').value;
        
        if (!alias || !nombreCompleto) {
            alert('Por favor, completa los cambios necesarios');
            event.preventDefault(); // Previene el envío del formulario
        }
    }
    </script>
</head>
<body>
<a href="./inicio.php" >Inicio</a>
    <form action="../lib/createNewGrup2.php" method="get" onsubmit="validateForm(event)">
        <label for="alias">Alias</label>
        <input type="text" name="alias" id="alias" required placeholder="EJ('DAW')">
        <br>
        <label for="nombreCompleto">Nombre completo</label>
        <input type="text" name="nombreCompleto" id="nombreCompleto" required>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
