<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];

if($id>0){
    $titulo="Cambiar Clave";
       $color='#63EBF1';
        }else{
            echo "No se encontró registro con el código: ".$id;
            exit();
        
    
}
?>
<script>
$(document).ready(function(){
    // capturar el valor del id que se recibe
    $('#IdUsuario').val(<?php echo $id; ?>);
     $('#guardar_usuario').bind("submit", function (){
        //alert(123);
       $.ajax({
           type: $(this).attr("method"),
           url:'ajax/editar_clave.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_usuario.php');
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
            <div class="modal-header" style="background:<?php echo$color ?>;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel" style="color:#fff"><i class='glyphicon glyphicon-edit'></i> <?php echo $titulo; ?></h4>
            </div>
           <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
                   
                   
                 
                     <div class="form-group">
                        <label for="Edad" class="col-sm-3 control-label">clave</label>
                        <div class="col-sm-8">
                            <input id="EdadId" type="password" name="Clave_txt" class="form-control" value="<?php echo $clave; ?>" required/>
                        </div>
                    </div>
                
                    
                    
                 
                   
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_datos"><i class="glyphicon glyphicon-floppy-disk"></i> Cambiar clave</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>

