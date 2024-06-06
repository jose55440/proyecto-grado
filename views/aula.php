<?php
require_once '../cheker.php';
include '../BD/aula.inc.php';
$idAula = $_GET['idAula'];
$ocupacionAula = searchAulaById($idAula);
?>
<!-- En este documento muestro la ocupacion de las aulas con ayuda de la tabla okupacion -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocupación Aula</title>
    <link rel="stylesheet" href="../stylesheets/aula.css">
</head>
<body>

<a href="./inicio.php" >Inicio</a>
    <div class="container">
        <h1>Ocupación del Aula: <?= $idAula ?></h1>
        <table>
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ocupacionAula as $aula) : ?>
                    <tr>
                        <td><?= htmlspecialchars($aula['hora']) ?></td>
                        <td class="<?= $aula['lunes'] == 1 ? 'occupied' : '' ?>"></td>
                        <td class="<?= $aula['martes'] == 1 ? 'occupied' : '' ?>"></td>
                        <td class="<?= $aula['miercoles'] == 1 ? 'occupied' : '' ?>"></td>
                        <td class="<?= $aula['jueves'] == 1 ? 'occupied' : '' ?>"></td>
                        <td class="<?= $aula['viernes'] == 1 ? 'occupied' : '' ?>"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
