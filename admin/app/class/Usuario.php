<?php

class Usuario {

    private $codigo_persona;
    private $usuario;
    private $clave;
    private $estado;
    private $hora;

    public function __construct($codigo_persona, $usuario, $clave, $estado, $hora) {
        $this->codigo_persona = $codigo_persona;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->estado = $estado;
        $this->hora = $hora;
    }

    function getCodigo_persona() {
        return $this->codigo_persona;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getEstado() {
        return $this->estado;
    }

    function getHora() {
        return $this->hora;
    }

    function setCodigo_persona($codigo_persona) {
        $this->codigo_persona = $codigo_persona;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

}
