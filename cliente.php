<?php 
session_start();

include("conexion.php");



if(!$_SESSION)

{

  header("Location: index.html");

}
//para generar el codigo del cliente
$queryMaxId="SELECT MAX(id_c)+1 As 'id_max' FROM cliente";
$result=$mysqli->query($queryMaxId);


while ($roww = $result->fetch_assoc())
{
  $id_max=$roww['id_max'];
  
}
if ($id_max==0) {
  $id_max = $id_max + 1;
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
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>.md-form label{font-size: 15px;}
	.md-form label.active{font-size: 1.2rem;}</style>
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
            cliente
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


<div  align="center">
<form action="log_guardar_cliente.php" id="contact-form" method="post" enctype="multipart/form-data">
<!--envio el codigo del cliente a guardar para pagar la membre-->
    <!--Section description-->
<input type="text" name="codigo" class="form-control"   value="<?php echo $id_max; ?>" /><br>

<!--Section: Contact v.2-->
<section class="section">
    <!--Section heading-->
    <div class="container">
	<div class="row">
	  <ul class="nav nav-tabs">
	    <li class="active"><a data-toggle="tab" href="#home">Registrar</a></li>
	    <li><a data-toggle="tab" href="#menu1">Caracteristicas fisicas</a></li>
	    <li><a data-toggle="tab" href="#menu2">Contacto</a></li>
	    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
	  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active col-md-10">
      <h3 class="h1-responsive font-weight-bold text-center">Registrar</h3>
      <p class="text-center w-responsive mx-auto">Debera llenar el formulario completo para registrar al cliente.</p>
      <div class="row">
        <!--Grid column-->
        <form action="log_guardar_cliente.php" id="contact-form" method="post" enctype="multipart/form-data">
        <div class="">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="nombres" class="form-control" required="required" autofocus>
                        <label for="name" class="">Ingrese sus nombres</label>
                    </div>
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name2" name="apellidos" class="form-control" required="required">
                        <label for="name2" class="">Ingrese sus apellidos</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email" class="">Correo electronico</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name3" name="telefono" class="form-control" required="required">
                        <label for="name3" class="">Numero de telefono</label>
                    </div>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="subject" name="direccion" class="form-control">
                        <label for="subject" class="">Dirección de habitación</label>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                <input  type="file" name="Imagen" class="form-control" />
                </div>
              </div>
            </div>
            <!--Grid row-->
            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <select class="mdb-select form-control" name="tipo_membre">
                    <option value="" disabled selected>Elija el tipo de membrecia</option>
                    <option value="Mensual">Mensual</option>
                    <option value="Quincenal">Quincenal</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <select class="mdb-select form-control" name="tipo_membre">
                    <option value="" disabled selected>Elija que tipo de programa desea para sus clases</option>
                    <option value="Mensual">Bailo terapia</option>
                    <option value="Quincenal">ETC</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
            	<div class="col-md-6">
                    <div class="mb-0">
                        <h4>¿Desea un entrenador?</h4>
                        <!-- Default inline 1-->
						<div class="col-md-6">
							<div class="custom-control custom-radio custom-control-inline ">
							  <input type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
							  <label class="custom-control-label" for="defaultInline1">SI</label>
							</div>
						</div>

						<!-- Default inline 2-->
						<div class="col-md-6">
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
							  <label class="custom-control-label" for="defaultInline2">NO</label>
							</div>
						</div>
                    </div>
                </div>

            	<div class="col-md-6">
                    <div class="mb-0">
                        <h4>¿Que horario desea?</h4>
                        <!-- Default inline 1-->
						<div class="col-md-4">
							<div class="custom-control custom-radio custom-control-inline ">
							  <input type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
							  <label class="custom-control-label" for="defaultInline1">Mañana</label>
							</div>
						</div>

						<!-- Default inline 2-->
						<div class="col-md-4">
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
							  <label class="custom-control-label" for="defaultInline2">Tarde</label>
							</div>
						</div>
						<div class="col-md-4">
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
							  <label class="custom-control-label" for="defaultInline2">Noche</label>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
      </form>
        <!--Grid column-->
    </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Contactos</h3>
      <p>Debera agregar datos de familiares del cliente en caso de alguna emergencia.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>
    </div>

</section>
<!--Section: Contact v.2-->

</form>
</div>
          <!-- Default box -->

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