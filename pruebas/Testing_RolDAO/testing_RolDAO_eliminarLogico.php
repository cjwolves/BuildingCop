<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$sId=array(1);

$rolEliminadoLogico = $rol -> eliminarLogico($sId);

echo "<pre>";
print_r($rolEliminadoLogico);
echo "</pre>";

?>