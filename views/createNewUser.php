<?php 
require_once '../checkAdmin.php';
include_once '../BD/user.inc.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="../stylesheets/crearNewUser.css"> <!-- Enlace al archivo CSS -->
    <script>
    function validateForm(event) {
        var user = document.getElementById('nre').value;
        var contrasena = document.getElementById('contrasena').value;
        var Nombre = document.getElementById('Nombre').value;
        var Apellidos = document.getElementById('Apellidos').value;
     
        if (!user || !contrasena || !Nombre || !Apellidos) {
            alert('Por favor, completa todos los campos.');
            event.preventDefault(); // Previene el envío del formulario
        }
    }
</script>

</head>
<body>
<a href="./inicio.php" >Inicio</a>
    <form action="../lib/createNewUser2.php" method="post" onsubmit="validateForm(event)">
        <label for="user">NRE</label>
        <input type="text" name="nre" id="nre" required>
        <br>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <br>
        <label for="admin">Admin</label>
        <select name="admin" id="admin">
            <option value="true">Sí</option>
            <option value="false">No</option>
        </select>
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
