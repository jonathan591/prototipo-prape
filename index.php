<?php
if(session_id()==''){
    session_start();
}
//limpiamos el array de la variable de ssesion. 
$_SESSION = array();
// permite destruir la sesión activa
session_destroy();
?>
<html>
    <head>
        <title>Iniciar Session |</title>
        <?php include 'navg.php'; ?>
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
         <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
     </head>          
    
        
    <body  >
    <?php
    include 'cargandop.php'; 
    ?>
        <!--<div class="col-lg-5 col-lg-offset-6"></div>--> 
        <div class="container">
            <div class="login-form ">
                <div class="form-header ">
                    <img src="img/logoo.png" class="img-responsive">
                </div>
                <form class="form-signin">
                    <i class='glyphicon glyphicon-user'></i> <strong> Usuario</strong>  <input class="form-control" type="text" id="UsuarioTxt" name="Usuario">
                    <i class='glyphicon glyphicon-lock'></i>  <strong>Contraseña</strong><input class="form-control" type="password" id="claveTxt" name="clave">
<!--                    <a class="glyphicon glyphicon-user" href="index.php">Olvidé Contraseña</a>-->
                </form>
                <div class="form-footer">
                    <button id="ingresarBtn" name="Ingresar" class="btn btn-block bt-login" onclick="login()"> <i class="glyphicon glyphicon-log-in"></i>  Iniciar Session</button>
                </div>
                <div id="mensaje"></div>
                
            </div>
        </div>
    </body>
</html>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function login(){
        var usuario=$('#UsuarioTxt').val();
        var clave=$('#claveTxt').val();
        $.ajax({
            type:'POST',
            url:'ajax/verificalogin.php',
            data: ({
                usuario_p: usuario,
                clave_p: clave
            }),
            success: function(data){
                if(data==1){
                    window.location='inicio.php';
                }else{
                    $('#mensaje').html(data);
                }
                
            }
        });
    }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>