<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloUsuario_S/Usuario_sDAO.php";

$registro['usuId']=8;
$registro['usuLogin']="camilo";
$registro['usuPassword']="CAMILO1728";
$registro['usuEstado']=1;

$usuario = new Usuario_sDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$usuarioInsertado = $usuario -> insertar($registro);

echo "<pre>";
print_r($usuarioInsertado);
echo "</pre>";

?>