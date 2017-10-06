<?php

class RepositorioClinicaInicio {

    public static function obtener_clinica_inicio($conexion) {
        
        $clinica_inicio = null;
        if (isset($conexion)) {
            try{   

                include_once 'admin/app/class/ClinicaInicio.php';

                $sql = "SELECT * FROM clinicainicio";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $clinica_inicio = new ClinicaInicio(
                        $resultado['id'],
                        $resultado['imagen'],
                        $resultado['titulo'],
                        $resultado['contenido'],
                        $resultado['imagenmediana']);
                }

            }catch(PDOException $ex) {
                print 'Error:'  . $ex->getMessage();
            }
        }
        return $clinica_inicio;
    }

}
