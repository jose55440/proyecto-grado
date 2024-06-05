<?php
require_once '../cheker.php';
include_once '../BD/aula.inc.php';
include_once '../BD/grupo.inc.php';


$idAulas = getAllAulas();
$grupos = getGrupos();


$meses = array(
    "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
    "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar</title>
    <link rel="stylesheet" href="../stylesheets/takeReservation.css">
    <script>
        function validateForm(event) {
            var idAula = document.getElementById('idAula').value;
            var idHora = document.getElementById('idHora').value;
            var idDia = document.getElementById('idDia').value;
            var idMes = document.getElementById('idMes').value;

            if (!idAula || !idHora || !idDia || !idMes) {
                alert('Por favor, completa todos los campos.');
                event.preventDefault(); // Previene el envío del formulario
            }
        }

        function updateDays() {
            var mes = document.getElementById('idMes').value;
            var diaSelect = document.getElementById('idDia');
            var diasEnMes = 31;

            if (mes == 4 || mes == 6 || mes == 9 || mes == 11) {
                diasEnMes = 30;
            } else if (mes == 2) {
                var year = new Date().getFullYear();
                if ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0) {
                    diasEnMes = 29; // Año bisiesto
                } else {
                    diasEnMes = 28;
                }
            }

            diaSelect.innerHTML = ''; // Limpiar opciones actuales

            for (var i = 1; i <= diasEnMes; i++) {
                var option = document.createElement('option');
                option.value = i;
                option.text = i;
                diaSelect.add(option);
            }
        }
    </script>
</head>
<!-- Formulario con su js incluido en el mismo documento -->
<body>
    <form action="../lib/takeReservation2.php" method="GET" onsubmit="validateForm(event)">
        <label for="idAula">Seleccion de aula</label>
        <select name="idAula" id="idAula">
            <?php foreach ($idAulas as $aula) { ?>
                <option value="<?= $aula['idAula'] ?>"><?= $aula['idPabellon'] . '' . $aula['idAula'] ?></option>
            <?php } ?>
        </select>
        <?php if($_SESSION['userCheked']['admin'] == true) { ?>
        <a href="./createNewAula.php">Crear nueva aula</a> <?php } ?>
        <br>
        <label for="idHora">Hora</label>
        <select name="idHora" id="idHora">
            <option value=1>8:15-9:10</option>
            <option value=2>9:10-10:05</option>
            <option value=3>10:05-11:00</option>
            <option value=4>11:30-12:25</option>
            <option value=5>12:25-13:20</option>
            <option value=6>13:20-14:15</option>
        </select>
        <br>
        <label for="idMes">Mes</label>
        <select name="idMes" id="idMes" onchange="updateDays()">
            <?php foreach ($meses as $num => $nombre) { ?>
                <option value=<?= $num + 1 ?>><?= $nombre ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="idDia">Dia</label>
        <select name="idDia" id="idDia">
            <!-- Los días se llenarán dinámicamente -->
        </select>
        <br>
        <label for="idGrupo">Grupo</label>
        <select name="idGrupo" id="idGrupo">
            <?php foreach ($grupos as $grupo) { ?>
                <option value=<?= $grupo['id']?>><?= $grupo['alias'] ?></option>
            <?php } ?>
        </select>
        <?php if($_SESSION['userCheked']['admin'] == true) { ?>
        <a href="createNewGroup.php">Crear Nuevo Grupo</a> <?php } ?>
        <br>
        <input type="submit" value="Reservar">
    </form>
    <script>updateDays();</script>

    
</body>

</html>

