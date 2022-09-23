<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$sql = "SELECT * FROM tb_usuario;";
$result = mysqli_query($objConexion, $sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>hola</title>
   <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/main.css">
                <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
                  <script src="js/dataTables.bootstrap.min.js" ></script>
<!--                <script src="js/jquery-3.6.0.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>-->
	<script src="js/jquery.dataTables.min.js" ></script>
  
    </head>
    
    <script>
   $(document).ready(function() {    
    $('#tablaListar').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});
    </script>
    <body>
        <div class="">
        <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width:100%;">
            <!--<div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1321.17px; padding-right: 0px;">-->
                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%;">
       
        
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr >
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha</th>
                 <th>Tipo_usuario</th>
                <th>Estado</th>
                <th>Opc</th>
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha</th>
                 <th>Tipo_usuario</th>
                <th>Estado</th>
                <th>Opc</th>
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = $result->fetch_assoc()) { 
                                            
                                            if($fila['estado'] == '1'){
                                                 $estado = "ACTIVO";
                                                    $class = "success";
                                            }elseif ($fila['estado'] == '0') {
        
    
                                                    $estado = "INACTIVO";
                                                      $class = "warning";    
                                                    } else {
                                                        $estado = "FINALIZO";
                                                      $class = "info";
                                                    }
                                                     
                     
                                            
                                            
                                            ?>
                                                       
						<tr>
							<td><?php echo $fila['id_usuario']; ?></td>
							<td><?php echo $fila['nombre']; ?></td>
							<td><?php echo $fila['correo']; ?></td>
                                                        <td><?php echo $fila['fecha']; ?></td>
                                                         <?php
                                                              $idcanton=$fila['id_tipo_usuario'];
                                                             $sqlCanton="select * from tb_tipo_usuario where id_tipo_usuario=$idcanton;";
                                                                $resultCanton= mysqli_query($objConexion, $sqlCanton);
                                                                    $CantonArray= mysqli_fetch_array($resultCanton);
                                                                    $NombreCanton=$CantonArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $NombreCanton?></td>
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
							<td> <a  class='btn btn-info' title='Editar Usuario' onclick="editarUsuario(<?php echo $fila['id_usuario']?>)"><i class="glyphicon glyphicon-edit"></i></a>
                <a  class='btn btn-danger' title='Eliminar Usuario' onclick="eliminarUsuario(<?php echo $fila['id_usuario']?>)"><i class="glyphicon glyphicon-trash"></i></a>
                                                       
                                                         <a  class='btn btn-primary' title='Cambiar Clave' onclick="cambiarclave(<?php echo $fila['id_usuario']?>)"><i class="glyphicon glyphicon-cog"></i></a>
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
         </div>
        </div>
        </div>
       
    </body>
</html>
