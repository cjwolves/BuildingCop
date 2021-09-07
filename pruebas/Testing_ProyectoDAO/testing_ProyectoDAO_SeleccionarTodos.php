<?php

include_once '../../modelos/ConstantesConexion.php';
include_once "../../modelos/ConBdMysql.php";
include_once "../../modelos/modeloProyecto/proyectoDAO.php";


$proyecto = new ProyectoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$listadoCompleto = $proyecto -> seleccionarTodos();

echo "<pre>";
print_r($listadoCompleto);
echo "</pre>";




?>