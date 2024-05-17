<?php
include 'bd.inc.php';

function checkLogin($nre, $passworld) {
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
    if ($user['passworld']==$passworld) {
        return $user;
    } else {
        return null;
    }
}
?>
