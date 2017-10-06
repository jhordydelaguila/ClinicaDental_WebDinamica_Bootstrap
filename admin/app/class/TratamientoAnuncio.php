<?php

class TratamientoAnuncio {

    private $id;
    private $titulo;
    private $contenido;
    private $estado;

    public function __construct($id,$titulo, $contenido,$estado) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->estado = $estado;
    }

    public function getId() {
        return $this->id;
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
