<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloConstructora/constructoraDAO.php";

$constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$listadoCompleto = $constructora -> seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";

?>