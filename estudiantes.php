<html>
    <head>
        <title>Estudiantes</title>
        <?php
         include 'navg.php';
         include 'cargandop.php';
            include 'head.php';
            session_start();
            $idrolUsuario=$_SESSION['idRolUsuario_S'];
            require_once ("./conf/confconexion.php");
        ?>
    </head>
    <body  >
        <div class="container" >

            <div class="panel panel-info " >
                <div class="panel-heading " style="background: #bce9e9">
                   <?php 
                   if($idrolUsuario==1|| $idrolUsuario==2){
                       
                   
                   ?>
                     <div class="btn-group pull-right">
                                <button type='button' class="btn btn-info" data-toggle="modal" onclick="ImprimirEstudiante();" style="background: #e91818"><span class="glyphicon glyphicon-print"></span> Imprimir Reporte</button>
                            </div>
                    <div class="btn-group pull-right">
                        <label for="Correo" class="col-sm-3 control-label"> </label>
                        <div class="col-sm-8">
                         <select class="form-control" id="carreras" name="Carreras_camd" required>
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
<!--                      <div class="btn-group pull-right">
                         <label for="estado" class="col-sm-3 control-label"></label>
                        <div class="col-sm-8">
                         <select class="form-control" id="estado" name="Estado_cnd" required>
                           
                             <option value="1" >Activo</option>
                             <option value="0" >Inactivo</option>
                             <option value="2">Finalizo</option>
                              
                            
                               
                             
                             
                      
                          </select>
                        </div>
                    </div>-->
                    <div class="btn-group pull-right">
                                <button type='button' class="btn btn-info" data-toggle="modal" onclick="ReporteExcel();" style="background: #23bd19"><span class="glyphicon glyphicon-download"></span> Descargar Excel</button>
                            </div>
                    <?php }?>
                    <div class="btn-group pull-left">
                        
                      <button type='button' class="btn btn-info" data-toggle="modal" onclick="NuevoEstudiante();" style="background: #42a8e3e0"><span class="glyphicon glyphicon-plus"></span> Agregar Estudiante </button>
                    </div>
                     
                     
                    <h4 style="color: #bce9e9"><i class='glyphicon glyphicon-search'></i> </h4>
                </div>
                <div class="panel-body">
                    <div id="resultados"></div><!-- Carga los datos ajax -->
                    <div id='presentarTabla'></div><!-- Carga los datos ajax -->
                </div>
            </div>
        </div>
        <div id="show"></div>
    </body>
    <footer>
        <?php
            include 'fooder.php';
        ?>
    </footer>
</html> 
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript" src="js/ajaxconfig.js"></script> 
<script>
$(document).ready(function(){
    listar('ajax/listar_estudiante.php');
    //prueba();
});
function listar(url){
    $.ajax({
      type: 'POST',
      url:url,
      success:function(data){
          $('#presentarTabla').html(data);
      },
   });
}
function ReporteExcel(){
   location.href='exportarExcel.php';
}
function NuevoEstudiante(){
    MostrarModal(0, 'modal/nuevo_estudiante.php');
}
function eliminarEstudiante(id){
  Swal.fire({
  title: '¿Está seguro de eliminar el registro?',
  text: "   ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
        $.ajax({
            type:'POST',
            url:'ajax/grabar_estudiante.php',
            data:{
                id_p:id,
                mensaje:'eliminar'
            },
            success: function(data){
                $('#resultados').html(data);
                listar('ajax/listar_estudiante.php');
            }
        });
    }
})
}
function editarEstudiante(id){
    //alert(id);
    MostrarModal(id, 'modal/nuevo_estudiante.php');
}
function MostrarModal(id, url){
    $.ajax({
        type: 'POST',
        url: url,
        data:{
            id_p:id
        },
        success: function (data) {          
           $('#show').html(data);  
           $('#MyModal').modal();
        }
    });
}
function cambiarclave(id){
    //alert(id);
    MostrarModal(id, 'modal/cambiar_clave.php');
}
function MostrarModal(id, url){
    $.ajax({
        type: 'POST',
        url: url,
        data:{
            id_p:id
        },
        success: function (data) {          
           $('#show').html(data);  
           $('#MyModal').modal();
        }
    });
}

function ImprimirEstudiante(){
    var idcarrera=$('#carreras').val();
    var parametro='reporte_estudiante';
    VentanaCentrada('./pdf/documentos/reporteestudiante.php?id_carrera='+idcarrera+'prueba_p='+parametro,'Reporte_Estudiante','','1024','768','true');
}
</script>




