<?php  
include_once 'bd.inc.php';


    function getDatosOkupacionById($idAula){
        $sql=conectar()->prepare('select * from okupacion where idAula=:idAula');
        $sql->bindValue(':idAula',$idAula);
        try{
            $sql->execute();
            return $sql->fetchAll();
        }catch(PDOException $e){
            throw new Exception('Error al acceder a la base de datos');
        }
    }

    function getIdAulas(){
        $sql=conectar()->prepare('SELECT DISTINCT( idAula) FROM `okupacion`  ');
        try{
            $sql->execute();
            return $sql->fetchAll();
        }catch(PDOException $e){
            throw new Exception('Error al acceder a la base de datos');
        }
    }


    function getAulasByLetter($letter) {
        // Preparar la consulta SQL
        $sql = conectar()->prepare('SELECT DISTINCT(idAula) FROM `okupacion` WHERE idAula LIKE :letter');
        
        // Bind del valor con el comodín %
        $sql->bindValue(':letter', $letter . '%');
        
        try {
            // Ejecutar la consulta
            $sql->execute();
            
            // Devolver todos los resultados
            return $sql->fetchAll();
        } catch (PDOException $e) {
            // Manejo de errores
            throw new Exception('Error al acceder a la base de datos: ' . $e->getMessage());
        }
    }
    