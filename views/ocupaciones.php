<?php
require_once '../comprobador.php';
include '../BD/pabellon.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocupaciones</title>
    <link rel="stylesheet" href="../stylesheets//ocupaciones.css"> <!-- Enlace al archivo CSS -->
</head>

<body>
    <div class="container">
        <?php foreach (recogerPabellones() as $key => $pabellon) { ?>
            <div>
                <a href="pabellon.php?idPabellon=<?= $pabellon['idPabellon'] ?>"><?= htmlspecialchars($pabellon['nombre']) ?></a>
            </div>
        <?php } ?>
    </div>
</body>

</html>