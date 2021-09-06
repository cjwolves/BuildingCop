<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$registro['rol_id_rol']=7;
$registro['rol_tipo_rol']="caminador";

$rolSeleccionado = $rol -> insertar($registro);

echo "<pre>";
print_r($rolSeleccionado);
echo "</pre>";

?>

