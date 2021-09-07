<?php


include_once '../../modelos/ConstantesConexion.php';
include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/modeloProyecto/proyectoDAO.php";

$sId=array(5);


$proyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$proyecto->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
