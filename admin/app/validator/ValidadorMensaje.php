<?php 

class ValidadorMensaje{

    // Patrón para usar en expresiones regulares (admite letras acentuadas y espacios):
    private $patron_texto;

    private $aviso_inicio;
    private $aviso_cierre;

	private $id;
	private $nombre;
    private $telefono;
    private $email;
    private $mensaje;
    private $captcha;

    private $error_nombre;
    private $error_telefono;
    private $error_email;
    private $error_mensaje;
    private $error_captcha;

    //email-enviar
    

	public function __construct($nombre,$telefono,&$email,&$mensaje,$captcha) {
		$this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";

        $this->nombre = "";
        $this->telefono = "";
        $this->email = "";
        $this->mensaje = "";
        $this->captcha = "";

        $this->patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";

        $this->error_nombre = $this->validar_nombre($nombre);
        $this->error_telefono = $this->validar_telefono($telefono);
        $this->error_email = $this->validar_email($email);
        $this->error_mensaje = $this->validar_mensaje($mensaje);
        $this->error_captcha = $this->validar_captcha($captcha);

 	}

 	private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function validar_nombre($nombre) {
        if (!$this->variable_iniciada($nombre)) {
            return "Debe ingresar su nombre.";
        }
        else {
            $this->nombre = $nombre;
        }
        return "";
    }

    public function validar_telefono($telefono) {
        if (!$this->variable_iniciada($telefono)) {
            return "Debe escribir su telefono para poder contactarlo.";
        } else {
            $this->telefono = $telefono;
        }
        return "";
    }
    //mas validadcion
    public function validar_email($email) {
        if (!$this->variable_iniciada($email)) {
            return "Debe escribir un correo electronico.";
        } 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Debe ingresar un correo electronico valido!.";
        }
        else {
            $this->email = $email;
        }
        return "";
    }

    public function validar_mensaje($mensaje) {
        if (!$this->variable_iniciada($mensaje)) {
            return "Debe escribir un mensaje.";
        } else {
            $this->mensaje = $mensaje;
        }
        return "";
    }

    public function validar_captcha($captcha) {
        if (!$this->variable_iniciada($captcha)) {
            return "Debe escribir el captcha de la imagen.";
        }
        if ($captcha != 4) {
            return "Debe ingresar el resultado correcto!";
        } 
        else {
            $this->captcha = $captcha;
        }
        return "";
    }

    public function mostrar_error_nombre() {
        if ($this->error_nombre !== "") {
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }

    public function mostrar_error_telefono() {
        if ($this->error_telefono !== "") {
            echo $this->aviso_inicio . $this->error_telefono . $this->aviso_cierre;
        }
    }

    public function mostrar_error_email() {
        if ($this->error_email !== "") {
            echo $this->aviso_inicio . $this->error_email . $this->aviso_cierre;
        }
    }

    public function mostrar_error_mensaje() {
        if ($this->error_mensaje !== "") {
            echo $this->aviso_inicio . $this->error_mensaje . $this->aviso_cierre;
        }
    }

    public function mostrar_error_captcha() {
        if ($this->error_captcha !== "") {
            echo $this->aviso_inicio . $this->error_captcha . $this->aviso_cierre;
        }
    }

    public function registro_valido() {
        if ($this->error_nombre === "" &&
                $this->error_telefono === "" &&
                $this->error_email === "" &&
                $this->error_mensaje === "" &&
                $this->error_captcha === "") {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar_nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrar_telefono() {
        if ($this->telefono !== "") {
            echo 'value="' . $this->telefono . '"';
        }
    }

    public function mostrar_email() {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }

    public function mostrar_mensaje() {
        if ($this->mensaje !== "") {
            echo 'value="' . $this->mensaje . '"';
        }
    }

 	public function getNombre(){
 		return $this->nombre;
 	}
    public function getTelefono(){
        return $this->telefono;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getMensaje(){
        return $this->mensaje;
    }
    public function getCaptcha(){
        return $this->captcha;
    }
 }



