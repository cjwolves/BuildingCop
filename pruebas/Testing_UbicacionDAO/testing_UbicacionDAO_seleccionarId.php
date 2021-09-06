<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloLibros/LibroDAO.php';

$sId=array(5);


$libros=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroSeleccionado=$libros->seleccionarId($sId);

echo "<pre>";
print_r($libroSeleccionado);
echo "</pre>";
