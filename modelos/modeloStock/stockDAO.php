<?php

//include_once '../ConstantesConexion.php';
//include_once PATH . 'modelos/ConBdMysql.php';

class material_construccionDAO extends ConBdMysql {

public function _construct($servidor, $base, $loginBD, $passwordBD) {

parent::_construct($servidor, $base, $loginBD, $passwordBD);
}

public function seleccionarTodos() {

$planConsulta="SELECT st.sto_id,st.sto_cantidad_almacenado,st.sto_fecha_modificacion,st.sto_estado,re.rec_id,ut.uti_id
FROM stock st
JOIN recibido re ON st.sto_recibido_id=re.rec_id
JOIN utilizado ut ON st.sto_utilizado_id=ut.uti_id
ORDER BY st.sto_id ASC";

$registrosStock=$this->conexion->prepare($planConsulta);
$registrosStock->execute();

$listadoRegistroStock= array();

while($registro2=$registrosStock->fetch(PDO::FETCH_OBJ)) {

$listadoRegistroStock[]=$registro2;

}

$this->cierreBD();

return $listadoRegistroStock;
}

public function seleccionarId($sId) {

        $consulta="SELECT * FROM stock WHERE rec_id=?";

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

}

public function insertar($registro) {

try {

$query="INSERT INTO recibido (sto_id, sto_cantidad_almacenado, sto_fecha_modificacion, sto_estado, sto_recibido_id, sto_utilizado_id) VALUES (:sto_id, :sto_cantidad_almacenado, :sto_fecha_modificacion, :sto_estado, :sto_recibido_id, :sto_utilizado_id);";

$inserta = $this->conexion->prepare($query);

$inserta->bindParam(":sto_id", $registro['sto_id']);
$inserta->bindParam(":sto_cantidad_almacenado", $registro['sto_cantidad_almacenado']);
$inserta->bindParam(":sto_fecha_modificacion", $registro['sto_fecha_modificacion']);
$inserta->bindParam(":sto_estado", $registro['sto_estado']);
$inserta->bindParam(":sto_recibido_id", $registro['sto_recibido_id']);
$inserta->bindParam(":sto_utilizado_id", $registro['sto_utilizado_id']);

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