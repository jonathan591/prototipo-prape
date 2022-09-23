<?php

require '../conf/confconexion.php';
//require '../functions/funciones.php';
function _formatear($fecha)
{
	return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
}
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$NombresApellidos=$_POST['Nombres_Estudiantes_txt'];
$docenteq=$_POST['Docente_txt'];
$idjornada=$_POST['Jornadas_txt'];

$Carreras=$_POST['Carreras_txt'];

$Direccion=$_POST['Direccion_txt'];
$Fecha_registro=$_POST['fecha_txt'];
$fecha_final2=$_POST['fecha_final_txt'];
$evento=$_POST['class_txt'];
$Estado=$_POST['Estado_txt'];
$inicio = _formatear($Fecha_registro);
 $fin = _formatear($fecha_final2);



//insert
if($id==0){
    $sql="insert into tb_asignacion(id_docentes,id_estudiantes,id_jornada2,id_carreras,lugar_asignacion,inicio_normal,final_normal,class,start,end,estado) values('$docenteq','$NombresApellidos','$idjornada','$Carreras','$Direccion','$Fecha_registro','$fecha_final2','$evento','$inicio','$fin','$Estado');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_asignacion where id_asignacion=$id_p";
    }else{
    if($id>0){
        $sql="update tb_asignacion set id_docentes='$docenteq', id_estudiantes='$NombresApellidos',id_jornada2='$idjornada', id_carreras='$Carreras',lugar_asignacion='$Direccion',inicio_normal='$Fecha_registro',final_normal='$fecha_final2',class='$evento',estado='$Estado' where id_asignacion=$id";
    }
}
//ejecuto
$result=mysqli_query($objConexion,$sql);

if($result){
    if($mensaje=='eliminar'){
       ?> 
<script>
Swal.fire(
      'Eliminado!',
      'eliminado existosamente .',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Eliminado Correctamente</div>";
    }else{
        
       ?>
<script>
Swal.fire(
      'Registrado!',
      'Registro Guardado Correctamente.',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Guardado Correctamente</div>";
    }
}
else{
    echo "<div class='alert alert-danger' rol='alert'>Ocurrió un problema al momento de guardar. Favor intentar de nuevo</div>". mysqli_error();
}
