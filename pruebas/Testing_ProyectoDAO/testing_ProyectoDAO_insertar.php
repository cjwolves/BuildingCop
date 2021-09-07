<?php


include_once '../../modelos/ConstantesConexion.php';
include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/modeloProyecto/proyectoDAO.php";


$registro['pro_id']=7;
$registro['material_construccion_mat_id'] = 1002;
$registro['pro_tipo_proyecto']="Residencial";
$registro['pro_nombre_proyecto']="Ferrol";
$registro['pro_numero_proyecto']=223;
$registro['pro_descripcion_proyecto'] = "Proyecto temporal0";
$registro['pro_fecha_inicio'] = "0000-00-00 00:00:00";
$registro['pro_fecha_fin'] = "0000-00-00 00:00:00";
$registro['pro_estado']= 1;

$proyecto=new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$libroInsertado=$proyecto->insertar($registro);


echo "<pre>";
print_r($libroInsertado);
echo "</pre>";