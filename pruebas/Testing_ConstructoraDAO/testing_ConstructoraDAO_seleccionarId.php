<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloConstructora/constructoraDAO.php";

$sId=array(1);

$constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$constructoraSeleccionada = $constructora -> seleccionarId($sId);

echo "<pre>";
print_r($constructoraSeleccionada);
echo "</pre>";

?>
