<?php
session_start();
include_once './BD/user.inc.php';
$user = $_POST['login'];
$contrasena = $_POST['contrasena'];
$userCheked = checkLogin($user, $contrasena);


if ($userCheked != null) {
    $_SESSION['userCheked'] = $userCheked;
    header("Location: ./views/inicio.php");
    // exit;
} else {
    echo "Usuario/a y/o contraseña incorrectos";
    header("refresh:4;url=index.php");
    // exit;
}
