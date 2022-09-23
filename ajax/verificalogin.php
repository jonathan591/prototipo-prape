<?php
// conexion SERVIDOR - BD
require_once '../conf/confconexion.php';
if($estadoconexion==0){
   
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
// recibo usuario y clave
$usuario=$_POST['usuario_p'];
$clave=$_POST['clave_p'];
$pass= md5($clave);

//consulta a la BD
$sql="Select * from tb_usuario where nombre='$usuario' and clave='$pass'";
// ejecuto la consulta
$resultado= mysqli_query($objConexion, $sql);
// verificar usuario
$registro= mysqli_num_rows($resultado);
if($registro==0){
    ?>

<script>
    Swal.fire({
  icon: 'error',
  title: 'Usuario ó Contraseña Incorrecta. Favor Intete de Nuevo',
  text: '',
  footer: ''
})
</script>
<?php
//    echo "<div class='alert alert-danger' role='alert'>Usuario ó Contraseña Incorrecta. Favor Intete de Nuevo</div>";
}else{
    //echo "<div class='alert alert-success' role='alert'>Usuario Logeado correctamente</div>";
    echo "1";
    //capturar el usuario q entra al sistema
    //SESIONES => SESSION_START => $_SESSION => CAPTURAR USUARIO (PARAMETRO)
    $usuarioArray= mysqli_fetch_array($resultado);
    session_start();
    $_SESSION['idusuario_S']=$usuarioArray['id_usuario'];
    $_SESSION['nombreUsuario_S']=$usuarioArray['nombre'];
    $_SESSION['idRolUsuario_S']=$usuarioArray['id_tipo_usuario'];
    
    //$xxxx=$_SESSION['idusuario_S'];
    
}