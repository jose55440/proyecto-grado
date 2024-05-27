<?php 
require_once '../comprobador.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../stylesheets/inicio.css"> <!-- Enlace al archivo CSS -->
</head>

<body>
    <div class="container">
        <?php if($_SESSION['userCheked']['admin'] == true) { ?>
            <div class="navbar">
                <a href="./createNewUser.php">Crear Usuario</a>
                <a href="./createNewPabellon.php">Crear Pabellon</a>
                <a href="./createNewAula.php">Crear Aula</a>
            </div>
        <?php } ?>
        <div class="navbar">
            <a href="../cerrarSession.php">Cerrar Sesion</a>
            <a href="./ocupaciones.php">Ocupaciones</a>
        </div>
        <!-- Sale el nombre de la persona que se a logeado -->
        <h1><strong>Bienvenido: </strong> <?= htmlspecialchars($_SESSION['userCheked']['nombre']); ?></h1>

    <h1>Mis reservas</h1>
    </div>
</body>

</html>
