<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$sql = "SELECT * FROM tb_asignacion;";
$result = mysqli_query($objConexion, $sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<title>hola</title>-->
   <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="css/dataTables.bootstrap.min.css"><!--
                <script src="js/jquery-3.6.0.min.js" ></script>-->
		<!--<script src="js/bootstrap.min.js" ></script>-->
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
                <div class="dataTables_scrollBody" style="position: var; overflow: auto; width: 100%;">      
        
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombres Docente</th>
               <th>Nombres estudiante</th>
                <!--<th>cedula</th>-->
                 <th>Jornada</th>
                <th>Carrera</th>
             
                    <th>Lugar Asignacion</th>
                 <th>Fecha inicio</th>
                      <th>Fecha final</th>
                      <th>Estado</th>
                       <th>Opciones</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
              <th>Nombres Docente</th>
               <th>Nombres estudiante</th>
                <!--<th>cedula</th>-->
                 <th>Jornada</th>
                <th>Carrera</th>
             
                    <th>Lugar Asignacion</th>
                     <th>Fecha inicio</th>
                      <th>Fecha final</th>
                      <th>Estado</th>
                       <th>Opciones</th>
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php  while ($fila = $result->fetch_assoc()) { 
                                            
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
                                                    <?php
                                                     $iddocente=$fila['id_docentes'];
                                                             $sqlJ="select * from tb_docentes where id_docentes=$iddocente;";
                                                                $resultJ= mysqli_query($objConexion, $sqlJ);
                                                                    $JsArray= mysqli_fetch_array($resultJ);
                                                                    $Descripcion=$JsArray['nombre_apellidos'];
                                                             
//                                                                         ?>
                                                           <td><?php echo $Descripcion?></td>
                                                    <?php
                                                              $idcarreras=$fila['id_estudiantes'];
                                                             $sqlCarreras="select * from tb_estudiantes where id_estudiantes=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['nombres_apellidos'];
                                                                         ?>
                                                           <td><?php echo $DescripcionCarreras?></td>
                                                        
                                                
                                                        <!--<td><?php echo $fila['cedula']; ?></td>-->
                                                        <?php
                                                              $idjornadas=$fila['id_jornada2'];
                                                             $sqlJornadas="select * from tb_jornada2 where id_jornada2=$idjornadas;";
                                                                $resultJornadas= mysqli_query($objConexion, $sqlJornadas);
                                                                    $JornadasArray= mysqli_fetch_array($resultJornadas);
                                                                    $DescripcionJornadas=$JornadasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionJornadas?></td>          
                                                            <?php
                                                              $idcarreras=$fila['id_carreras'];
                                                             $sqlCarreras="select * from tb_carreras where id_carreras=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionCarreras?></td>
                                                        
                                                        
                                                                 
                                                                    
                                                         <td><?php echo $fila['lugar_asignacion']; ?></td>
                                                        <td><?php echo $fila['inicio_normal']; ?></td>
                                                        <td><?php echo $fila['final_normal']; ?></td>
                                                        
                                                       
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
							<td> <a  class='btn btn-info' title='Editar Asignacion' onclick="editarAsignacion(<?php echo $fila['id_asignacion']?>)"><i class="glyphicon glyphicon-edit"></i></a>
                <a  class='btn btn-danger' title='Eliminar Asignacion' onclick="eliminarAsignacion(<?php echo $fila['id_asignacion']?>)"><i class="glyphicon glyphicon-trash"></i></a>
                                                       
                                                        
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



