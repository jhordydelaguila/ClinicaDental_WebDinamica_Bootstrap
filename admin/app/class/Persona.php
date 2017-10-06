<?php

class Persona {

    private $codigo;
    private $apellido;
    private $nombre;
    private $fechaNacimiento;
    private $email;
    private $estado;

    public function __construct($codigo,$apellido, $nombre, $fechaNacimiento, $email,$estado) {
        $this->codigo = $codigo;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->email = $email;
        $this->estado = $estado;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

}
