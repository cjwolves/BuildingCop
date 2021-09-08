<?php

include_once PATH . 'modelos/ConBdMysql.php';

class UbicacionDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM ubicacion;";

        $registroUbicacion = $this->conexion->prepare($planconsulta);
        $registroUbicacion->execute();

        $listadoRegistrosUbicacion = array();

        while( $registro = $registroUbicacion->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosUbicacion[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosUbicacion;
    }

    public function seleccionarID($sId){

        $consulta="SELECT * FROM ubicacion WHERE ubi_id=?";

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
            
            $consulta="INSERT INTO ubicacion (ubi_id, ubi_direccion, ubi_created_at, ubi_autEstado, ubi_updated_at, ubi_usuSesion) VALUES (:ubi_id, ubi_direccion, ubi_created_at, ubi_autEstado, ubi_updated_at, ubi_usuSesion);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":ubi_id", $registro['ubi_id']);
            $insertar -> bindParam(":ubi_direccion", $registro['ubi_direccion']);
            $insertar -> bindParam(":ubi_created_at", $registro['ubi_created_at']);
            $insertar -> bindParam(":ubi_autEstado", $registro['ubi_autEstado']);
            $insertar -> bindParam(":ubi_updated_at", $registro['ubi_updated_at']);
            $insertar -> bindParam(":ubi_usuSesion", $registro['ubi_usuSesion']);
            
            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $login = $registro[0]['ubi_direccion'];
            $password = $registro[0]['ubi_usuSesion'];
            $ubiId = $registro[0]['ubi_Id'];
            $login = $registro[0]['ubi_updated_at'];
            $password = $registro[0]['ubi_autEstado'];
            $ubiId = $registro[0]['ubi_created_at'];
            
            
            if(isset($ubi_Id)){
                $consulta = "UPDATE ubicacion SET  usuLogin = ?, usuPassword = ?
                WHERE ubi_Id = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($login, $password, $ubiId));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Registro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM ubicacion WHERE ubi_Id = :ubi_Id;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':ubi_Id', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE ubicacion SET usuEstado = ? WHERE ubi_Id = ?";
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
                $actualizar = "UPDATE ubicacion SET usuEstado = ? WHERE ubi_Id = ?";
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


