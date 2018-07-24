<?php 
session_start();

include("conexion.php");



if(!$_SESSION)

{

  header("Location: index.html");
 
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PROYECTO GYM| PAGINA EN BLANCO</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="admintempate/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="admintempate/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="admintempate/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <a href="index.php" class="logo"><b>PROYECTO GYM</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="admintempate/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="admintempate/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Alexander Pierce</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="admintempate/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Alexander Pierce - Web Developer
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="admintempate/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
             <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>PANEL INICIO</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="homeAdmin.php"><i class="fa fa-circle-o"></i>INICIO</a></li>
                <li><a href="buscar_cliente.php"><i class="fa fa-circle-o"></i>BUSCAR CLIENTES</a></li>
              </ul>
            </li>
             <li>
              <a href="cliente.php">
                <i class="fa fa-users"></i> <span>CLIENTES</span> 
              </a>
            </li>
             <li>
              <a href="producto.php">
                <i class="fa fa-th"></i> <span>PRODUCTOS</span> <small class="label pull-right bg-green">10</small>
              </a>
            </li>
             <li>
              <a href="reportes.php">
                <i class="fa fa-table"></i> <span>REPORTES</span>
              </a>
            </li>
            <li>
              <a href="empleado.php">
                <i class="fa fa-user"></i> <span>EMPLEADO</span>
              </a>
            </li>
             <li>
              <a href="membrecia.php">
                <i class="fa fa-shopping-cart"></i> <span>MEMBRECIAS</span>
              </a>
            </li>
             <li>
              <a href="formulario.php">
                <i class="fa fa-folder"></i> <span>VENTAS</span></a>
            </li>
              <li>
              <a href="blanco.php">
                <i class="fa fa-circle"></i> <span>PAGINA EN BLANCO</span></a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Blank page
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
           
<table class="table">
        <tbody>
        <tr>
        <td ><b>Foto</b></td>
        <td ><b>Codigo Cliente</b></td>
        <td><b>Nombres</b></td>
        <td><b>Apellidos</b></td>
        <td><b>Direccion</b></td>
        <td><b>Tipo Membrecia</b></td>
        <td><b>Fecha del ultimo Pago</b></td>
        <td><b>Dias despues del ultimo Pago</b></td>
        <td><b>Dias Atrasados</b></td>
        
        </tr>

<?php

$codigo = $_GET['id'];
//echo $codigo;

$fecha_de_hoy=date('Y-m-d');

$resultado = $mysqli->query("SELECT  cliente.foto,menbre.id,cliente.codigo,cliente.nombres,cliente.apellidos,
cliente.direccion, menbre.tipo, max(menbre.fecha_pago) As 'fecha_pago', datediff('$fecha_de_hoy',
max(menbre.fecha_pago)) As 'dia_despues_del_ultimo_pago'
FROM menbre INNER JOIN cliente on cliente.codigo=menbre.codigo_c
WHERE cliente.codigo='$codigo'
GROUP BY menbre.codigo_c
ORDER by cliente.nombres ASC");




$resultado->data_seek(0);
while ($fila = $resultado->fetch_assoc())
 {
  $imagen=$fila['foto'];
   $dia=$fila['dia_despues_del_ultimo_pago'];
   $codigo=$fila['codigo'];
   $nombre=$fila['nombres'];
   $apellido=$fila['apellidos'];
   $direccion=$fila['direccion'];
   $tipo=$fila['tipo'];
   $fecha=$fila['fecha_pago'];
  
      ?>
            
        <tr>
         <td title="Un Click Para Ampliar y Dos Click Para Volver a tamano normal"> <img onClick="javascript:this.width=400;this.height=400" onDblClick="javascript:this.width=100;this.height=100" src="data:imagen/jmg;base64,<?php echo base64_encode($imagen);?>"  width="100"/></td>  
        <td align="center"><?php echo $codigo; ?></td>
        <td align="center"><?php echo $nombre; ?></td>
        <td align="center"><?php echo $apellido; ?></td>
        <td align="center"><?php echo $direccion; ?></td>
        <td align="center"><?php echo $tipo; ?></td>
        <td align="center"  bgcolor="#00CC99"><?php echo $fecha; ?></td>
        
        <td style="border-top-color:#000; background-color:#993" align="center"><b><?php echo $dia; ?></b></td>
        <td style="border-top-color:#000; background-color:#C03" align="center"><b>
         <?php


     if($dia<=0)
     {
       echo "Cliente al Dia" ; 
       }
     elseif($tipo=="Mensual")
     {
       echo $dia-30; 
       }
     elseif($tipo=="Quincenal")
     {
       echo $dia-15; 
       }
     elseif($tipo=="Semanal")
     {
       echo $dia-7; 
       }


      else{echo "NO";}
      ?>
         </b>
         </td>
         
        </tr>
        
        
       
        
        <?php
   
 }
 

?>
</tbody>
 </table>
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2018-2019 <a href="">PROYECTO GYM</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="admintempate/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="admintempate/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="admintempate/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='admintempate/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="admintempate/dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>