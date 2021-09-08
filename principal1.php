<?php
session_start();

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}

?>
<!DOCTYPE html>

<html>
    <head>
        <title>PROVISIONAL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
		 #provisional{
			 width: 80%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		 .gestion{
			 width: 80%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		 #contenido{
			 width: 80%;
			 border: black 3px solid;
			 margin-left: auto;
			 margin-right: auto;			 
		 }
		
        </style>
    </head>
    <body>
	
	<div id="provisional"> Interface Provisional
	 <div class="gestion">Menú Operaciones en Tabla rol
	 <br/>
	 <a href="Controlador.php?ruta=listarRol&pag=0">Listar rol </a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarRol">Agregar rol</a>   	 
	 </div>

	 <div class="gestion">Menú Operaciones en Tabla sede
	 <br/>
	 <a href="Controlador.php?ruta=listarSede&pag=0">listar sede </a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarSede">Agregar sede </a>   	 
	 </div>

	 <div class="gestion">Menú Operaciones en Tabla ubicacion
	 <br/>
	 <a href="Controlador.php?ruta=listarUbicacion&pag=0">Listar ubicacion</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarUbicacion">Agregar ubicacion</a>   	 
	 </div>

     <div class="gestion">Menú Operaciones en Tabla tipo_documento
	 <br/>
	 <a href="Controlador.php?ruta=listarTipo_documento&pag=0">Listar tipo_documento</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarTipo_documento">Agregar tipo_documento</a>   	 
	 </div>

     
     <div class="gestion">Menú Operaciones en Tabla constructora
	 <br/>
	 <a href="Controlador.php?ruta=listarConstructora&pag=0">Listar Constructora</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarConstructora">Agregar Constructora</a>   	 
	 </div>

	 <div class="gestion">Menú Operaciones en Tabla material_construccion
	 <br/>
	 <a href="Controlador.php?ruta=listarMaterial_construccion&pag=0">Listar material_construccion</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarInsertarMaterial_construccion">Agregar material_construccion</a>   	 
	 </div>

     <div class="gestion">Menú Operaciones en Tabla proyecto
	 <br/>
	 <a href="Controlador.php?ruta=listarProyecto&pag=0">Listar proyecto</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarProyecto">Agregar proyecto</a>   	 
	 </div>
      
	 <div class="gestion">Menú Operaciones en Tabla recibido
	 <br/>
	 <a href="Controlador.php?ruta=listarRecibido&pag=0">Listar recibido</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarRecibido">Agregar recibido</a>   	 
	 </div>

	 <div class="gestion">Menú Operaciones en Tabla registro
	 <br/>
	 <a href="Controlador.php?ruta=listarRegistro&pag=0">Listar registro</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarRegistro">Agregar registro</a>   	 
	 </div>
     
	 <div class="gestion">Menú Operaciones en Tabla stock
	 <br/>
	 <a href="Controlador.php?ruta=listarStock&pag=0">Listar stock</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarStock">Agregar stock</a>   	 
	 </div>

	 <div class="gestion">Menú Operaciones en Tabla trabajador 
	 <br/>
	 <a href="Controlador.php?ruta=listarTrabajador&pag=0">Listar trabajador</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarTrabajador">Agregar trabajador</a>   	 
	 </div>
     

	 <div class="gestion">Menú Operaciones en Tabla usuario_s 
	 <br/>
	 <a href="Controlador.php?ruta=listarUsuario_s&pag=0">Listar usuario_s</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarUsuario_s">Agregar usuario_s</a>   	 
	 </div>

	  
	 <div class="gestion">Menú Operaciones en Tabla utilizado
	 <br/>
	 <a href="Controlador.php?ruta=listarUtilizado&pag=0">Listar utilizado</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarUtilizado">Agregar utilizado</a>   	 
	 </div>
 
     <div class="gestion">Menú Operaciones en Tabla usuario_s_rol
	 <br/>
	 <a href="Controlador.php?ruta=listarUsuario_s_rol&pag=0">Listar usuario_s_rol</a>
     <br/>
     <a href="Controlador.php?ruta=mostrarUsuario_s_rol">Agregar usuario_s_rol</a>   	 
	 </div>







     <div id="contenido">

     



	 <br/>
                Zona de Resultados (Aquí la funcionalidad!!!!)
	 <br/>
	 <br/>
	 <?php
	 if(isset($_GET['contenido'])){
		 include($_GET['contenido']);
	 }
	 
	 
	 ?>
	</div>
	</div>

	
	
	
	
	</body>
</html>