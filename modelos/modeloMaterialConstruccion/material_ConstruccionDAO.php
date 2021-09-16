<?php

//include_once '../ConstantesConexion.php';
//include_once PATH . 'modelos/ConBdMysql.php';

class material_construccionDAO extends ConBdMysql {

public function _construct($servidor, $base, $loginBD, $passwordBD) {

parent::_construct($servidor, $base, $loginBD, $passwordBD);
}

public function seleccionarTodos() {
    $planConsulta="SELECT mc.mat_id,mc.mat_nombre_material,mc.mat_tipo_material,mc.mat_precio
    FROM material_construccion mc";
    
    $registrosMaterial_Construccion=$this->conexion->prepare($planConsulta);
    $registrosMaterial_Construccion->execute();
    
    $listadoRegistroMaterial= array();
    
    while($registro1=$registrosMaterial_Construccion->fetch(PDO::FETCH_OBJ)) {
    
    $listadoRegistroMaterial[]=$registro1;
    
    }
    
    $this->cierreBD();
    
    return $listadoRegistroMaterial;
}

public function seleccionarId($sId) {

        $consulta="SELECT * FROM material_construccion WHERE rec_id=?";

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

$query="INSERT INTO material_construccion (mat_id, mat_nombre_material, mat_tipo_material, mat_precio) VALUES (:mat_id, :mat_nombre_material, :mat_tipo_material, :mat_precio);";

$inserta = $this->conexion->prepare($query);

$inserta->bindParam(":mat_id", $registro['mat_id']);
$inserta->bindParam(":mat_nombre_material", $registro['mat_nombre_material']);
$inserta->bindParam(":mat_tipo_material", $registro['mat_tipo_material']);
$inserta->bindParam(":mat_precio", $registro['mat_precio']);

$insercion = $inserta->execute();

$clavePrimaria = $this->conexion->lastInsertId();

return ['inserto'=>1,'resultado' => $clavePrimaria];
}

} catch {PDOException $pdoExc} {
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