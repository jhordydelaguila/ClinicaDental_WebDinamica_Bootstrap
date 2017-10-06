<?php

include_once '../admin/app/repository/RepositorioUsuario.php';

class ValidadorRegistro {

    private $aviso_inicio;
    private $aviso_cierre;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $usuario;
    private $clave;
    private $error_nombre;
    private $error_apellido;
    private $email;
    //private $error_fechaNacimiento;
    private $error_usuario;
    private $error_clave1;
    private $error_clave2;

    public function __construct($nombre, $apellido, $fechaNacimiento,$email, $usuario, $clave1, $clave2, $conexion) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";

        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNacimiento = $fechaNacimiento;
        $this->usuario = "";
        $this->clave = "";
        
        $this->email = $email;

        $this->error_nombre = $this->validar_nombre($nombre);
        $this->error_apellido = $this->validar_apellido($apellido);
        $this->error_usuario = $this->validar_usuario($conexion, $usuario);
        $this->error_clave1 = $this->validar_clave1($clave1);
        $this->error_clave2 = $this->validar_clave2($clave1, $clave2);

        if ($this->error_clave1 === "" && $this->error_clave2 === "") {
            $this->clave = $clave1;
        }
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_nombre($nombre) {
        if (!$this->variable_iniciada($nombre)) {
            return "Debe escribir un nombre";
        } else {
            $this->nombre = $nombre;
        }

        return "";
    }

    private function validar_apellido($apellido) {
        if (!$this->variable_iniciada($apellido)) {
            return "Debe escribir su apellido";
        } else {
            $this->apellido = $apellido;
        }

        if (strlen($apellido) < 6) {
            return "El apellido debe ser mas largo de 6 caracteres.";
        }

        return "";
    }

    private function validar_usuario($conexion, $usuario) {
        if (!$this->variable_iniciada($usuario)) {
            return "Debe escribir su usuario";
        } else {
            $this->usuario = $usuario;
        }

        if (RepositorioUsuario::usuario_existe($conexion, $usuario)) {
            return "El nombre de usuario ya está en uso. Por favor, prueba otro nombre.";
        }

        return "";
    }

    private function validar_clave1($clave1) {
        if (!$this->variable_iniciada($clave1)) {
            return "Debe escribir su contraseña.";
        }

        return "";
    }

    private function validar_clave2($clave1, $clave2) {
        if (!$this->variable_iniciada($clave1)) {
            return "Primero debes llenar la contraseña";
        }
        if (!$this->variable_iniciada($clave2)) {
            return "Debe repetir su contraseña.";
        }

        if ($clave1 !== $clave2) {
            return "Ambas contraseñas deben coincidir.";
        }

        return "";
    }

    public function mostrar_nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrar_apellido() {
        if ($this->apellido !== "") {
            echo 'value="' . $this->apellido . '"';
        }
    }

    public function mostrar_usuario() {
        if ($this->usuario !== "") {
            echo 'value="' . $this->usuario . '"';
        }
    }

    public function mostrar_error_nombre() {
        if ($this->error_nombre !== "") {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }

    public function mostrar_error_apellido() {
        if ($this->error_apellido !== "") {
            echo $this->aviso_inicio . $this->error_apellido . $this->aviso_cierre;
        }
    }

    public function mostrar_error_usuario() {
        if ($this->error_usuario !== "") {
            echo $this->aviso_inicio . $this->error_usuario . $this->aviso_cierre;
        }
    }

    public function mostrar_error_clave1() {
        if ($this->error_clave1 !== "") {
            echo $this->aviso_inicio . $this->error_clave1 . $this->aviso_cierre;
        }
    }

    public function mostrar_error_clave2() {
        if ($this->error_clave2 !== "") {
            echo $this->aviso_inicio . $this->error_clave2 . $this->aviso_cierre;
        }
    }

    public function registro_valido() {
        if ($this->error_nombre === "" &&
                $this->error_apellido === "" &&
                $this->error_usuario === "" &&
                $this->error_clave1 === "" &&
                $this->error_clave2 === "") {
            return true;
        } else {
            return false;
        }
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getUsuario() {
        return $this->usuario;
    }

    public function getClave() {
        return $this->clave;
    }

}
