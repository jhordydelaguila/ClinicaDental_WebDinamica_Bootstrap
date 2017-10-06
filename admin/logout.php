<?php

include_once '../app/config.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';

if (ControlSession::sesion_iniciada()) {
    ControlSession::cerrar_sesion();
    
    Redireccion::redirigir(RUTA_LOGIN);
} else {
    Redireccion::redirigir(RUTA_LOGIN);
}