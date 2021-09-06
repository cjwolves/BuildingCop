<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$listadoCompleto = $rol -> seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";

?>