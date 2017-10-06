<?php

class ContactoInfo {

    private $id;
    private $comentario;
    private $lugar;
    private $telefono;
    private $email;
    private $horario;
    private $mensaje;

    public function __construct($id, $comentario, $lugar, $telefono,$email, $horario, $mensaje) {
        $this->id = $id;
        $this->comentario = $comentario;
        $this->lugar = $lugar;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->horario = $horario;
        $this->mensaje = $mensaje;
    }

    public function getId() {
        return $this->id;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getLugar() {
        return $this->lugar;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

}
