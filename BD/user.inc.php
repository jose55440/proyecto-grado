<?php

include_once 'bd.inc.php';

// Comprueba el usuario y contraseña
function checkLogin($nre, $contrasena)
{   
    // Conectar a la base de datos
    $pdo = conectar();

    // Preparar la consulta
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE nre = :nre");

    // Vincular el parámetro
    $sql->bindValue(":nre", $nre);

    // Ejecutar la consulta
    $sql->execute();

    // Establecer el modo de obtención
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    // Obtener el usuario
    $user = $sql->fetch();

 

    // Verificar si el usuario existe y la contraseña(la contraseña esta cifrada) es correcta
    if (password_verify($contrasena, $user['passworld'])) {
        return $user;
    } else {
        return null;
    }
}



// Compruba el ususario para que no se puedan crear mas con el mismo nre
function checkUser($nre)
{
    $sql = conectar()->prepare("SELECT COUNT(*) as count FROM usuario WHERE nre = :nre");
    $sql->bindValue(":nre", $nre);
    try {
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        throw new Exception("Error al acceder a la base de datos: " . $e->getMessage());
    }
}





// Crea usuario
function createUser($nre, $contrasena, $nombre, $apellidos, $admin)
{
    $contrasena=password_hash($contrasena, PASSWORD_DEFAULT);
    $sql = conectar()->prepare("INSERT INTO `usuario`(`nre`, `passworld`, `nombre`, `apellidos`, `admin`) VALUES (:nre,:contrasena,:nombre,:apellidos,:admin)");
    $sql->bindValue(":nre", $nre);
    $sql->bindValue(":contrasena", $contrasena);
    $sql->bindValue(":nombre", $nombre);
    $sql->bindValue(":apellidos", $apellidos);
    $sql->bindValue(":admin", $admin);
    try {
        $sql->execute();
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


// Recoge todos los usuarios
function getAllUser(){
    $sql = conectar()->prepare('select nre,nombre,apellidos from usuario');
    try{
        $sql->execute();
        return $sql->fetchAll();
    }catch(PDOException $e){
        throw new Exception('Error al acceder a la base de datos');
    }
}



// Borra el usuario por id
function deleteUserById($nre){
    $sql= conectar()->prepare('DELETE FROM `usuario` WHERE nre=:nre');
    $sql->bindValue(':nre',$nre);
    try{
        $sql->execute();
    }catch(PDOException $e){
        throw new Exception('Error al acceder a la base de datos');
    }
}


// Comprueba si es admin
function checkAdmin($nre){
    $sql=conectar()->prepare('select admin from usuario where nre=:nre');
    $sql->bindValue(':nre',$nre);

    try{
        $sql->execute();
        $admin=$sql->fetchColumn();
        return $admin==1;
    }catch(PDOException $e){
        throw new Exception('Error al acceder a la base de datos');
    }
}