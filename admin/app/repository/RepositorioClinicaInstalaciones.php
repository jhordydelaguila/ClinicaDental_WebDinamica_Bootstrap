<?php

class RepositorioClinicaInstalaciones{

    public static function obtener_instalaciones($conexion) {
        
        $instalaciones = array();

        if (isset($conexion)) {
            try{
                include_once '../admin/app/class/ClinicaInstalaciones.php';

                $sql = "SELECT * FROM  clinica_instalaciones";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $instalaciones[] = new ClinicaInstalaciones($fila['id'],$fila['nombre'],$fila['imagen']);
                    }
                }

            }catch(PDOException $ex){
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $instalaciones;
    }

}