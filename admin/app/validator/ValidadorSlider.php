<?php 

class ValidadorSlider{

    //public $allowedExts = array("jpg", "png", "JPG", "PNG");
    //public $extension = end(explode(".",  $imagen);

    private $aviso_inicio;
    private $aviso_cierre;

	private $id;
	private $titulo;
    private $imagen;
    private $estado;

    private $error_titulo;
    private $error_imagen;
    private $error_estado;

	public function __construct($titulo,$imagen,$ruta_imagen,$tipo_imagen,$tamanio_imagen,$estado) {
		$this->aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
        $this->aviso_cierre = "</div>";

        $this->titulo = "";
        $this->imagen = "";
        $this->estado = "";

        $this->error_titulo = $this->validar_titulo($titulo);
        $this->error_imagen = $this->validar_imagen($imagen, $ruta_imagen,$tipo_imagen,$tamanio_imagen);
        $this->error_estado = $this->validar_estado($estado);

 	}

 	private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function validar_titulo($titulo) {
        if (!$this->variable_iniciada($titulo)) {
            return "Debe escribir un titulo.";
        } else {
            $this->titulo = $titulo;
        }
        return "";
    }

    public function validar_imagen($imagen, $ruta_imagen,$tipo_imagen,$tamanio_imagen) {
        if (!$this->variable_iniciada($imagen)) {
            return "Debe subir una imagen.";
        } 
        if ($tipo_imagen != "image/jpeg"){
            return "Debe ser una imagen jpg.";
        }
        if ($tamanio_imagen >= 2000000) {
            return "Sobrepaso el tamaño maximo de 2MB.";
        } else {
            $destino = "../img/" . $imagen;
            copy($ruta_imagen,$destino);
            $this->imagen = $imagen;    
        }
        return "";
    }


    public function validar_estado($estado) {
        if (!$this->variable_iniciada($estado)) {
            return "Debe seleccionar un estado.";
        } else {
            if (strcmp($estado,"Desactivo") === 0){
                $this->estado = 0;
            } else {
                $this->estado = 1;                
            }
        }
        return "";
    }

    public function mostrar_error_titulo() {
        if ($this->error_titulo !== "") {
            echo $this->aviso_inicio . $this->error_titulo . $this->aviso_cierre;
        }
    }

    public function mostrar_error_imagen() {
        if ($this->error_imagen !== "") {
            echo $this->aviso_inicio . $this->error_imagen . $this->aviso_cierre;
        }
    }

    public function mostrar_error_estado() {
        if ($this->error_estado !== "") {
            echo $this->aviso_inicio . $this->error_estado . $this->aviso_cierre;
        }
    }

    public function registro_valido() {
        if ($this->error_titulo === "" &&
                $this->error_imagen === "" &&
                $this->error_estado === "") {
            return true;
        } else {
            return false;
        }
    }


 	public function getTitulo(){
 		return $this->titulo;
 	}
    public function getImagen(){
        return $this->imagen;
    }
    public function getEstado(){
        return $this->estado;
    }
 }



