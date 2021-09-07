<?php

include_once '../../modelos/ConstantesConexion.php';
include_once '../../modelos/ConBdMysql.php';
include_once '../../modelos/modeloTipo_documentoDAO/Tipo_documentoDAO.php';

$registro[]['isbn'] = 387;
$registro[]['titulo'] = "2252819 CRUD INSERTAR";
$registro[]['autor'] = "Henry";
$registro[]['precio'] = "1000";
$registro[]['categoriaLibro_catLibId'] = 2;

$tipo_documentoActualizado = new TipoDocumentoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$resultadoActualizacion = $tipo_documentoActualizado->actualizar($registro);

echo "<pre>";
print_r($resultadoActualizacion);
echo "</pre>";
