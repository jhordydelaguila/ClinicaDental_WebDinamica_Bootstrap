<?php

class Tratamiento {

    private $id;
    private $imagen;
    private $titulo;
    private $contenido;
    private $estado;

    public function __construct($id, $imagen,$titulo, $contenido,$estado) {
        $this->id = $id;
        $this->imagen = $imagen;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->estado = $estado;
    }

    public function getId() {
        return $this->id;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getEstado() {
        return $this->estado;
    }
}
