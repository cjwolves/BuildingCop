<?php

include_once 'modelos/ConBdMysql.php';

class LibroDAO extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT l.isbn,l.titulo,l.autor,l.precio,cl.catLibId,cl.catLibNombre ";
        $planConsulta .= " FROM libros l ";
        $planConsulta .= " JOIN categorialibro cl ON l.categoriaLibro_catLibId=cl.catLibId ";
        $planConsulta .= " ORDER BY l.isbn ASC ";

        $registrosLibros = $this->conexion->prepare($planConsulta);
        $registrosLibros->execute(); //Ejecución de la consulta 

        $listadoRegistrosLibros = array();

        while ($registro = $registrosLibros->fetch(PDO::FETCH_OBJ)) {

            $listadoRegistrosLibros[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosLibros;
    }

    public function seleccionarId($sId) {

        $planConsulta = " SELECT * FROM libros l ";
        $planConsulta .= " WHERE l.isbn =  ? ;";

        $listar = $this->conexion->prepare($planConsulta);

        $listar->execute(array($sId[0]));

        $registroEncontrado = array();

        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {

            $registroEncontrado[] = $registro;
        }

        $this->cierreBd();

        if (!empty($registroEncontrado)) {
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
        }
    }

    public function insertar($registro) {
        try {
            $consulta = "INSERT INTO libros (isbn, titulo, autor, 
            precio, categoriaLibro_catLibId) VALUES (:isbn , :titulo , 
            :autor , :precio , :categoriaLibro_catLibId );";

            $insertar = $this->conexion->prepare($consulta);

            $insertar->bindParam(":isbn", $registro['isbn']);
            $insertar->bindParam(":titulo", $registro['titulo']);
            $insertar->bindParam(":autor", $registro['autor']);
            $insertar->bindParam(":precio", $registro['precio']);
            $insertar->bindParam(":categoriaLibro_catLibId", $registro['categoriaLibro_catLibId']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['inserto' => $insercion, 'resultado' => $clavePrimaria];

            $this->cierreBd();
        } catch (PDOException $pdoExc) {
            return ['inserto' => $insercion, $pdoExc->errorInfo[2]];
        }
    }

    public function actualizar($registro) {

        try {
            $autor = $registro[0]['autor'];
            $titulo = $registro[0]['titulo'];
            $precio = $registro[0]['precio'];
            $categoria = $registro[0]['categoriaLibro_catLibId'];
            $isbn = $registro[0]['isbn'];

            if (isset($isbn)) {

                $actualizar = "UPDATE libros SET autor= ? , ";
                $actualizar .= " titulo = ? , ";
                $actualizar .= " precio = ? , ";
                $actualizar .= " categoriaLibro_catLibId = ? ";
                $actualizar .= " WHERE isbn= ? ; ";

                $actualizacion = $this->conexion->prepare($actualizar);

                $resultadoAct = $actualizacion->execute(array($autor, $titulo, $precio, $categoria, $isbn));

                $this->cierreBd();

                //MEJORAR LA SALIDA DE LOS DATOS DE ACTUALIZACIÓN EXITOSA
                return ['actualizacion' => $resultadoAct, 'mensaje' => "Actualización realizada."];
            }
        } catch (PDOException $pdoExc) {
			$this->cierreBd();
            return ['actualizacion' => $resultadoAct, 'mensaje' => $pdoExc];
        }	
		
    }

    public function eliminar($sId = array()) {

        $planConsulta = "delete from libros ";
        $planConsulta .= " where isbn= :isbn ;";

        $eliminar = $this->conexion->prepare($planConsulta);
        $eliminar->bindParam(':isbn', $sId[0], PDO::PARAM_INT);
        $resultado = $eliminar->execute();

        $this->cierreBd();

        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($sId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($sId[0])];
        }
    }

    public function habilitar($sId = array()) {
      
        try {

            $cambiarEstado = 1;

            if (isset($sId[0])) {
                $actualizar = "UPDATE libros SET estado = ? WHERE isbn= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Activado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }		
		
    }

    public function eliminarLogico($sId = array()) {
      
        try {

            $cambiarEstado = 0;

            if (isset($sId[0])) {
                $actualizar = "UPDATE libros SET estado = ? WHERE isbn= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Desactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }				
        
    }
}

?>