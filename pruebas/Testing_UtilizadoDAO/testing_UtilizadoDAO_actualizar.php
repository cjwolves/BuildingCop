<?php

include_once '../../modelos/ConstantesConexion.php';
include_once PATH . 'modelos/ConBdMysql.php';
include_once PATH . 'modelos/modeloLibros/LibroDAO.php';

$registro[0]['isbn'] = 387;
$registro[0]['titulo'] = "2252819 CRUD INSERTAR";
$registro[0]['autor'] = "Henry";
$registro[0]['precio'] = "1000000";
$registro[0]['categoriaLibro_catLibId'] = 2;

$libroActualizado = new LibroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $libroActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
