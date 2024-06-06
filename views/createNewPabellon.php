<?php 
require_once '../checkAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Pabellon</title>
    <link rel="stylesheet" href="../stylesheets/createNewPabellon.css"> <!-- Enlace al archivo CSS -->
    <script>
      const validateForm= (event)=> {
        var idPabellon = document.getElementById('idPabellon').value;
        var nombre= document.getElementById('nombre').value;
        
        if (!idPabellon || !nombre) {
            alert('Por favor, completa los cambios necesarios');
            event.preventDefault(); // Previene el envío del formulario
        }
    }
    </script>
</head>
<body>
<a href="./inicio.php" >Inicio</a>
    <form action="../lib/createNewPabellon2.php" method="get" onsubmit="validateForm(event)">
        <label for="idPabellon">Id</label>
        <input type="text" name="idPabellon" id="idPabellon" required placeholder="EJ('A')">
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
