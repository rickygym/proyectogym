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

#botones{ width:50%; height:50px; font-size:20px; border-radius: 5px 5px 5px 5px; border:#ccc solid thin;
border-color:#F00; background-color:#09C;}

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
<title>Menu de Cliente Atrasados</title>
</head>

<body>
<div align="right" style="border:double #000000; height:80px; color:#000; background:#069">

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


<a style="font-size:20px" href="homeAdmin.php"><img height="50px;" width="50px" src="img/ir.png" /></a>




<div align="center">
<a href="mensual.php"><button style="cursor:pointer" id="botones">Clientes de pago Atrasado</button></a><br /><br />
<!--<a href="quincenal.php"><button style="cursor:pointer"  id="botones">Atrasados Quincenales</button></a><br /><br />
<a href="semanal.php"><button style="cursor:pointer" id="botones">Atrasados Semanales</button></a><br /><br />-->
<a href="nuevo.php"><button style="cursor:pointer"  id="botones">Clientes Nuevos de Hoy</button></a><br /><br />
<a href="clientes_bloqueados.php"><button style="cursor:pointer"  id="botones">Clientes Bloqueados</button></a><br /><br />
</div>
<style>
#estilo{
	position:absolute;
	width:200px;
	height:40px;
	padding: 0px;
	background-color:#009;
	background:#999;
	border-style: dashed;
	border-width: 2px;
	margin: 5px;
	right:10px;
	top:550px;
	text-align:center;
}

</style> 


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div align="center" style="border:double #000000; height:40px; color:#000; background:#999">
<footer id="main-footer" >
		<p> Creado By:   <a href="#"> Ing. Ricky J. Galan Paulino</a> &copy; 2017.   Version 2.0</p>
	</footer> <!-- / #main-footer -->
</div>
</body>
</html>