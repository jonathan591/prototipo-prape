
<?php 
require_once './conf/confconexion.php';
//session_start();

$NombresUsuario=$_SESSION['nombreUsuario_S'];
$idsesion=session_id();
$idrol=$_SESSION['idRolUsuario_S'];
$sql="select * from tb_tipo_usuario where id_tipo_usuario=$idrol";
$result= mysqli_query($objConexion, $sql);
$arrayRol= mysqli_fetch_array($result);
$NombreRol=$arrayRol['descripcion'];
    $frcha= date('Y');
?>

 
<div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid">
            <div class="navbar-text">
                <strong> <span class=""  text-align: center">
                   <i class="glyphicon glyphicon-user"></i> <?php echo $NombreRol."-".$NombresUsuario; ?></span></strong> 
            </div>
            
            <div class="container-fluid navbar-right">
            <div class="navbar-text">
                <strong> <span class=""  text-align: center">
                   <i ></i> <?php echo "Instituto Tecnológico Superior Juan Bautista Aguirre &copy;".$frcha; ?></span></strong> 
            </div>
        </div>
            
    
    
</div>
</div>
<!--    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>-->
    
    