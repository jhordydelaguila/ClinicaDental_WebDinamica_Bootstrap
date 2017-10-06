<?php

class ClinicaInicio {

    private $id;
    private $imagen;
    private $titulo;
    private $contenido;
    private $imagenMediana;

    public function __construct($id, $imagen,$titulo, $contenido,$imagenMediana) {
        $this->id = $id;
        $this->imagen = $imagen;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->imagenMediana = $imagenMediana;
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

    public function getImagenMediana() {
        return $this->imagenMediana;
    }
}
