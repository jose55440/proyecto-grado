
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="./stylesheets/index.css"> <!-- Enlace al archivo CSS -->
    <script>
        function validateForm(event) {
            var login = document.getElementById('login').value;
            var contraseña = document.getElementById('contrasena').value;
            if (!login || !contraseña) {
                alert('Por favor, completa todos los campos.');
                event.preventDefault(); // Previene el envío del formulario
            }
        }
    </script>
</head>
<body>
    <form action="comprueba.php" method="post" onsubmit="validateForm(event)">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" required>
        <br>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
