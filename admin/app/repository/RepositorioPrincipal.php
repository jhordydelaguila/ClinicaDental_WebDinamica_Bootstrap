<?php

class RepositorioPrincipal {

    public static function obtener_principal($conexion) {
        
        $principal = null;
        if (isset($conexion)) {
            try{   

                //include_once 'admin/app/class/Principal.php';

                $sql = "SELECT * FROM principal";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $principal = new Principal($resultado['id'],$resultado['titulo'],$resultado['subtitulo'],$resultado['contenido']);
                }

            }catch(PDOException $ex) {
                print 'Error:'  . $ex->getMessage();
            }
        }
        return $principal;
    }

    public static function actualizar_principal($conexion,$principalClass) {
        $principal_actualizado = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE principal SET titulo = :TITULO, subtitulo = :subtitulo, contenido = :contenido
                        WHERE id = :ID";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':TITULO',$principalClass->getTitulo(),PDO::PARAM_STR);
                $sentencia->bindParam(':subtitulo',$principalClass->getSubTitulo(),PDO::PARAM_STR);
                $sentencia->bindParam(':contenido',$principalClass->getContenido(),PDO::PARAM_STR);
                $sentencia->bindParam(':ID',$principalClass->getId(),PDO::PARAM_INT);
                $principal_actualizado = $sentencia->execute();

            } catch (PDOException $e) {
                print 'Error: ' . $e->getMessage();
            }
        }
        return $principal_actualizado;
    }


}
