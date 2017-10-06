<?php

class RepositorioTratamiento {

    public static function obtener_tratamiento($conexion) {
        
        $tratamiento = array();

        if (isset($conexion)) {
            try{
                //include_once 'Tratamiento.php';

                $sql = "SELECT * FROM  tratamiento";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $tratamiento[] = new Tratamiento(
                            $fila['id'],
                            $fila['imagen'],
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
    
    public static function numero_tratamientos($conexion) {
    	
    	$numero_tratamientos = null;

    	if(isset($conexion)) {
    		try{
    			$sql = "SELECT COUNT(*) as total FROM tratamiento";
    			$sentencia = $conexion->prepare($sql);
    			$sentencia->execute();
    			$resultado = $sentencia->fetch();
    			$numero_tratamientos = $resultado['total'];
    		}catch(PDOException $ex){
    			print 'Error:' . $ex->getMessage();
    		}
    	}
    	return $numero_tratamientos;
    }
}
