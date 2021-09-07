<?php

include_once PATH . 'modelos/ConBdMysql.php';

class SedeDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM sede;";

        $registroSede = $this->conexion->prepare($planconsulta);
        $registroSede ->execute();

        $listadoRegistrosSede = array();

        while( $registro = $registroSede->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosSede[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosSede;
    }

    public function seleccionarID($sId){

        $consulta="SELECT * FROM sede WHERE sed_id=?";

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
            
            $consulta="INSERT INTO sede (sedId, usuLogin, usuPassword, usuEstado) VALUES (:sedId, :usuLogin, :usuPassword, :usuEstado);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":sedId", $registro['sedId']);
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
            $ubiId = $registro[0]['sed_Id'];
            
            if(isset($uti_Id)){
                $consulta = "UPDATE sede SET  usuLogin = ?, usuPassword = ?
                WHERE sed_Id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($login, $password, $sed_Id));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Registro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM sede WHERE sed_Id = :sed_Id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':sed_Id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE sede SET usuEstado = ? WHERE sed_Id = ?";
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
                $actualizar = "UPDATE sede SET usuEstado = ? WHERE sed_Id = ?";
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
