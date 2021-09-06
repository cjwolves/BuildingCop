<?php

include_once PATH . 'modelos/ConBdMysql.php';

class RolDAO extends ConBdMySql{
    public function __construct($servidor, $base, $loginDB, $passwordDB){
        parent::__construct($servidor, $base, $loginDB, $passwordDB);  
    }
    
    public function seleccionarTodos(){
        $planconsulta = "SELECT * FROM rol;";

        $registroRol = $this->conexion->prepare($planconsulta);
        $registroRol->execute();

        $listadoRegistrosRol = array();

        while( $registro = $registroRol->fetch(PDO::FETCH_OBJ)){
            $listadoRegistrosRol[]=$registro;
        }
          $this->cierreBd();
          return $listadoRegistrosRol;
    }

    public function seleccionarID($sId){

        $consulta="select * FROM rol WHERE rol_id_rol=?";

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
            
            $consulta="INSERT INTO rol (rol_id_rol, rol_tipo_rol) VALUES (:rol_id_rol, :rol_tipo_rol);" ;

            $insertar=$this->conexion->prepare($consulta);

            $insertar -> bindParam(":rol_id_rol", $registro['rol_id_rol']);
            $insertar -> bindParam(":rol_tipo_rol", $registro['rol_tipo_rol']);

            $insercion = $insertar->execute();

            $clavePrimaria = $this->conexion->lastInsertId();

            return ['Inserto'=>1,'resultado'=>$clavePrimaria];

        } catch (PDOException $pdoExc) {
            return ['Inserto'=>0,$pdoExc->errorInfo[2]];
        }

    }

    public function actualizar($registro){

        try {

            $tipoRol = $registro[0]['rol_tipo_rol'];
            $rol_id_rol = $registro[0]['rol_id_rol'];
            
            if(isset($rol_id_rol)){
                $consulta = "UPDATE rol SET  rol_tipo_rol = ?
                WHERE rol_id_rol = ?";
                
                $actualizar = $this -> conexion -> prepare($consulta);

                $actualizacion = $actualizar->execute(array($tipoRol, $rol_id_rol));

                $this->cierreBd();

                return ['actualizacion' => $actualizacion, 'mensaje' => 'Resgistro Actualizado'];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        
    }

    public function eliminar($sId = array()){

        $consulta = "DELETE FROM rol WHERE rol_id_rol = :rol_id_rol;";

        $eliminar = $this->conexion->prepare($consulta);
        $eliminar->bindParam(':rol_id_rol', $sId[0],PDO::PARAM_INT);
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
                $actualizar = "UPDATE rol SET rol_autEstado = ? WHERE rol_id_rol = ?";
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
                $actualizar = "UPDATE rol SET rol_autEstado = ? WHERE rol_id_rol = ?";
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