<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_S/Usuario_sDAO.php";

$sId=array(1);

$usuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$usuarioSeleccionado = $usuario -> seleccionarId($sId);

echo "<pre>";
print_r($usuarioSeleccionado);
echo "</pre>";

?>
