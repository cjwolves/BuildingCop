<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloRol/RolDAO.php";

$rol = new RolDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$registro[0]['rol_id_rol'] = 1;
$registro[0]['rol_tipo_rol'] = "obrero";

$rolActualizado = $rol -> actualizar($registro);

echo "<pre>";
print_r($rolActualizado);
echo "</pre>";

?>

