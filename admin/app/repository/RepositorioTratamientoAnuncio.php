<?php

class RepositorioTratamientoAnuncio {

    public static function obtener_tratamiento_anuncio($conexion) {
        
        $tratamiento_anuncio = array();

        if (isset($conexion)) {
            try{
                include_once 'admin/app/class/TratamientoAnuncio.php';

                $sql = "SELECT * FROM  tratamientoanuncio";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $tratamiento[] = new TratamientoAnuncio(
                            $fila['id'],
                            $fila['titulo'],
                            $fila['contenido'],
                            $fila['estado']);
                    }
                }

            }catch(PDOException $ex){
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $tratamiento;
    }
    
}
