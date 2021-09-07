<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMysql.php';
include_once PATH . 'modelos/modeloProyecto/proyectoDAO.php';

$registro[0]['pro_id'] = 387;
$registro[0]['material_construccion_mat_id'] = "2252819 CRUD INSERTAR";
$registro[0]['autor'] = "Henry";
$registro[0]['precio'] = "1000000";
$registro[0]['categoriaLibro_catLibId'] = 2;

$libroActualizado = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
