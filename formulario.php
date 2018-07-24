<?php
session_start();

include("conexion.php");
if(!$_SESSION)
{
	header("Location: index.html");
}
$documento="";
$nombre="";
$telefono="";

$cantidad=0;
$codigo=0;
$descripcion="";
$precio=0;

$total=0;


if (isset($_POST['pago'])) {
	$pago=$_POST['pago'];
}
else
{
	$_POST['pago']="";
}

if (isset($_SESSION['cliente'])) 
{
	$documento= $_SESSION['cliente']->codigo;
	$nombre= $_SESSION['cliente']->nombres;
	$telefono= $_SESSION['cliente']->email;
}
else
{
	$cliente = array();
}
if (isset($_SESSION['articulos']))
{
	
	$articulos= $_SESSION['articulos'];

}
else
{
	$articulos = array();
}

?>

<style>


#menu{ 
background-color:#999;
width:220px;
height:550px;
border:double #000000;
top:14px;
}





.botn{
   position:fixed;
   display:scroll;
   padding:8px 50px;
   font-family:'psychotik';
   font-size:1.2em;
   font-weight:normal;
   left:20px;
  
   color:#000;
   text-shadow:none;
   border-radius:16px;
   background:#36F;
   box-shadow:inset 3px 3px 2px #007f8b;
}
.botn:hover{
   background:#FF9C00;
   box-shadow:inset 3px 3px 2px #995f02;
}

.botn_imag{
   
   display:scroll;
   padding:8px 50px;
   font-family:'psychotik';
   font-size:1.2em;
   font-weight:normal;
   right:1045px;
  
   color:#000;
   text-shadow:none;
   border-radius:16px;
   background:#960;
   box-shadow:inset 3px 3px 2px #007f8b;
}
.botn_imag:hover{
   background:#F00;
   box-shadow:inset 3px 3px 2px #995f02;
}
</style> 






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>Mountain Fitness Center - Venta </title>
</head>




<body>



<div align="right" style="border:double #000000; height:80px; color:#000; background:#999">

<?php

echo "Adminitrador       <b>". $_SESSION['user'];




$resultado = $mysqli->query("SELECT foto FROM empleado where id_e='".$_SESSION['id']."'");

$resultado->data_seek(0);
while ($fila = $resultado->fetch_assoc())
 {
	 ?>
	 <img height="70px" width="70px" src="data:imagen/jmg;base64,<?php echo base64_encode($fila['foto']);?>"/>
     <?php
 }
?>	

<div style="float: left;"><a href="homeAdmin.php"><img height="50px;" width="50px" src="img/ir.png" /></a></div>



</div>
       <div class="container">
       	   <form action="modelo.php" method="post">
       	   	    <div class="form-group">
       	   	        <table class="table table-bordered">
			       	   	      	<tr>
			       	   	      		<td><label>Datos del Cliente</label></td>
			                        <td><input type="text" class="form-control" name="documento" required="required"></td>
			                        <td>
			                        	<button name="operacion" value="buscarcliente">
			                        	<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			                            </button>
			                        </td>
			       	   	      	</tr>

			       	   	      	<tr>
			       	   	      		<th>Código Cliente</th>
			       	   	      		<th>Nombre</th>
			       	   	      		<th>Telefono</th>
			       	   	      	</tr>

			       	   	      	<tr>
			       	   	      		<td><?php echo $documento;  ?></td>
			       	   	      		<td><?php echo $nombre;  ?></td>
			       	   	      		<td><?php echo $telefono;  ?></td>
			       	   	      	</tr>
       	   	        </table>
       	   	    </div>
       	   </form>






       	    <form action="modelo.php" method="post">
       	   	    <div class="form-group">

       	   	        <table class="table table-bordered">
			       	   	      	<tr>
			       	   	      		<td><label>Código</label></td>
			       	   	      		<td><label>Cantidad</label></td>
			       	   	      		
			       	   	      	</tr>

			       	   	      	<tr>
			       	   	      		 <td><input type="number" class="form-control" name="codigo"></td>
			       	   	      		  <td><input type="number" class="form-control" name="cantidad" ></td>
			       	   	      		  <td>
			                        	<button name="operacion" value="buscararticulo">
			                        	<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
			                            </button>
			                        </td>
			       	   	      	</tr>

			                    <tr>
			       	   	      		<th>Código</th>
			       	   	      		<th>Cantidad</th>
			       	   	      		<th>Descripcion</th>
			       	   	      		<th>Precio</th>
			       	   	      		<th>Subtotal</th>
		       	   	      	    </tr>

                                       <?php 
                                          $i = 0;
						       	   	   ?>
                                       <?php foreach ($articulos  as $key => $a):?>
                               	<tr>
                               		<td bgcolor="#999"><?php  echo $a->codigo; ?></td>
						       	   	<td ><?php  echo $a->cantidad; ?></td>
						       	   	<td bgcolor="#999"><?php  echo $a->descripcion ?></td>
						       	   	<td><?php  echo $a->precio; ?></td>
						       	   	<td><?php  echo $a->subtotal=$a->precio * $a->cantidad; ?></td> 
						       	   	<td>
						       	   	    <button name="operacion" value="devolver">
				                           <input type="hidden" name="id" value="<?php echo $a->codigo; ?>">  
				<!--  <?php //echo "<a href='modelo.php?in=$i'>Eliminar</a>"; ?> -->
						               </button>
						            </td>

			                    </tr>
			                          <?php  $total += ($a->precio * $a->cantidad); ?>
			                          <?php 
                                          $i++;
						       	   		 ?>
		                              <?php endforeach ?>



			       	           





									<!--Esto es para enviarle el total al modelo para la BD-->			       	             
									<input type="hidden" name="total" value="<?php echo $total; ?>">
									<!--Fin-->

											                        
				</table>
       	   	</div>
       	   	                         <td>
			                        	<button name="operacion" value="facturacion">
			                        	<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
			                            </button>
			                        </td>
			                        <td>
			                        	<button name="operacion" value="cancelar">
			                        	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			                            </button>
			                        </td>


       	</form>
<div class="form-group">
       	<form action="" method="post"> 
       		<table class="table">
			       	            <tr>
			       	             	<th><h1>Total :</h1></th>
			       	             	<td><h2><?php echo $total; ?></h2></td>
			       	            </tr>
			       	            <tr>
			       	             	<th><h1>Pagar <img height="50px;" width="50px" src="img/dolar.jpg" /></h1></th>

			       	             	<td><input type="number" name="pago" value="" placeholder="00"></td>
			       	             	<th><h1>Devuelta <img height="50px;" width="50px" src="img/dolar.jpg" /></h1></th>
			       	             	<td style="border-color: #FFFFFF; border-width:1px; border-style: solid"><h1><?php  if (isset($pago)) {
			       	             		if ($pago>=$total) {
			       	             			echo $pago - $total;
			       	             		}
			       	             		else{echo "<script type=\"text/javascript\">alert(\"El total es mayor que la cantidad introducida...\");  window.location= 'formulario.php'</script>";}
			       	             	} else{echo $pago="0";}?> </h1></td>
			       	            </tr>
			       	            </table>
                              </form> 
                          </div>
       	   
    </div>


<div id="estilo">
    <button id="btnImprimir">Imprimir</button>
</div>



</body>
<script src="jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#btnImprimir').click(function(){
           $.ajax({
               url: 'ticket.php',
               type: 'POST',
               success: function(response){
                   if(response==1){
                       alert('Imprimiendo....');
                   }else{
                       alert('Error');
                   }
               }
           }); 
        });
    });
</script>
</html>





<style>
#estilo{
	position:absolute;
	width:90px;
	height:50px;
	padding: 0px;
	background-color:#000;
	background:#BDBDBD;
	border-style: dashed;
	border-width: 2px;
	margin: 5px;
	right:80px;
	top:250px;
	text-align:center;
}

</style> 