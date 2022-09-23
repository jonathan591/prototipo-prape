<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$sql = "SELECT * FROM tb_estudiantes;";
$result = mysqli_query($objConexion, $sql);

session_start();
 $idrolUsuario=$_SESSION['idRolUsuario_S'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>hola</title>
   <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
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
<!--         <div class="row">
        --><div class="col-sm-12">
            <!--<div class="dataTables_scroll">-->
            
        <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width:100%;">
            <!--<div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1321.17px; padding-right: 0px;">-->
                <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%;">
        <table id="tablaListar" class="table table-striped table-bordered dataTable" style="width:100%" cellspacing="0" role="grid" aria-describedby="tablaListar_info">
        <thead>
            <tr >
               
                <th >Nombres Apellidos</th>
                <th>Cedula</th>
                 <th>N.Celular</th>
                <th>Correo</th>
                <th>Carrera</th>
                 <th> Periodo </th>
                  <th>Paralelo</th>
                   <th>Jornada</th>
                    <th>Direccion</th>
                     <!--<th>fecha</th>-->
                      <th>Estado</th>
                       <th>Opciones</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        
        
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
							
							<td><?php echo $fila['nombres_apellidos']; ?></td>
							
                                                        <td><?php echo $fila['cedula']; ?></td>
                                                        <td><?php echo $fila['telefono']; ?></td>
                                                        <td><?php echo $fila['correo']; ?></td>
                                                        <?php
                                                              $idcarreras=$fila['id_carreras'];
                                                             $sqlCarreras="select * from tb_carreras where id_carreras=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionCarreras?></td>
                                                        
                                                         <?php
                                                              $idcursos=$fila['id_cursos'];
                                                             $sqlCursos="select * from tb_cursos where id_cursos=$idcursos;";
                                                                $resultCursos= mysqli_query($objConexion, $sqlCursos);
                                                                    $CursosArray= mysqli_fetch_array($resultCursos);
                                                                    $DescripcionCursos=$CursosArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionCursos?></td>
                                                                    
                                                         <?php
                                                              $idparalelos=$fila['id_paralelos'];
                                                             $sqlParalelos="select * from tb_paralelos where id_paralelos=$idparalelos;";
                                                                $resultParalelos= mysqli_query($objConexion, $sqlParalelos);
                                                                    $ParalelosArray= mysqli_fetch_array($resultParalelos);
                                                                    $DescripcionParalelos=$ParalelosArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionParalelos?></td> 
                                                                    
                                                           <?php
                                                              $idjornadas=$fila['id_jornadas'];
                                                             $sqlJornadas="select * from tb_jornadas where id_jornadas=$idjornadas;";
                                                                $resultJornadas= mysqli_query($objConexion, $sqlJornadas);
                                                                    $JornadasArray= mysqli_fetch_array($resultJornadas);
                                                                    $DescripcionJornadas=$JornadasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionJornadas?></td>          
                                                                    
                                                         <td><?php echo $fila['direccion']; ?></td>
                                                        <!--<td><?php echo $fila['fecha_registro']; ?></td>-->
                                                        
                                                       
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
							
                                                        <td> <a  class='btn btn-info' title='Editar Estudiante' onclick="editarEstudiante(<?php echo $fila['id_estudiantes']?>)"><i class="glyphicon glyphicon-edit"></i></a>
                                                            <?php 
                                                            if($idrolUsuario==1){
                                                            ?>
                <a  class='btn btn-danger' title='Eliminar Estudiante' onclick="eliminarEstudiante(<?php echo $fila['id_estudiantes']?>)"><i class="glyphicon glyphicon-trash"></i></a>
                                                       
                                                            <?php }?>     
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
                                <tfoot>
            <tr>
              
                <th>Nombres Apellidos</th>
                <th>Cedula</th>
                 <th>N.Celular</th>
                <th>Correo</th>
                <th>Carrera</th>
                 <th> Periodo </th>
                  <th>Paralelo</th>
                   <th>Jornada</th>
                    <th>Direccion</th>
                     <!--<th>fecha</th>-->
                      <th>Estado</th>
                       <th>Opciones</th>
<!--                <th>Salary</th>-->
            </tr>
        </tfoot>
        
    </table>
                     </div>
        
        </div>
            <!--</div>-->
            </div>
<!--             </div>
             </div>-->
    </body>
</html>


