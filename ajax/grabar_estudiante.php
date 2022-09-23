<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$NombresApellidos=$_POST['Nombres_Apellidos_txt'];
$Cedula=$_POST['Cedula_txt'];
$Telefono=$_POST['Telefono_txt'];
$Correo=$_POST['Correo_txt'];
$Carreras=$_POST['Carreras_txt'];
$Cursos=$_POST['Cursos_txt'];
$Paralelos=$_POST['Paralelos_txt'];
$Jornadas=$_POST['Jornadas_txt'];
$Direccion=$_POST['Direccion_txt'];
$Fecha_registro=date('Y-m-d');
$Estado=$_POST['Estado_txt'];



//insert
if($id==0){
    $sql="insert into tb_estudiantes(nombres_apellidos,cedula,telefono,correo,id_carreras,id_cursos,id_paralelos,id_jornadas,direccion,fecha_registro,estado) values('$NombresApellidos','$Cedula','$Telefono','$Correo','$Carreras','$Cursos','$Paralelos','$Jornadas','$Direccion','$Fecha_registro','$Estado');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_estudiantes where id_estudiantes=$id_p";
    }else{
    if($id>0){
        $sql="update tb_estudiantes set nombres_apellidos='$NombresApellidos', cedula='$Cedula',correo='$Correo', id_carreras='$Carreras',id_cursos='$Cursos',id_paralelos='$Paralelos',id_jornadas='$Jornadas',direccion='$Direccion',fecha_registro='$Fecha_registro',estado='$Estado' where id_estudiantes=$id";
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
