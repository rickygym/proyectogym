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
	<link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css">
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
           Buscar Clientes
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
          <div align="center" class="box">
<form action="" method="get" >
<div class="input-group">
                    <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                    <input class="form-control" name="nombre_b"; placeholder="Nombre o Apellido" autofocus="autofocus">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>

</form>



<br />







<form action="actualizar_cliente.php" method="post">
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Codigo</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Fecha de inscripción</th>
      <th scope="col">Estado</th>
    </tr>

</thead>
  <tbody>


<?php

//de acuerdo al select del form valido los dato para buscar el listado de los clientes

if(isset($_GET['nombre_b'])){
$nombre_b=$_GET['nombre_b'];  


$queryNombre="SELECT * from cliente where estado='activo' and nombres LIKE '$nombre_b%' or cliente.apellidos LIKE '$nombre_b%'";
$resulNombre=$mysqli->query($queryNombre);

if($resulNombre->num_rows>=1)
{

while ($wow = $resulNombre->fetch_assoc())
{
  $imagen=$wow['foto'];
  $id_c=$wow['id_c'];
  $codigo=$wow['codigo'];
  $nombre=$wow['nombres'];
  $apellido=$wow['apellidos'];
  $direccion=$wow['direccion'];
  //$fecha=$wow['fecha_nacimiento'];
  $email=$wow['email'];
  $fecha_inscripcion=$wow['fecha_inscripcion'];
  $estado=$wow['estado'];
  
  

  ?>
    <tr>
    
   <td title="Un Click Para Ampliar y Dos Click Para Volver a tamano normal"> <img onclick="javascript:this.width=400;this.height=400" ondblclick="javascript:this.width=100;this.height=80" src="data:imagen/jmg;base64,<?php echo base64_encode($imagen);?>"  width="100"/></td>  
    <td scope="row"><?php echo $codigo; ?></td>
    <td scope="row"><?php echo $nombre; ?></td>
    <td scope="row"><?php echo $apellido; ?></td>
    <td scope="row"><?php echo $direccion; ?></td>
    <td scope="row"><?php echo $email; ?></td>
    <td scope="row"><?php echo $fecha_inscripcion; ?></td>
    <td scope="row"><?php echo $estado; ?></td>

 <input type="hidden" name="id" value="<?php echo $id_c; ?>" />

    
 <td><a title="Ir a Modificar Datos del Cliente" href="actualizar_cliente.php?id=<?php echo $id_c;?>"><img width="40px" height="40px" src="img/modicar.png" /></a></td>
 
   <td><a title="Ir a Pagar Membrecia cliente" href="membrecia_pagar.php?id=<?php echo $id_c;?>"><img width="40px" height="40px" src="img/pagar_m.png" /></a></td>
   
   <td><a title="Ir a Tomar foto del cliente" href="imagen_cliente.php?id=<?php echo $id_c;?>"><img width="40px" height="40px" src="img/cam.png" /></a></td>
   
   <td><a title="Ir a ver el registro del cliente" href="registro_cliente.php?id=<?php echo $codigo;?>"><img width="40px" height="40px" src="img/ico_buscar.ico" /></a></td>
    
    
    <td><a title="Desabilitar Cliente"  href="eliminar_cliente.php?id=<?php echo $id_c;?>"><img width="25px" height="25px" src="img/eli.png" /></a></td>
   </tr>
  
  
<?php
} //fin del wile
}

}
?>



</table>
<br />

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
    <!-- JQuery ANIMACION DEL CONTACTANOS -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  </body>
</html>