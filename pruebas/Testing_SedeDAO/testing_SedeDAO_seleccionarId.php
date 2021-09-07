<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloSede/SedeDAO.php';

$sId=array(5);


$sede=new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$sedeSeleccionado=$sede->seleccionarId($sId);

echo "<pre>";
print_r($sedeSeleccionado);
echo "</pre>";
