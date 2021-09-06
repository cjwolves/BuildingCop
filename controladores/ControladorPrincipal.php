<?php

include_once PATH . 'controladores/LibrosControlador.php';
include_once PATH . 'controladores/Usuario_sControlador.php';

class ControladorPrincipal {

    private $datos = array();

    public function __construct() {

        if (!empty($_POST) && isset($_POST["ruta"])) {
            $this->datos = $_POST;
        }
        if (!empty($_GET) && isset($_GET["ruta"])) {
            $this->datos = $_GET;
        }

        $this->control();
    }

    public function control() {
		
		echo "error ".__LINE__."<br/>";
		
        switch ($this->datos['ruta']) {
            case "listarLibros":
                $this->listarLibros();
                break;
            case "actualizarLibro":

                $this->actualizarLibro();

                break;

            case "confirmaActualizarLibro":
                $this->confirmaActualizarLibro();
                break;
				
            case "cancelarActualizarLibro":
                $this->cancelarActualizarLibro();
                break;	
            case "mostrarInsertarLibros":
                $this->mostrarInsertarLibros();
                break;

            case "insertarLibro":
                $this->insertarLibro();
                break;				
			
            case "gestionDeRegistro":
                $this->gestionDeRegistro();
                break;
				
            case "gestionDeAcceso":
                $this->gestionDeAcceso();
                break;
				
				
        }
    }

    public function listarLibros() {
        $librosControlador = new LibrosControlador($this->datos);
    }

    public function actualizarLibro() {
        $librosControlador = new LibrosControlador($this->datos);
    }

    public function confirmaActualizarLibro() {

        $librosControlador = new LibrosControlador($this->datos);
    }
    public function cancelarActualizarLibro() {

        $librosControlador = new LibrosControlador($this->datos);
    }	
	
    public function mostrarInsertarLibros() {

        $librosControlador = new LibrosControlador($this->datos);
    }	
	
    public function insertarLibro() {

        $librosControlador = new LibrosControlador($this->datos);
    }	

    public function gestionDeRegistro() {

        $usuario_sControlador = new Usuario_sControlador($this->datos);
    }
	
	    public function gestionDeAcceso() {

        $usuario_sControlador = new Usuario_sControlador($this->datos);
    }

}

?>