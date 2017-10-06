<?php

class PrincipalAnuncios {

    private $id;
    private $titulo;
    private $imagen;
    private $estado;

    public function __construct($id, $titulo, $imagen, $estado) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->imagen = $imagen;
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

    public function getEstado() {
        return $this->estado;
    }

}
