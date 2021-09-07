<?php


include_once '../../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloSede/sedeDAO.php';


$registro['isbn']=128;
$registro['titulo']="2252819 R1 CRUD INSERTAR";
$registro['autor']="Miguel";
$registro['precio']="100000";
$registro['categoriaSede_catLibId']=2;


$libros=new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$sedeInsertado=$sede->insertar($registro);


echo "<pre>";
print_r($sedeInsertado);
echo "</pre>";