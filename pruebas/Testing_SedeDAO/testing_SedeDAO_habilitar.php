<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloSede/SedeDAO.php';

$sId=array(258);

$sede=new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);


$sedeHabilitado=$sede->habilitar($sId);

echo "<pre>";
print_r($sedeHabilitado);
echo "</pre>";