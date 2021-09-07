<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloSede/SedeDAO.php';

$sId=array(129);

$sede=new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroEliminadoFisico=$sede->eliminar($sId);

echo "<pre>";
print_r($sedeEliminadoFisico);
echo "</pre>";
