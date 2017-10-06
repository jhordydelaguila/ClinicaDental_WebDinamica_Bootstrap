<?php

include_once '../admin/app/repository/RepositorioUsuario.php';

class ValidadorLogin {

    private $usuario;
    private $persona;
    private $error;

    public function __construct($usuario, $clave, $conexion) {
        $this->error = "";

        if (!$this->variable_iniciada($usuario) || !$this->variable_iniciada($clave)) {
            $this->usuario = null;
            $this->error = "Debes ingresar tu usuario y tu contraseña.";
        } else {
            $this->usuario = RepositorioUsuario::obtener_usuario($conexion, $usuario);
            $this->persona = RepositorioUsuario::obtener_persona($conexion, $usuario);

            if (is_null($this->usuario) || !password_verify($clave, $this->usuario->getClave())) {
                $this->error = "Datos incorrectos";
            }
        }
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar_error() {
        if ($this->error !== "") {
            echo "<br><div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "</div>";
        }
    }

    public function getUsuario() {
        return $this->usuario;
    }

    function getPersona() {
        return $this->persona;
    }

    public function getError() {
        return $this->error;
    }

}
