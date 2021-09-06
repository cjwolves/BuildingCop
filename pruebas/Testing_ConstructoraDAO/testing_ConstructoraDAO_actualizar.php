<?php 

include_once "../../modelos/ConBdMysql.php";
include_once  "../../modelos/ConstantesConexion.php";
include_once "../../modelos/modeloConstructora/constructoraDAO.php";

$registro['con_id']=1;
$registro['con_nombre_empresa']='empenadas empanando';
$registro['on_id_tipo_documento']=1;
$registro['con_numero_documento']="1010091680";
$registro['usuario_s_usuId']=1;

$constructora = new ConstructoraDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

$constructoraActualizada = $constructora -> actualizar($registro);

echo "<pre>";
print_r($constructoraActualizada);
echo "</pre>";

?>
