<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
?>


<style>


#menu{ 
background-color:#696;
width:350px;
height:550px;
border:double #000000;
top:14px;
}



</style>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pago de Membrecia</title>
</head>

<body>



<div align="right" style="border:double #000000; height:80px; color:#000; background:#06F">

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
<a href="cerrar_session.php">      Cerrar session      </a>

</div>
<br />


<a style="font-size:20px" href="membrecia.php"><img height="40px;" width="40px" src="img/ir.png" /></a>



<div align="center">

<h1>Buscar Membrecia del Cliente</h1>


<fieldset>

<legend>Buscar pagos de membrecias</legend>

<form action="" method="get" >


<input size="60px" type="text" name="nombre_b"; placeholder="Codigo o Nombre del cliente .." />
<input type="submit" name="buscar" />

</form>


<br />



<form action="log_ver_membrecia.php" method="post">
<table border="1" style="font-size:20px;">

 <style>
 tr:nth-child(even) {
        background:#69F;
    }
 tr:nth-child(odd){
        background:#CCC;
    }
</style> 


<tr>
<td><b>Codigo Cliente</b></td>
<td><b>Nombre</b></td>
<td><b>Apellido</b></td>
<td><b>Direccion</b></td>
<td><b>Membrecia</b></td>
<td><b>Precio</b></td>
<td><b>Fecha de Pago de Membrecia</b></td>
<td></td>
</tr>


<?php

/*include("conexion.php");
session_start();
if(!$_SESSION['verificar'])
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');*/





if(isset($_GET['buscar']))
{
$nombre_b=$_GET['nombre_b'];	


$queryNombre="SELECT menbre.id,menbre.tipo,menbre.precio,menbre.fecha_pago,menbre.codigo_c, cliente.nombres,cliente.apellidos, cliente.direccion FROM `menbre` INNER JOIN cliente on cliente.codigo=menbre.codigo_c WHERE menbre.codigo_c='$nombre_b' OR cliente.nombres LIKE '$nombre_b%'";
$resulNombre=$mysqli->query($queryNombre);

if($resulNombre->num_rows>=1)
{

while ($wow = $resulNombre->fetch_assoc())
{
	$id=$wow['id'];
    $nombre=$wow['nombres'];
	$apellido=$wow['apellidos'];
    $codigo=$wow['codigo_c'];
	$tipo=$wow['tipo'];
	$precio=$wow['precio'];
	$fecha_pago=$wow['fecha_pago'];
	$direccion=$wow['direccion'];
?>
<tr>
<td><?php  echo $codigo;  ?></td>
<td><?php  echo $nombre;  ?></td>
<td><?php  echo $apellido;  ?></td>
<td> <?php  echo $direccion;  ?></td>
<td><?php  echo $tipo;  ?></td>
<td> <?php  echo $precio;  ?></td>
<td bgcolor="#66CC33"> <?php  echo $fecha_pago;  ?></td>


 <td><a title="Eliminar esta Membrecia"  href="eliminar_membrecia.php?id=<?php echo $id;?>"><img width="25px" height="25px" src="img/eli.png" /></a></td>
   </tr>

</tr>

<?php

}

}


}
?>


</table>
</form>

</fieldset>


</div>



<style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    height: 10%;
    width: 100%;
    background-color: #A9D0F5;
    color: black;
    text-align: center;
}
</style>

</div><!--fin del div menu-->

<div class="footer">
<footer id="main-footer" >
    <p> Creado By:   <a href="#"> Ing. Ricky J. Galan Paulino</a> &copy; 2017 Version 2.0.1</p>
  </footer> <!-- / #main-footer -->
</div>
</body>
</html>