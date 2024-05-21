<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <script>
        function validateForm(event) {
            var login = document.getElementById('login').value;
            var contraseña = document.getElementById('contraseña').value;
            if (!login || !contraseña) {
                alert('Por favor, completa todos los campos.');
                event.preventDefault(); // Previene el envío del formulario
            }
        }
    </script>
</head>
<body>
    <form action="createNewUser2.php" method="post" onsubmit="validateForm(event)">
        <label for="user">Usuario</la.bel>
        <input type="text" name="user" id="user" required>
        <br>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" id="apellidos">
        <br>
        <select name="admin" id="admin">
            <option value=true>Si</option>
            <option value=false>No</option>
        </select>
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
