<?php
include("conexion.php");





$resultado = $mysqli->query("SELECT foto FROM cliente where id_c='1'");

$resultado->data_seek(0);
while ($fila = $resultado->fetch_assoc())
 {
	 ?>
	 <img height="15px" width="15px" src="data:imagen/jmg;base64,<?php echo base64_encode($fila['foto']);?>"/>
     <?php
 }
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>