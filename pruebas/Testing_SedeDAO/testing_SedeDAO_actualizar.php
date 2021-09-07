<?php

include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/modeloSedeDAO/SedeDAO.php';



$registro[0]['isbn'] = 387;
$registro[0]['titulo'] = "2252819 CRUD INSERTAR";
$registro[0]['autor'] = "Henry";
$registro[0]['precio'] = "1000";
$registro[0]['categoriaSede_sed_Id'] = 2;

//echo "<pre>";  
//print_r ($registro); 
//echo "</pre>";

$sedeActualizado = new SedeDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $sedeActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
