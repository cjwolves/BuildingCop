<?php

include_once PATH . 'modelos/modeloLibros/LibroDAO.php';
include_once PATH . 'modelos/modeloCategoriaLibro/CategoriaLibroDAO.php';

class LibrosControlador {

    private $datos;

    public function __construct($datos) {
        $this->datos = $datos;
        $this->librosControlador();
    }

    public function librosControlador() {


        switch ($this->datos['ruta']) {
            case "listarLibros": //provisionalmente para trabajar con datatables
                $this->listarLibros();
                break;
            case "actualizarLibro": //provisionalmente para trabajar con datatables
                $this->actualizarLibro();
                break;
            case "confirmaActualizarLibro": //provisionalmente para trabajar con datatables
                $this->confirmaActualizarLibro();
                break;
            case "cancelarActualizarLibro": //provisionalmente para trabajar con datatables
                $this->cancelarActualizarLibro();
                break;
            case "mostrarInsertarLibros": //provisionalmente para trabajar con datatables

                $this->mostrarInsertarLibros();
                break;

            case "insertarLibro": //provisionalmente para trabajar con datatables

                $this->insertarLibro();
                break;
        }
    }

    public function listarLibros() {

        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroLibros = $gestarLibros->seleccionarTodos();

        session_start();

        //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
        $_SESSION['listaDeLibros'] = $registroLibros;

        header("location:principal.php?contenido=vistas/vistasLibros/listarDTRegistrosLibros.php");
    }

    public function actualizarLibro() {
        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $consultaDeLibro = $gestarLibros->seleccionarId(array($this->datos['idAct'])); //Se consulta el libro para traer los datos.

        $actualizarDatosLibro = $consultaDeLibro['registroEncontrado'][0];

        /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarCategoriaLibros = new CategoriaLibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCategoriasLibros = $gestarCategoriaLibros->seleccionarTodos();
        /*         * ************************************************************************* */


        session_start();
        $_SESSION['actualizarDatosLibro'] = $actualizarDatosLibro;
        $_SESSION['registroCategoriasLibros'] = $registroCategoriasLibros;

        header("location:principal.php?contenido=vistas/vistasLibros/vistaActualizarLibro.php");
    }

    public function confirmaActualizarLibro() {
        $gestarLibros = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $actualizarLibro = $gestarLibros->actualizar(array($this->datos)); //Se envía datos del libro para actualizar. 				

        session_start();
        $_SESSION['mensaje'] = "Actualización realizada.";
        header("location:Controlador.php?ruta=listarLibros");
    }

    public function cancelarActualizarLibro() {
        session_start();
        $_SESSION['mensaje'] = "Desistió de la actualización";
        header("location:Controlador.php?ruta=listarLibros");
    }

    public function mostrarInsertarLibros() {



        /*         * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
        $gestarCategoriaLibros = new CategoriaLibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        $registroCategoriasLibros = $gestarCategoriaLibros->seleccionarTodos();
        /*         * ************************************************************************* */

        session_start();
        $_SESSION['registroCategoriasLibros'] = $registroCategoriasLibros;
        $registroCategoriasLibros = null;

        header("Location: principal.php?contenido=vistas/vistasLibros/vistaInsertarLibro.php");
    }

    public function insertarLibro() {

        //Se instancia LibroDAO para insertar
        $buscarLibro = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
        //Se consulta si existe ya el registro
        $libroHallado = $buscarLibro->seleccionarId(array($this->datos['isbn']));
        //Si no existe el libro en la base se procede a insertar ****  		
        if (!$libroHallado['exitoSeleccionId']) {
            $insertarLibro = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
            $insertoLibro = $insertarLibro->insertar($this->datos);  //inserción de los campos en la tabla libros 

            $resultadoInsercionLibro = $insertoLibro['resultado'];  //Traer el id con que quedó el libro de lo contrario la excepción o fallo  

            session_start();
            $_SESSION['mensaje'] = "Registrado " . $this->datos['isbn'] . " con éxito.  Agregado Nuevo Libro con " . $resultadoInsercionLibro;

            header("location:Controlador.php?ruta=listarLibros");
        } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
            session_start();
            $_SESSION['isbn'] = $this->datos['isbn'];
            $_SESSION['titulo'] = $this->datos['titulo'];
            $_SESSION['autor'] = $this->datos['autor'];
            $_SESSION['precio'] = $this->datos['precio'];
            $_SESSION['categoriaLibro_catLibId'] = $this->datos['categoriaLibro_catLibId'];

            $_SESSION['mensaje'] = "   El código " . $this->datos['isbn'] . " ya existe en el sistema.";

            header("location:Controlador.php?ruta=mostrarInsertarLibros");
        }
    }

}

?>