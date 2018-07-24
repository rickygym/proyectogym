<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');


$id = $_GET['id'];
$query = "SELECT * from cliente where  id_c='$id'"; 
$result = $mysqli->query($query);



while ($roww = $result->fetch_assoc())
{
	//
	$id_c=$roww['id_c'];
	$codigo=$roww['codigo'];
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Foto</title>
</head>

<body background="img/foto_tomar.jpg">
<div align="center">      
<form method="post" action="edictar_foto_cliente.php" enctype="multipart/form-data" >
<input type="hidden" name="codigo" value="<?php echo $codigo; ?>"  />
<input type="file" name="Image" required="required"/>
<input type="submit" value="Cambiar Foto" />
</form>
</div>
<div><a href="buscar_cliente.php"><img width="100px" height="100px" src="img/regresar.jpg" /></a></div>
<div id="estilo1">
<a href="webcam jquery/index.php?id=<?php echo $id_c;?>"><img src="img/ico_cam.png" /></a>
</div>
</body>
</html>
<style>
#estilo1{
	position:absolute;
	width:50px;
	height:50px;
	padding: 0px;
	
	margin: 5px;
	right:900px;
	top:110px;
	text-align:center;
}
</style>