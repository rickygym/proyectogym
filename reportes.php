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
            Reposrtes y Caja
            <small>Balances Generales de Hoy</small>
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
       

<div align="center">



<table border="1"  >



<tr>
<td colspan="3" width="40%" align="center" bgcolor="#CCCCCC" ><b>Ventas de hoy   <?php echo "  --->   "; echo date("d-m-Y H:i:s"); ?></b></td>
</tr>



<br />
<tr>
<?php
$fecha_de_hoy=date("Y-m-d");
$queriTotalMembre="SELECT SUM(menbre.precio) As 'total_del_dia' FROM menbre WHERE menbre.fecha_pago='".$fecha_de_hoy."' and menbre.id_e='".$_SESSION['id']."' "; 
$resultMembre=$mysqli->query($queriTotalMembre);
if($resultMembre->num_rows>=1){
while($row=$resultMembre->fetch_assoc())
{
  $total_membre=$row['total_del_dia'];
}
}
?>
<td>Total Venta de Membrecia : </td>
<td align="center"><?php echo "RD$ : ".$total_membre.".<b>00</b>"; ?></td>
<td align="center" ><a href="detalle_membrecia.php">Detalle</a></td>
</tr>




<?php
$fecha_de_hoy=date("Y-m-d");
$queriTotalMembre="SELECT SUM(venta.total) As 'total_producto' FROM venta WHERE venta.fecha LIKE '".$fecha_de_hoy."%' and venta.estado='finalizado' and venta.id_e='".$_SESSION['id']."' ";
$resultMembre=$mysqli->query($queriTotalMembre);
if($resultMembre->num_rows>=1){
while($row=$resultMembre->fetch_assoc())
{
  $total_producto=$row['total_producto'];
}
}
?>



<tr>
<td>Total Venta de Producto : </td>
<td align="center"><?php echo  "RD$ : ".$total_producto.".<b>00</b>"; ?></td>
<td align="center"><a  href="detalle_productos.php">Detalle</a></td>

</tr>




<?php
//Esto es para obtener el total de venta de todos los usuario [por dia]
//////
//////
//////
//////
//////
///////////////////////////////////////////
//////////////////////////////////////////////////////////





$cuadreVentaDeldiaMenbre="SELECT SUM(menbre.precio) As 'total_membre' FROM menbre WHERE menbre.fecha_pago='".$fecha_de_hoy."'"; 
$resultMembrecuadre=$mysqli->query($cuadreVentaDeldiaMenbre);
if($resultMembrecuadre){
while($roww=$resultMembrecuadre->fetch_assoc())
{
   $total_Cuadre=$roww['total_membre'];
}
}


$cuadreVentaDeldia="SELECT SUM(venta.total) As 'total_venta' FROM venta WHERE venta.fecha LIKE '".$fecha_de_hoy."%' and venta.estado='finalizado'";
$resultventaCuadre=$mysqli->query($cuadreVentaDeldia);
if($resultventaCuadre){
while($r=$resultventaCuadre->fetch_assoc())
{
   $total_productoCuadre=$r['total_venta'];
}
}


$total_venta_cuadre=$total_Cuadre + $total_productoCuadre;

?>

<!--/**

Aqui voy a agregar una fila mas para agregar las ventas del usuario de un dia



**/-->

<?php

$total_ventas_cajero=$total_membre + $total_producto;

?>


<tr>
<td bgcolor="#58D3F7" ><b>Total del cajero <?php echo "".$_SESSION['user']; ?> :    -----------------> </b></td>
<td bgcolor="#58D3F7" align="center"><?php echo  "RD$ : ".$total_ventas_cajero.".<b>00</b>"; ?></td>
</tr>

<tr>
<td><b>Total de las Ventas de Hoy :    -----------------> </b></td>
<td bgcolor="#04B45F" align="center"><?php echo  "RD$ : ".$total_venta_cuadre.".<b>00</b>"; ?></td>
<td align="center">
  <?php 
if(($_SESSION['user']=="Admin")||($_SESSION['id']=="1"))
{
 ?>
<a href="ver_inventario.php">Ver inventario</a>
<?php 
}
else
{
}
?>
</td>
</tr>

</table>

</div>

<br />
<br />



<form action="log_inventario.php" method="post">
<input style="font-size:20px" type="submit" name="boton" value="Cerrar Caja" onclick="return confirm('Desea cerrar CAJA?');" title="Solo debe de cerrar la cara una vez al día..."  class="botn"/>
<input type="hidden" name="total_venta" value="<?php echo $total_venta_cuadre; ?>" name="">
</form>
























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