<?php

class Principal {

    private $id;
    private $titulo;
    private $subtitulo;
    private $contenido;

    public function __construct($id, $titulo, $subtitulo, $contenido) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->subtitulo = $subtitulo;
        $this->contenido = $contenido;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getSubTitulo() {
        return $this->subtitulo;
    }

    public function getContenido() {
        return $this->contenido;
    }

}
