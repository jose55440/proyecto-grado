<?php 
require_once '../comprobador.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Pabellon</title>

    <script>
      const validateForm= (event)=> {
        var user = document.getElementById('idPabellon').value;
        
        if (!idPabellon) {
            alert('Por favor, completa los cambios necesarios');
            event.preventDefault(); // Previene el envío del formulario
        }
    }
    </script>
</head>
<body>
    <form action="../lib/createNewPabellon2.php" method="get">
        <label for="idPabellon">Id</label>
        <input type="text" name="idPabellon" id="idPabellon">
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <input type="submit" value="Agregar">
    </form>
</body>
</html>