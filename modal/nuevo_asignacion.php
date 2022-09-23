<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo Asignacion";
     $color='#63F1B9';
}
if($id>0){
     $color='#63EBF1';
    $titulo="Editar Asignacion";
    $sql="select * from tb_asignacion where id_asignacion=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $docente=$usuarioA['id_docentes'];
            $estudiante=$usuarioA['id_estudiantes'];
             $Cedula=$usuarioA['cedula'];
             $jornada=$usuarioA['id_jornada2'];
             $Carrera=$usuarioA['id_carreras'];
             $direccion=$usuarioA['lugar_asignacion'];
             
             $fecha_regsi=$usuarioA['inicio_normal'];
              $fecha_final=$usuarioA['final_normal'];
            $Estado=$usuarioA['estado'];
            if($Estado=='1'){
                $seleccionaA="selected";
//                $seleccionaI="";
            }
              elseif($Estado=='0'){
                $seleccionaI="selected";
//                $seleccionaA="";
            }else{
                  $seleccionaF="selected";
            }
        }else{
            echo "No se encontró registro con el código: ".$id;
            exit();
        }
    }else{
        echo "Ocurrió un problema al momento de ejecutar la consulta".mysqli_error_list();
        exit();
    }
}
?>
<script>
$(document).ready(function(){
    // capturar el valor del id que se recibe
    $('#IdUsuario').val(<?php echo $id; ?>);
     $('#guardar_estudiante').bind("submit", function (){
        //alert(123);
       $.ajax({
           type: $(this).attr("method"),
           url:'ajax/grabar_asignacion.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_asignacion.php');
           }
       }); 
       return false;
    });
});

</script>
<html>
<div class="modal fade" id="MyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="background:<?php echo$color ?>;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><h4 class="modal-title" id="myModalLabel" style="color:#fff"><i class='glyphicon glyphicon-edit'></i> <?php echo $titulo; ?></h4></strong>
            </div>
           <div class="modal-body">
                <form  class="form-horizontal" method="post" id="guardar_estudiante" name="guardar_estudiante">
                    <div class="form-group">
                        <label for="Correo" class="col-sm-3 control-label"> Tutor Academico</label>
                        <div class="col-sm-8">
                         <select class="form-control" id="carreras" name="Docente_txt" required>
                             
                            <?php
                                $sql_do="select * from tb_docentes;";
                                $result_do= mysqli_query($objConexion, $sql_do);
                                while($docenteA=mysqli_fetch_array($result_do)){
                                    $DescripcionCa=$docenteA['nombre_apellidos'];
                                    $iddocente=$docenteA['id_docentes'];
                                    $seleccionaCarreras='';
                                    if($iddocente==$docente){
                                        $seleccionaCarreras='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $iddocente; ?>" <?php echo $seleccionaCarreras; ?>><?php echo $DescripcionCa; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="Jornadas" class="col-sm-3 control-label">Nombres de Estudiantes </label>
                       <div class="col-sm-8">
                           
                         <select class="form-control" id="estudiante" name="Nombres_Estudiantes_txt" >
                            
                            
                            
                           
                             
                             <?php
                            
                                $sql_jornadas="select * from tb_estudiantes;";
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['nombres_apellidos'];
                                    $idJornadas=$jornadasA['id_estudiantes'];
                                    $seleccionaJornadas='';
                                    if($idJornadas==$estudiante){
                                        $seleccionaJornadas='selected';
                                    }
                                    ?>
                              
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?>><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                                   
                          </select>
                           
                        </div>
                        
                        
      
               
                         </div>
                     
                     <div class="form-group">
                        <label for="Jornada" class="col-sm-3 control-label">Jornada</label>
                       <div class="col-sm-8">
                         <select class="form-control" id="jornadas" name="Jornadas_txt" required>
                            <?php
                                $sql_jornadas="select * from tb_jornada2;";
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['descripcion'];
                                    $idJornadas=$jornadasA['id_jornada2'];
                                    $seleccionaJornadas='';
                                    if($idJornadas==$jornada){
                                        $seleccionaJornadas='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?>><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="Correo" class="col-sm-3 control-label"> Carrera</label>
                        <div class="col-sm-8">
                         <select class="form-control" id="carreras" name="Carreras_txt" required>
                            <?php
                                $sql_carreras="select * from tb_carreras;";
                                $result_carreras= mysqli_query($objConexion, $sql_carreras);
                                while($carrerasA=mysqli_fetch_array($result_carreras)){
                                    $DescripcionCarreras=$carrerasA['descripcion'];
                                    $idCarreras=$carrerasA['id_carreras'];
                                    $seleccionaCarreras='';
                                    if($idCarreras==$Carrera){
                                        $seleccionaCarreras='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCarreras; ?>" <?php echo $seleccionaCarreras; ?>><?php echo $DescripcionCarreras; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                            
                 
                   
                     <div class="form-group">
                        <label for="Correo" class="col-sm-3 control-label"> Lugar Asignacion</label>
                        <div class="col-sm-8">
                            <input id="Nombres" name="Direccion_txt" class="form-control" value="<?php echo $direccion; ?>" />
                        </div>
                    </div>
                     <div class="form-group ">
                        <label for="fecha" class="col-sm-3 control-label"> Fecha Asignacion</label>
                        <div class="col-sm-8">
                            <input type="date" id="Nombres" name="fecha_txt" class="form-control" value="<?php echo $fecha_regsi; ?>" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="fecha" class="col-sm-3 control-label"> Fecha Final</label>
                        <div class="col-sm-8">
                            <input type="date" id="Nombres" name="fecha_final_txt" class="form-control" value="<?php echo $fecha_final; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo" class="col-sm-3 control-label">evento</label>
                        <div class="col-sm-8">
                         <select class="form-control" id="estado" name="class_txt" >
                            <option value="event-info">Informacion</option>
                        <option value="event-success">Exito</option>
                        <option value="event-important">Importantante</option>
                        <option value="event-warning">Advertencia</option>
                        <option value="event-special">Especial</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado" class="col-sm-3 control-label">Estado</label>
                        <div class="col-sm-8">
                         <select class="form-control" id="estado" name="Estado_txt" >
                             <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                             <option value="2" <?php echo $seleccionaF; ?>>Finalizo</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_estudiante"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar Datos</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>