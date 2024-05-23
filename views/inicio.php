<?php 
require_once '../comprobador.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?php if($_SESSION['userCheked']['admin']==true) { ?>
        <a href='./createNewUser.php'>Crear Usuario</a>
        <a href="./createNewPabellon.php">Crear Pabellon</a>
        <a href="./createNewAula.php">Crear Aula</a>

    <?php } ?>
    <a href="../cerrarSession.php">Cerrar Sesion</a>
    <!-- Sale el nombre de la persona que se a logeado -->
    <h1><strong>Bienvenido: </strong> <?php echo $_SESSION['userCheked']['nombre']; ?></h1>
    
</body>
</html>