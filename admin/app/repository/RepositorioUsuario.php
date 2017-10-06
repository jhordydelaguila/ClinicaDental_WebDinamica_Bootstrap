<?php

class RepositorioUsuario {

    public static function obtener_todos($conexion) {
        $usuario = array();

        if (isset($conexion)) {
            try {
                include_once 'admin/app/class/Usuario.php';

                $sql = "select * from usuario ";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuario[] = new Usuario($fila['PersonaCodigo'], $fila['UsuarioCodigo'], $fila['UsuarioClave'], $fila['UsuarioEstado'], $fila['hora']);
                    }
                } else {
                    print "No hay usuarios ";
                }
            } catch (PDOException $ex) {
                print "Error: " . $ex->getMessage();
            }
        }
        return $usuario;
    }

    public static function insertar_usuario($conexion, $usuario) {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql2 = "INSERT INTO usuario(PersonaCodigo,UsuarioCodigo,UsuarioClave,UsuarioEstado,hora) "
                        . "VALUES(:personacodigo,:usuario,:clave,1,NOW())";
                $sentencia2 = $conexion->prepare($sql2);
                $sentencia2->bindParam(':personacodigo', $usuario->getCodigo_persona(), PDO::PARAM_INT);
                $sentencia2->bindParam(':usuario', $usuario->getUsuario(), PDO::PARAM_STR);
                $sentencia2->bindParam(':clave', $usuario->getClave(), PDO::PARAM_STR);

                $usuario_insertado = $sentencia2->execute();
            } catch (PDOException $ex) {
                print 'Error usuario: ' . $ex->getMessage();
            }
        }
        return $usuario_insertado;
    }

    public static function usuario_existe($conexion, $usuario) {
        $usuario_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuario where UsuarioCodigo = :usuario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    $usuario_existe = true;
                } else {
                    $usuario_existe = false;
                }
            } catch (PDOException $ex) {
                print 'Error: ' . $ex->getMessage();
            }
        }

        return $usuario_existe;
    }

    public static function obtener_persona($conexion, $usuarioCodigo) {
        $persona = null;
        if (isset($conexion)) {
            try {
                include_once '../admin/app/class/Persona.php';

                $sql2 = "SELECT p.PersonaCodigo,p.PersonaApellido,p.PersonaNombre,p.PersonaNacimiento,p.PersonaEmail,p.PersonaEstado
                        FROM usuario u
                        INNER JOIN persona p on p.PersonaCodigo = u.PersonaCodigo
                        where u.UsuarioCodigo = :usuarioCodigo";

                $sentencia = $conexion->prepare($sql2);
                $sentencia->bindParam(':usuarioCodigo', $usuarioCodigo, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado2 = $sentencia->fetch();
                if (!empty($resultado2)) {
                    $persona = new Persona(
                            $resultado2['PersonaCodigo'], $resultado2['PersonaApellido'], $resultado2['PersonaNombre'], $resultado2['PersonaNacimiento'],$resultado2['PersonaEmail'] ,$resultado2['PersonaEstado']);
                }
            } catch (PDOException $ex) {
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $persona;
    }

    public static function obtener_usuario($conexion, $usuarioCodigo) {
        $usuario = null;
        if (isset($conexion)) {
            try {

                include_once '../admin/app/class/Usuario.php';

                $sql = "SELECT * FROM usuario WHERE UsuarioCodigo = :usuarioCodigo ";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuarioCodigo', $usuarioCodigo, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $usuario = new Usuario(
                            $resultado['PersonaCodigo'], $resultado['UsuarioCodigo'], $resultado['UsuarioClave'], $resultado['UsuarioEstado'], $resultado['hora']);
                }
            } catch (PDOException $ex) {
                print 'Error: ' . $ex->getMessage();
            }
        }
        return $usuario;
    }

}
