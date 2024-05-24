<?php 
require_once '../comprobador.php';
include '../BD/okupacion.php'
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

    
    <select name="aulas" id="aulas">
        <?php 
            foreach (getIdAulas() as $key => $aula) {
                ?>
                <option value='<?= $aula['idAula']?>' ><?= $aula['idAula'] ?></option>

                <?php
            }
        ?>
    </select>
    <button id="boton"></button>
    <table border="1">
        <thead>
            <th></th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </thead>
        <?php 
          foreach (getDatosOkupacionById() as $key => $value) {
        ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php  }?>
    </table>
    
</body>

</html>