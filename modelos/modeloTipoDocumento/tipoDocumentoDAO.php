<?php

include_once PATH . 'modelos/ConBdMysql.php';

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

        $consulta="SELECT * FROM Tipo_documento WHERE tip_id=?";

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
            
            $consulta="INSERT INTO tipo_documento (tipId, usuLogin, usuPassword, usuEstado) VALUES (:tipiId, :usuLogin, :usuPassword, :usuEstado);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":tipId", $registro['tipId']);
            $insertar -> bindParam(":usuLogin", $registro['usuLogin']);
            $insertar -> bindParam(":usuPassword", $registro['usuPassword']);
            $insertar -> bindParam(":usuEstado", $registro['usuEstado']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $login = $registro[0]['usuLogin'];
            $password = $registro[0]['usuPassword'];
            $tipId = $registro[0]['tip_Id'];
            
            if(isset($tip_Id)){
                $consulta = "UPDATE tipo_documento SET  usuLogin = ?, usuPassword = ?
                WHERE tip_Id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($login, $password, $tip_Id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Registro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM tipo_documento WHERE tip_Id = :tip_Id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':tip_Id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE tipo_documento SET usuEstado = ? WHERE tip_Id = ?";
                $actualizar = $this->conexsion->prepare($actualizar);
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
                $actualizar = "UPDATE tipo_documento SET usuEstado = ? WHERE tip_Id = ?";
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
