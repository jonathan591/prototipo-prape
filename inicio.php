<?php
//validación de que la sesión esté activa
$alert = '';
   session_start();
if(!empty($_SESSION['activa'])){
        header('location: head.php');
}
?>
<style>
    .navbar-nav.navbar-center {
        position: absolute;
        left: 50%;
        transform: translatex(-50%);
    }
</style>
<html>
    <head>
           <title>Inicio</title>
       <?php
        include 'navg.php';
       include 'cargandop.php';
        include "head.php";

     
    ?>
</head>

<body  >

    <div class="container ">
        
        
        
        <div class="panel panel-info ">
            <div class="panel-heading panel pagination-sm "  style="background: #bce9e9">
                <h4><i class="glyphicon glyphicon-home"></i> Bienvenid@</h4>
            </div>
            <div class="panel-body">
                <div align="center"><img src="img/pracprof.png" class=" img-responsive " style="width: 670px; height:330px"></div>     
            </div>
        </div>
<!--<center>

	<br>
		<br>
			<br>
				<br>
					<br>
                                       
                                        <center><a href="menu.php"><button style="background:#42cde336" class="btn btn panel-info"><font size="3" face="Arial Black" color="black">Usuarios</font><BR><BR><img src="./img/usere.png" width="200"></button>
                                                <a href="tipo_usuario.php"><button style="background:#42cde336" class="btn btn panel-info"><font size="3" face="Arial Black" color="black">Tipo Usuario</font><BR><BR><img src="./img/tipo_user.png" width="200"></button>
                                                    <a href="categoria.php"><button style="background:#42cde336" class="btn btn panel-info"><font size="3" face="Arial Black" color="black">Tipo Servicios </font><BR><BR><img src="./img/tecnico.png" width="200"></button>
                                                        <a href="articulo.php"><button style="background:#42cde336" class="btn btn panel-info"><font size="3" face="Arial Black" color="black">Productos</font><BR><BR><img src="./img/product.png" width="200"></button></center>
                

</center>	-->
</div>
    


 
    <div id="show"></div>
</body>

<footer>
   <?php include"fooder.php";?>
</footer>
</html>
