<?php

//include_once '../ConstantesConexion.php';
//include_once PATH . 'modelos/ConBdMysql.php';

class material_construccionDAO extends ConBdMysql {

public function _construct($servidor, $base, $loginBD, $passwordBD) {

parent::_construct($servidor, $base, $loginBD, $passwordBD);
}

public function seleccionarTodos() {

$planConsulta="SELECT r.rec_id,r.rec_num_factura,r.rec_cantidad_recibido,r.rec_fecha_recibido,r.rec_fecha_modificacion,mc.mat_id,mc.mat_nombre_material
FROM recibido r
JOIN material_construccion mc ON r.rec_material_construccion_id=mc.mat_id
ORDER BY r.rec_id ASC ";

$registrosRecibido=$this->conexion->prepare($planConsulta);
$registrosRecibido->execute();

$listadoRegistroRecibido= array();

while($registro=$registrosRecibido->fetch(PDO::FETCH_OBJ)) {

$listadoRegistroRecibido[]=$registro;

}

$this->cierreBD();

return $listadoRegistroRecibido;
}

public function seleccionarId($sId) {

        $consulta="SELECT * FROM recibido WHERE rec_id=?";

        $lista=$this->conexion->prepare($planConsulta);
        $lista->execute(array($sId[0]));

        $registroEncontrado = array();

        while( $registro = $lista->fetch(PDO::FETCH_OBJ)){
            $registroEncontrado[]=$registro;
        }
          
        $this->cierreBd();
        if(!empty($registroEncontrado)){
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEncontrado];
        }else{
            return ['exitosaSeleccionId' => false, 'registroEncontrado' => $registroEncontrado];
        }

}

public function insertar($registro) {

try {

$query="INSERT INTO recibido (rec_id, rec_num_factura. rec_cantidad_recibido, rec_fecha_modificacion, rec_material_construccion_id) VALUES (:rec_id, :rec_num_factura, :rec_cantidad_recibido, :rec_fecha_modificacion, :rec_material_construccion_id);";

$inserta = $this->conexion->prepare($query);

$inserta->bindParam(":rec_id", $registro['rec_id']);
$inserta->bindParam(":rec_num_factura", $registro['rec_num_factura']);
$inserta->bindParam(":rec_cantidad_recibido", $registro['rec_cantidad_recibido']);
$inserta->bindParam(":rec_fecha_modificacion", $registro['rec_fecha_modificacion']);
$inserta->bindParam(":rec_material_construccion_id", $registro['rec_material_construccion_id']);

$insercion = $inserta->execute();

$clavePrimaria = $this->conexion->lastInsertId();

return ['inserto'=>1,'resultado' => $clavePrimaria];

}

catch {PDOException $pdoExc} {
return ['inserto' > 0, $pdoExc->errorinfo[2]];

}

public function actualizar ($registro) {

}
public function eliminar($sId = array()) {

}

public function habilitar($sId = array()) {

}

public function eliminarLogico($sId = array()) {
    
}

}

?>