<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_S/Usuario_sDAO.php";

$usuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$listadoCompleto = $usuario -> seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";

?>