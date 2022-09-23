<?php
//validación de que la sesión esté activa
//if(session_id()==""){
//    session_start();
//   
//   
//}
////limpiamos el array de la variable de ssesion. 
//$_SESSION = array();
//// permite destruir la sesión activa
//// session_destroy();
?>


<title > Inicio</title>
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet">

       <?php 
       include 'navg.php';
      session_start();
          $idUsuario=$_SESSION['idusuario_S'];
           $idrolUsuario=$_SESSION['idRolUsuario_S'];
           if($idUsuario==''){
               //echo "Usted no ha iniciado sesión correctamente";
              header('Location: index.php');
              exit();  
            
          }
            
            
       ?>

    <nav class="navbar navbar-default " role="navigation">
<!--        <div class="form-footer" style="background: #1C2833; font-size: 20px; color: white;align-self: center">
    <h7 >Ecomedi</h7>
    
  
</div-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
<!--                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                 <span class="icon-bar"></span>-->
            </button>
             <strong>
            <a class="navbar-brand" href="inicio.php" ">Practicas-Pre-Pro|</a>
            </strong>
 </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            
                 <?php 
                 if($idrolUsuario==1){
                  if($idrolUsuario==2 || $idrolUsuario==3){
                      
                       header('Location: acceso.php');
                }
                  
                 
                 
                 ?>
                
                <strong> <ul class="nav navbar-nav ">
                        
                <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-lock"></i> Usuarios <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
        <li><a href="usuario.php" ><i class="glyphicon glyphicon-lock"></i> Gestión Usuarios</a></li>
        </ul>
      </li>     
               <!--<li><a href="usuario.php" ><i class="glyphicon glyphicon-lock"></i> Gestión Usuarios</a></li>-->
               <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"></i> Estudiante <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
         <li><a href="estudiantes.php" ><i class='glyphicon glyphicon-user' ></i> Gestión Estudiantes </a></li>
       
        </ul>
      </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"> </i> Docente <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="docente.php" ><i class='glyphicon glyphicon-user' ></i> Gestión Docentes </a></li>
        </ul>
      </li>
              
               
               <!--<li><a href="docente.php" "><i class='glyphicon glyphicon-user' ></i> Gestión Docentes</a></li>-->
            <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-list-alt"> </i>  Asignacion <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="asignacion.php" ><i class='glyphicon glyphicon-list-alt' ></i> Gestión Asignacion </a></li>
        </ul>
      </li>   
      <!--<li><a href="asignacion.php" "><i class='glyphicon glyphicon-list-alt'></i> Asignacion </a></li>-->
               
               <li><a href="documen.php" "> <i class='glyphicon glyphicon-list'></i> Documentos</a></li>
               <li><a href="Calendario.php" "> <i class='glyphicon glyphicon-calendar'></i> Calendario</a></li>
               
               <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-lock"> </i>  <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="salir.php" ><i class='glyphicon glyphicon-off' ></i> Salir </a></li>
        </ul>
      </li>
              
                        <!--<li><a href="salir.php" style="color: black;"><i class='glyphicon glyphicon-off '></i>  Salir </a></li>-->
                        
                    
             
            </ul>
                    
                    
            </strong> 
       <?php
       }
            ?>
            
            
             <?php 
                 if($idrolUsuario==2){
                     
                 
                 
                 ?>
            <strong> <ul class="nav navbar-nav ">
                     
                  
        <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"> </i> Docente <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="docente.php" ><i class='glyphicon glyphicon-user' ></i> Gestión Docentes </a></li>
        </ul>
      </li>
              
               
             
               <li><a href="documen.php" "> <i class='glyphicon glyphicon-list'></i> Documentos</a></li>
               <li><a href="Calendario.php" "> <i class='glyphicon glyphicon-calendar'></i> Calendario</a></li>
               
               <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-lock"> </i>  <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="salir.php" ><i class='glyphicon glyphicon-off' ></i> Salir </a></li>
        </ul>
      </li>
              
                        <!--<li><a href="salir.php" style="color: black;"><i class='glyphicon glyphicon-off '></i>  Salir </a></li>-->
                        
                    
             
            </ul>
           
                    
                   
            </strong> 
           <?php
                 }
            ?>
            
            <?php 
            if($idrolUsuario==3){
                
           
            
            ?>
            
           <strong> <ul class="nav navbar-nav ">
                   
                    <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-user"> </i> Estudiante <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="estudiantes.php" ><i class='glyphicon glyphicon-user' ></i> Gestión Estudiantes </a></li>
        </ul>
      </li>
              
               
             
               <li><a href="documen.php" "> <i class='glyphicon glyphicon-list'></i> Documentos</a></li>
               <li><a href="Calendario.php" "> <i class='glyphicon glyphicon-calendar'></i> Calendario</a></li>
               
               <li class="dropdown">
        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
            <i class="glyphicon glyphicon-lock"> </i>  <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
            <li><a href="salir.php" ><i class='glyphicon glyphicon-off' ></i> Salir </a></li>
        </ul>
      </li>
              
               </ul>
            </strong>  
            
            
            
            
            
            
            <?php 
            
             }
            ?>
        </div>


    </nav>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>