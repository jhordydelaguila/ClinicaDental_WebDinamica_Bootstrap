<?php

class RepositorioPersona {

    public static function insertar_persona($conexion, $persona) {
        $persona_insertada = false;

        if (isset($conexion)) {
            try {
                $sql1 = "INSERT INTO persona (PersonaApellido,PersonaNombre,PersonaNacimiento,PersonaEmail,PersonaEstado)
                    VALUES (:PersonaApellido,:PersonaNombre,:PersonaNacimiento,:email,1)";
                $sentencia1 = $conexion->prepare($sql1);
                $sentencia1->bindParam(':PersonaApellido', $persona->getApellido(), PDO::PARAM_STR);
                $sentencia1->bindParam(':PersonaNombre', $persona->getNombre(), PDO::PARAM_STR);
                $sentencia1->bindParam(':PersonaNacimiento', $persona->getFechaNacimiento(), PDO::PARAM_STR);
                $sentencia1->bindParam(':email', $persona->getEmail(), PDO::PARAM_STR);
                
                $persona_insertada = $sentencia1->execute();
            } catch (PDOException $ex) {
                echo 'Error persona:' . $ex->getMessage();
            }
        }
        return $persona_insertada;
    }

    public static function obtener_ultima_persona($conexion) {
        $ultimo_usuario = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT MAX(PersonaCodigo) AS ultimo FROM persona";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $ultimo_usuario = $resultado['ultimo'];
            } catch (PDOException $ex) {
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $ultimo_usuario;
    }

}
