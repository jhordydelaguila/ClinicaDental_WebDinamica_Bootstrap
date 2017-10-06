<?php

class RepositorioPrincipalMarco {

    public static function obtener_principal_marco($conexion) {
        
        $principal_marco= array();

        if (isset($conexion)) {
            try{
                //include_once 'admin/app/class/PrincipalMarco.php';

                $sql = "SELECT * FROM  principal_marco LIMIT 3";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $principal_marco[] = new PrincipalMarco($fila['id'],$fila['titulo'],$fila['imagen'],$fila['contenido'],$fila['estado']);
                    }
                }

            }catch(PDOException $ex){
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $principal_marco;
    }
    
    public static function insertar_marco($conexion,$marco) {

        $marco_insertado = false;
        
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO principal_marco(titulo,imagen,contenido,estado) "
                        . "VALUES(:titulo,:imagen,:contenido,:estado)";
                $sentencia1 = $conexion->prepare($sql);
                $sentencia1->bindParam(':titulo', $marco->getTitulo(), PDO::PARAM_STR);
                $sentencia1->bindParam(':imagen', $marco->getImagen(), PDO::PARAM_STR);
                $sentencia1->bindParam(':contenido', $marco->getContenido(), PDO::PARAM_STR);
                $sentencia1->bindParam(':estado', $marco->getEstado(), PDO::PARAM_STR);

                $marco_insertado = $sentencia1->execute();
            } catch (PDOException $ex) {
                echo 'Error:' . $ex->getMessage();
            }
        }
        return $marco_insertado;
    }
}
