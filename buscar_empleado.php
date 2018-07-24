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
<title>Productos</title>
</head>

<body>



<div align="right" style="border:double #000000; height:80px; color:#000; background:#696">

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



<a style="font-size:20px" href="empleado.php"><img height="50px;" width="50px" src="img/ir.png" /></a>
<br />
<div align="center">


<form action="" method="get" >
<label>Buscar Empleado</label><br />
<input type="text" name="nombre_b";placeholder="Nombre o Apellido" />
<input type="submit" name="buscar" />

</form>

<br />






<form action="actualizar_empleado.php" method="post">

<table id="aling_text" width="600px" height="100px" style="size:20px" border="1">
<style>
 tr:nth-child(even) {
        background:#999;
    }
 tr:nth-child(odd){
        background:#666;
    }
	
#aling_text{ text-align:center; font-size:16px;}
</style>  


<tr>
<td>Codigo</td>
<td>Nombres</td>
<td>Apellidos</td>
<td>Direccion</td>
<td>fecha Nacimiento</td>
<td>Cargo</td>
<td></td>
<td></td>
</tr>




<?php

//de acuerdo al select del form valido los dato para buscar el listado de estudiante 

if(isset($_GET['buscar'])){
$nombre_b=$_GET['nombre_b'];	


$queryNombre="SELECT * from empleado where nombres LIKE '$nombre_b%'";
$resulNombre=$mysqli->query($queryNombre);
if($resulNombre->num_rows>=1)
{

while ($wow = $resulNombre->fetch_assoc())
{
	$id_e=$wow['id_e'];
	$codigo=$wow['id_e'];
	$nombre=$wow['nombres'];
	$apellido=$wow['apellidos'];
	$direccion=$wow['direccion'];
	$fecha=$wow['fecha_nacimiento'];
	$tipo=$wow['tipo'];
	
	

	?>
    <tr>	
    <td><?php echo $codigo; ?></td>
    <td><?php echo $nombre; ?></td>
    <td><?php echo $apellido; ?></td>
    <td><?php echo $direccion; ?></td>
    <td><?php echo $fecha; ?></td>
    <td><?php echo $tipo; ?></td>


    
 <input type="hidden" name="id" value="<?php echo $id_e; ?>" />

    
 <td><a href="actualizar_empleado.php?id=<?php echo $id_e;?>"><img width="40px" height="40px" src="img/modicar.png" /></a></td>
    
    <td><a title="No se puede eliminar -- Modifique su estado de Activo a Inativo"><img width="25px" height="25px" src="img/eli.png" /></a></td>
   </tr>
	
	
<?php
}	//fin del wile
}

}
?>



</table>
<br />

</form>
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