<html>
    <head>
        <title>Usuarios</title>
        <?php
         include 'navg.php';
         include 'cargandop.php';
            include 'head.php';
           // session_start();
            //$idrolUsuario=$_SESSION['idRolUsuario_S'];
        ?>
    </head>
    <body   >
        <div class="container" >
           
            <div class="panel panel-default " >
                <div class="panel-heading " style="background: #bce9e9">
                   
<!--                     <div class="btn-group pull-right">
                                <button type='button' class="btn btn-info" data-toggle="modal" onclick="ImprimirUsuario();" style="background: #e91818"><span class="glyphicon glyphicon-print"></span> PDF</button>
                            </div>-->
                    <div class="btn-group pull-left">
                        
                      <button type='button' class="btn btn-info" data-toggle="modal" onclick="NuevoUsuario();" style="background: #42a8e3e0"><span class="glyphicon glyphicon-plus"></span> Agregar Usuario </button>
                    </div>
<!--                     <div class="btn-group pull-right">
                                <button type='button' class="btn btn-info" data-toggle="modal" onclick="ReporteExcel();" style="background: #23bd19"><span class="glyphicon glyphicon-download"></span> Excel</button>
                            </div>-->
                     
                    <h4 style="color: #bce9e9"><i class='glyphicon glyphicon-search'></i> </h4>
                </div>
                <div class="panel-body  ">
                    <div id="resultados"></div> 
                    <div id='presentarTabla'></div>  
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
    listar('ajax/listar_usuario.php');
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
function NuevoUsuario(){
    MostrarModal(0, 'modal/nuevo_usuario.php');
}
function eliminarUsuario(id){
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
            url:'ajax/grabar_usuario.php',
            data:{
                id_p:id,
                mensaje:'eliminar'
            },
            success: function(data){
                $('#resultados').html(data);
                listar('ajax/listar_usuario.php');
            }
        });
    }
})
}
function editarUsuario(id){
    //alert(id);
    MostrarModal(id, 'modal/nuevo_usuario.php');
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

function ImprimirUsuario(){
//    var idCanton=$('#canton').val();
    var parametro="Hola";
    VentanaCentrada('./pdf/documentos/reporteusuario.php?prueba_p='+parametro,'Reporte_Usuario','','1024','768','true');
}
</script>
<!--<script>

 
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
    Swal.fire(
      'Eliminado!',
      'eliminado existosamente .',
      'success'
    )
  }
})
</script>-->

