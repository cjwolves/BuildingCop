<?php

include_once PATH.'modelos/ConBdMysql.php';

class CategoriaLibroDAO extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "select cl.catLibId,cl.catLibNombre ";
        $planConsulta .= " from categorialibro cl order by cl.catLibId";

        $registrosCategoriaLibro = $this->conexion->prepare($planConsulta);
        $registrosCategoriaLibro->execute(); //Ejecución de la consulta 

        $listadoRegistrosCategoriasLibros = array();

        while ($registro = $registrosCategoriaLibro->fetch(PDO::FETCH_OBJ)) {

            $listadoRegistrosCategoriasLibros[] = $registro;
        }
        
        $this->cierreBd();
        
        return $listadoRegistrosCategoriasLibros;
    }
    

}
