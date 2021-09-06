<?php

include_once PATH . 'modelos/ConBdMysql.php';

class ConstructoraDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM constructora;";

        $registroConstructora = $this->conexion->prepare($planconsulta);
        $registroConstructora->execute();

        $listadoRegistrosConstructora = array();

        while( $registro = $registroConstructora->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosConstructora[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosConstructora;
    }

    public function seleccionarID($sId){

        $consulta="SELECT * FROM constructora WHERE con_id=?";

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

        /* la base de datos esta mal diseñada el id tipo documento que llega como foranea no puede ser unique y eliminar los estados de sobra y dejarlos que no sean unique y que todas las foraneas no sean unique*/

        try {
            
            $consulta="INSERT INTO constructora (con_id, con_nombre_empresa, con_id_tipo_documento, con_numero_documento, usuario_s_usuId) VALUES (:con_id, :con_nombre_empresa, :con_id_tipo_documento, :con_numero_documento, :usuario_s_usuId);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":con_id", $registro['con_id']);
            $insertar -> bindParam(":con_nombre_empresa", $registro['con_nombre_empresa']);
            $insertar -> bindParam(":con_id_tipo_documento", $registro['con_id_tipo_documento']);
            $insertar -> bindParam(":con_numero_documento", $registro['con_numero_documento']);
            $insertar -> bindParam(":usuario_s_usuId", $registro['usuario_s_usuId']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $nombreEmpresa = $registro[0]['con_nombre_empresa'];
            $tipoDocumento = $registro[0]['con_id_tipo_documento'];
            $numeroDocumento = $registro[0]['con_numero_documento'];
            $usuario = $registro[0]['usuario_s_usuId'];
            $con_id = $registro[0]['con_id'];
            
            if(isset($con_id)){
                $consulta = "UPDATE constructora SET  con_nombre_empresa = ?, con_id_tipo_documento = ?, con_numero_documento = ?, usuario_s_usuId = ?
                WHERE con_id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($con_id, $usuario, $numeroDocumento, $tipoDocumento, $nombreEmpresa));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM constructora WHERE con_id = :con_id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':con_id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE constructora SET con_autEstado = ? WHERE con_id = ?";
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
                $actualizar = "UPDATE constructora SET con_autEstado = ? WHERE con_id = ?";
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