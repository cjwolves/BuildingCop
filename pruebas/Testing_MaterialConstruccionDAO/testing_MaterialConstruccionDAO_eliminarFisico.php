<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloLibros/LibroDAO.php';

$sId=array(129);

$libros=new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroEliminadoFisico=$libros->eliminar($sId);

echo "<pre>";
print_r($libroEliminadoFisico);
echo "</pre>";
