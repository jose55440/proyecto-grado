<?php
session_start();
include_once './BD/user.inc.php';
$user = $_POST['login'];
$contrasena = $_POST['contrasena'];
// LLama a una funcion para comprobar que el usuario existe en la base de datos y la contraseña esta bien 
$userCheked = checkLogin($user, $contrasena);


if ($userCheked != null) {
    $_SESSION['userCheked'] = $userCheked;
    // Te redirige directamente 
    header("Location: ./views/inicio.php");
    // exit;
} else {
    echo "Usuario/a y/o contraseña incorrectos";
    // Te redirige otra vez a la pantalla de login pero te deja un tiempo para ver el mensaje 
    header("refresh:4;url=index.php");
    // exit;
}
