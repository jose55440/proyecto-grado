<?php
require_once '../comprobador.php';
include_once '../BD/ocupacion.inc.php';
include_once '../BD/grupo.inc.php';
include_once '../BD/aula.inc.php';
$meses = array(
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
);
$hora = array(
    "8:15-9:10",
    "9:10-10:05",
    "10:05-11:00",
    "11:30-12:25",
    "12:25-13:20",
    "13:20-14:15"
);
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
        <?php if ($_SESSION['userCheked']['admin'] == true) { ?>
            <div class="navbar">
                <a href="./createNewUser.php">Crear Usuario</a>
                <a href="./createNewPabellon.php">Crear Pabellon</a>
                <a href="./createNewAula.php">Crear Aula</a>
                <a href="./createNewGrup.php">Crear Grupo</a>
                <a href="./createNewEquipamiento.php">Crear Equipamiento</a>

            </div>
        <?php } ?>
        <div class="navbar">
            <a href="./takeReservation.php">Reservar Aula</a>
            <a href="../cerrarSession.php">Cerrar Sesion</a>
            <a href="./ocupaciones.php">Ocupaciones</a>
        </div>
        <!-- Sale el nombre de la persona que se a logeado -->
        <h1><strong>Bienvenido: </strong> <?= htmlspecialchars($_SESSION['userCheked']['nombre']); ?></h1>

        <h1>Mis reservas</h1>

        <?php foreach (getAllReservations() as $key => $reserva) {
            $pabellon=searchAulaByIdToOkupation($reserva['idAula']); ?>
    <div class="reserva">
        
        <p>Aula: <?= $pabellon['idPabellon'].$reserva['idAula'] ?></p>
        <p>Hora: <?= $hora[$reserva['idHora']-1] ?></p>
        <p>Dia: <?= $reserva['idDia'] ?></p>
        <p>Mes: <?= $meses[$reserva['idMes']-1] ?></p>
        <p>Grupo: <?= getAliasGrupById($reserva['idGrupo']) ?></p>
        <a href="../lib/deleteReservation.php?idAula=<?= $reserva['idAula'] ?>&idHora=<?= $reserva['idHora'] ?>&idMes=<?= $reserva['idMes'] ?>&idDia=<?= $reserva['idDia'] ?>">Quitar reserva</a>
    </div>
<?php } ?>


    </div>
</body>

</html>