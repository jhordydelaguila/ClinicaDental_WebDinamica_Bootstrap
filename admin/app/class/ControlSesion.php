<?php

class ControlSession {

    public static function iniciar_sesion($id_usuario, $usuario, $usuario_nombre) {

        if (session_id() == '') {
            session_start();
        }

        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['usuario_nombre'] = $usuario_nombre;
    }

    public static function cerrar_sesion() {

        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['id_usuario'])) {
            unset($_SESSION['id_usuario']);
        }
        if (isset($_SESSION['usuario'])) {
            unset($_SESSION['usuario']);
        }

        if (isset($_SESSION['usuario_nombre'])) {
            unset($_SESSION['usuario_nombre']);
        }

        session_destroy();
    }

    public static function sesion_iniciada() {

        if (session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['id_usuario']) && isset($_SESSION['usuario']) && isset($_SESSION['usuario_nombre'])) {
            return true;
        } else {
            return false;
        }
    }

}
