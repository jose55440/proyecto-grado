<?php
session_start();
include_once './BD/user.inc.php';
$user = $_POST['login'];
$contraseña = $_POST['contraseña'];

if (checkLogin($user, $contraseña)!=null) {
    $_SESSION['kk'] = true;
    header("Location: ./DTO/user.dto.php");
    // exit;
} else {
    echo "Usuario/a y/o contraseña incorrectos";
    header("refresh:3;url=index.php");
    // exit;
}
?>
