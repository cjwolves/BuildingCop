<?php

define("BASE", "libros_lg"); //se define una constante para la base, de ahora en adelante BASE
//define("SERVIDOR", "127.0.0.1"); //se define una constante para el servidor, de ahora en adelante SERVIDOR
define("SERVIDOR", "localhost"); //se define una constante para el servidor, de ahora en adelante SERVIDOR
define("USUARIO_BD", "root"); //se define una constante para el usuario de la base, de ahora en adelante USUARIO_BD
define("CONTRASENIA_BD", ""); //se define una constante para la contraseña,de ahora en adelante CONTRASENIA_BD
define("PATH", $_SERVER['DOCUMENT_ROOT'] . "/" . "2252819_TPS_Proyecto_SEMILLA" . "/");

abstract class ConBdMySql {

    private $servidor;
    private $base;
    protected $conexion;

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        $this->servidor = $servidor;
        $this->base = $base;

        try {
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'');
            $dsn = "mysql:dbname=" . $this->base . ";host=" . $this->servidor;

            $this->conexion = new PDO($dsn, $loginBD, $passwordBD, $options);

            //echo "Conexión a base de datos exitosa";
        } catch (Exception $ex) {

            echo "Error de Conexión" . $ex->getMessage();
        }
    }

}

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

    public function cierreBd() {

        $this->conexion = NULL;
    }

}


use PHPUnit\Framework\TestCase;

final class CategoriaLibroDAOTest extends TestCase {

    private $op;

    public function setUp(): void {
        $this->op = new CategoriaLibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD); //Se instancia la clase a probar
    }

    public function testSeleccionarTodos() {
        $this->assertEmpty(!$this->op->seleccionarTodos());
    }


}

//https://phpunit.readthedocs.io/es/latest/assertions.html
