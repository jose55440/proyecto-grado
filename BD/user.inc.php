<?php
include 'bd.inc.php';

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

    // Depuración: imprimir el usuario (usar solo durante el desarrollo)
    var_dump($user);
    print_r($user);

    // Verificar si el usuario existe y la contraseña es correcta
    if (password_verify($contrasena, $user['passworld'])) {
        return $user;
    } else {
        return null;
    }
}




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
