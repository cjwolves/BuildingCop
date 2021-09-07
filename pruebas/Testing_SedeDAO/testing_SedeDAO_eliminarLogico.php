<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloSede/SedeDAO.php';

$sId=array(258);

$sede=new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$sedeElimandoLogico=$libros->eliminarLogico($sId);

echo "<pre>";
print_r($sedeElimandoLogico);
echo "</pre>";