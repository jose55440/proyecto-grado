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
    <?php } ?>
    <h1><strong>Bienvenido: </strong> <?php echo $_SESSION['userCheked']['nombre']; ?></h1>
    
</body>
</html>