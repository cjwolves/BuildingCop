<?php

include_once  '../modelos/ConBdMysql.php';

class TipoDocumentoDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM tipo_documento;";

        $registroTipoDocumento = $this->conexion->prepare($planconsulta);
        $registroTipoDocumento->execute();

        $listadoRegistrosTipoDocumento = array();

        while( $registro = $registroTipoDocumento->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosTipoDocumento[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosTipoDocumento;
    }

    public function seleccionarID($sId){

        $consulta="select * FROM tipo_documento WHERE tip_id=?";

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
            
            $consulta="INSERT INTO tipo_documento (tip_id, tip_estado, tip_created_at, tip_aud_estado,tip_nombre_documento, tip_sigla, tip_updated_at, tip_UsuSesion) VALUES (:tip_id, tip_estado, tip_created_at, tip_aud_estado,tip_nombre_documento, tip_sigla, tip_updated_at, tip_UsuSesion);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":tip_id", $registro['tip_id']);
            $insertar -> bindParam(":tip_nombre_documento,", $registro['tip_nombre_documento']);
            $insertar -> bindParam(":tip_sigla,", $registro['tip_sigla']);
            
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

            $tipo_documento = $registro[0]['tipo_documento'];
            $tip_id = $registro[0]['tip_id'];
            
            if(isset($tip_id)){
                $consulta = "UPDATE tipo_documento SET tipo_documento = ?
                WHERE tip_id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($tipo_documento, $tip_id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM tipo_documento WHERE tip_id = :tip_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':tip_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE tipo_documento SET tip_aud_estado = ? WHERE tip_id = ?";
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
                $actualizar = "UPDATE tipo_documento SET tip_id = ? WHERE tip_id = ?";
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