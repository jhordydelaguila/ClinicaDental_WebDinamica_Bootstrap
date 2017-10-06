<?php

class ContactoMensaje {

    private $id;
    private $nombre;
    private $telefono;
    private $email;
    private $mensaje;
    private $fecha;

    public function __construct($id, $nombre, $telefono,$email, $mensaje, $fecha) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->mensaje = $mensaje;
        $this->fecha = $fecha;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function getFecha() {
        return $this->fecha;
    }

}
