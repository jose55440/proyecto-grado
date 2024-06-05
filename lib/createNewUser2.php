<?php
require_once '../cheker.php';
    include_once '../BD/user.inc.php';

    $nre=$_POST['nre'];
    $contrasena=$_POST['contrasena'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $admin=$_POST['admin'];

    try{

            // Comprueba si el usuario existe 
    if (!checkUser($nre)) {
        // Crear nuevo usuario
        createUser($nre, $contrasena, $nombre, $apellidos, $admin);
        echo '<h1>Guardando datos</h1>';
    } else {
        echo 'Este usuario ya existe';
    }
       
       
        header("refresh:3;url=../views/createNewUser.php");
    }catch(PDOException $e){
        $e->getMessage();
        header("refresh:3;url=../views/createNewUser.php");
    }

    