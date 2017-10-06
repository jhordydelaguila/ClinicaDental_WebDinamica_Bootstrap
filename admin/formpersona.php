<?php
include_once '../app/config.php';
include_once '../app/Conexion.php';
include_once '../admin/app/class/Persona.php';
include_once '../admin/app/repository/RepositorioPersona.php';
include_once '../admin/app/class/Usuario.php';
include_once '../admin/app/repository/RepositorioUsuario.php';
include_once '../admin/app/validator/ValidadorRegistro.php';
include_once '../admin/app/class/ControlSesion.php';
include_once '../admin/app/class/Redireccion.php';

if (isset($_POST['enviar'])) {
    Conexion::abrir_conexion();

    $validador = new ValidadorRegistro($_POST['nombre'], $_POST['apellido'], $_POST['fechaNacimiento'],$_POST['email'] ,$_POST['usuario'], $_POST['clave1'], $_POST['clave2'], Conexion::obtener_conexion());
    if ($validador->registro_valido()) {
        $persona = new Persona('', $validador->getApellido(), $validador->getNombre(), $validador->getFechaNacimiento(),  $validador->getEmail(),'');
        
        $persona_insertada = RepositorioPersona::insertar_persona(Conexion::obtener_conexion(), $persona);
        $persona_ultima = RepositorioPersona::obtener_ultima_persona(Conexion::obtener_conexion());


        $usuario = new Usuario($persona_ultima, $validador->getUsuario(), password_hash($validador->getClave(), PASSWORD_DEFAULT), '', '');
        $usuario_insertado = RepositorioUsuario::insertar_usuario(Conexion::obtener_conexion(), $usuario);

        if ($usuario_insertado && $persona_insertada) {
            Redireccion::redirigir(RUTA_FORMPERSONA_CORRECTA . '?nombre=' . $persona->getNombre() . '&usuario=' . $usuario->getUsuario());
        }
    }
    Conexion::cerrar_conexion();
}

include_once '../admin/inc/header_common.php';
include_once '../admin/inc/header.php';
include_once '../admin/inc/sidebar_inicio.php'; 
?>
    <div class="row">
        <div class="col-md-10">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">FORMULARIO PERSONA</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <?php
                            if (isset($_POST['enviar'])) {
                                include_once 'app/Registro_Validado.php';
                            } else {
                                include_once 'app/Registro_Vacio.php';
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>    
<?php 
include_once '../admin/inc/sidebar_cierre.php';
include_once '../admin/inc/footer.php';  
include_once '../admin/inc/footer_common.php'; 
?>