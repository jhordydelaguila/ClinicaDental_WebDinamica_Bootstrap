<?php

class ClinicaInstalaciones {

    private $id;
    private $nombre;
    private $imagen;

    public function __construct($id, $nombre, $imagen) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getImagen() {
        return $this->imagen;
    }


}
