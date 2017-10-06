<?php

class PrincipalMarco {

    private $id;
    private $titulo;
    private $imagen;
    private $contenido;
    private $estado;

    public function __construct($id, $titulo, $imagen,$contenido, $estado) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->imagen = $imagen;
        $this->contenido = $contenido;
        $this->estado = $estado;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getEstado() {
        return $this->estado;
    }

}
