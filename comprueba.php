<?php
session_start();
include_once './BD/user.inc.php';
$user = $_POST['login'];
$contraseña = $_POST['contraseña'];
$userCheked =checkLogin($user, $contraseña);
if ($userCheked!=null) {
    $_SESSION['userCheked'] = $userCheked;
    header("Location: ./views/inicio.php");
    // exit;
} else {
    echo "Usuario/a y/o contraseña incorrectos";
    header("refresh:3;url=index.php");
    // exit;
}
?>
