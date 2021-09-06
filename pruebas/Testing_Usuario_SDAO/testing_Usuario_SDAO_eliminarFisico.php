<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_S/Usuario_sDAO.php";

$registro[0]['usuLogin'] = "Henry";
$registro[0]['usuPassword'] = "yo";
$registro[0]['usuId'] = 1;

$sId=array(8);

$usuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$usuarioEliminadoFisico = $usuario -> eliminar($sId);

echo "<pre>";
print_r($usuarioEliminadoFisico);
echo "</pre>";

?>