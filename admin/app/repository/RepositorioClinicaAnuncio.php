<?php

class RepositorioClinicaAnuncio {

    public static function obtener_clinica_anuncio($conexion) {
        
        $principal_anuncio = array();

        if (isset($conexion)) {
            try{
                //include_once 'admin/app/class/ClinicaAnuncio.php';

                $sql = "SELECT * FROM  clinicaanuncio";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $principal_anuncio[] = new ClinicaAnuncio(
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
        return $principal_anuncio;
    }
    
}
