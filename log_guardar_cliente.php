<?php

include("conexion.php");
date_default_timezone_set('America/Santo_Domingo');
$codigo=$_POST['codigo'];
$nom=$_POST['nombres'];
$ape=$_POST['apellidos'];
$dire=$_POST['direccion'];
$email=$_POST['email'];
$inscripcion=date("Y-m-d");
$ima= addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

//para guardar la membrecia gett a codigo y tipo de membre
$codigo_mebre=$_POST['codi_membre'];
$tipo_membre=$_POST['tipo_membre'];
//fin



$query_confi="SELECT * FROM `configuracion_precio_membrecia`";
$result_confi=$mysqli->query($query_confi);
if($result_confi->num_rows>=1)
{
	while($row=$result_confi->fetch_assoc())
	{
	$mensual=$row['mensual'];
	$semanal=$row['semanal'];
	$quincenal=$row['quincenal'];
}

$date=date("Y-m-d");

//Verificar cual Membrecia fue tomada por el emple

if($tipo_membre=="Mensual")
{
$queryPagar_Membre="INSERT INTO `menbre` (`id`, `tipo`, `precio`, `fecha_pago`, `codigo_c`, `id_e`) VALUES (NULL, 'Mensual', '$mensual', '$date', '$codigo_mebre', '1');";
$result_membre=$mysqli->query($queryPagar_Membre);
}
//cIERRO MENSUAL
elseif($tipo_membre=="Quincenal")
{
$queryPagar_Membre="INSERT INTO `menbre` (`id`, `tipo`, `precio`, `fecha_pago`, `codigo_c`, `id_e`) VALUES (NULL, 'Quincenal', '$quincenal', '$date', '$codigo_mebre', '1');";
$result_membre=$mysqli->query($queryPagar_Membre);
}
//CIERRO qUINCENAL
elseif($tipo_membre=="Semanal")
{
	$queryPagar_Membre="INSERT INTO `menbre` (`id`, `tipo`, `precio`, `fecha_pago`, `codigo_c`, `id_e`) VALUES (NULL, 'Semanal', '$semanal', '$date', '$codigo_mebre', '1');";
$result_membre=$mysqli->query($queryPagar_Membre);
}
//cIERRO SEMANAL 

}//fin de if primero





$query= "insert into cliente(codigo,nombres,apellidos,direccion,email,fecha_inscripcion,estado,foto) Values ('$codigo','$nom','$ape','$dire','$email','$inscripcion','activo','$ima')";

$result=$mysqli->query($query);

if($result)
{
	echo "<script>alert('Cliente y Membrecia Guardado y pagado Excelentemente ');window.location='homeAdmin.php';	
</script>";

}
else
{
	echo "<script>alert('Cliente No Guardado'); window.location='cliente.php';	
</script>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log</title>
</head>

<body>
</body>
</html>