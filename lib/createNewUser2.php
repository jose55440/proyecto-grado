<?php
    require_once '../comprobador.php';
    include_once '../BD/user.inc.php';

    $nre=$_POST['nre'];
    $contrasena=$_POST['contrasena'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $admin=$_POST['admin'];

    try{
        createUser($nre, $contrasena, $nombre, $apellidos, $admin);
        echo '<h1>Guardando datos</h1>';
        header("refresh:3;url=../views/createNewUser.php");
    }catch(PDOException $e){
        $e->getMessage();
        echo 'Algunos de los datos introducidos es incorrecto';
        header("refresh:3;url=../views/createNewUser.php");
    }

    