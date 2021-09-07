<?php

include_once  '../modelos/ConBdMysql.php';

class SedeDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM sede;";

        $registroRol = $this->conexion->prepare($planconsulta);
        $registroRol->execute();

        $listadoRegistrosRol = array();

        while( $registro = $registroSede->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosSede[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosSede;
    }

    public function seleccionarID($sId){

        $consulta="select * FROM sede WHERE sed_id=?";

        $lista=$this->conexion->prepare($consulta);
        $lista->execute(array($sId[0]));

        $registroEnco = array();

        while( $registro = $lista->fetch(PDO::FETCH_OBJ)){
            $registroEnco[]=$registro;
        }
          
        if(!empty($registroEnco)){
            return ['exitoSeleccionId' => true, 'registroEncontrado' => $registroEnco];
        }else{
            return ['exitosaSeleccionId' => false, 'registroEncontrado' => $registroEnco];
        }

    }

    public function insertar($registro){

        try {
            
            $consulta="INSERT INTO Sede (sed_id, sed_constrcutora_id, sed_ubicacion_id) VALUES (:sed_id, sed_constrcutora_id, sed_ubicacion_id);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":sed_id", $registro['sed_id']);
            $insertar -> bindParam(":sed_constructora_id", $registro['sed_constructora_id']);
            
            $insertar -> bindParam(":sed_ubicacion_id", $registro['sed_ubicacion_id']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){
    echo "<pre>"; 
    print_r($registro);
    echo "</pre>";    
    
    try {

            $tipoSede = $registro[0]['sed_id'];
            $sed_id = $registro[0]['sed_id'];
            
            if(isset($sed_id)){
                $consulta = "UPDATE sede SET sede = ?
                WHERE sed_id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($tipoSede, $sed_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM sede WHERE se_id = :sed_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':sed_id', $sId[0],PDO::PARAM_INT);
        $resultado = $eliminar->execute();

        $this->cierreBd();

        if(!empty($resultado)){
            return ['eliminado' => true, 'registroEliminado' => array($sId[0])];
        }else{
            return ['eliminado' => false, 'registroEliminado' => array($sId[0])];
        }

    }

    public function habilitar($sId = array()){

        try {
            $Estado = 1;

            if(isset($sId[0])){
                $actualizar = "UPDATE sede SET sed_autEstado = ? WHERE sed_id = ?";
                $actualizar = $this->conexion->prepare($actualizar);
                $actualizar = $actualizar->execute(array($Estado, $sId[0]));
                return ['actualizacion' => $actualizar, 'mensaje' => 'Resgistro Activado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizar, $pdoExc->errorInfo[2]];
        }
    }

    public function eliminarLogico($sId = array()){

        try {
            $Estado = 0;

            if(isset($sId[0])){
                $actualizar = "UPDATE sede SET sed_id = ? WHERE sed_id = ?";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($Estado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Desactivado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    }

?>
