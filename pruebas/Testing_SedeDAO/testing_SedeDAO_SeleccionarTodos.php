<?php

include_once PATH . '../../modelos/ConstantesConexion.php';
include_once PATH . '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloSede/SedeDAO.php';


$sede=new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$listadoCompleto=$sede->seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";



?>