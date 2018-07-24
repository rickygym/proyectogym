<?php

session_start();

include("conexionPDO.php");
date_default_timezone_set('America/Santo_Domingo');
$fecha_de_hoy=date("Y-m-d");
$user = $_SESSION['user'];
$codigo = $_GET['id'];

$imprimir_membrecia = $bd->query("SELECT menbre.tipo,menbre.precio,menbre.fecha_pago,menbre.codigo_c, cliente.nombres,cliente.apellidos 
FROM `menbre` INNER JOIN cliente on cliente.codigo=menbre.codigo_c
WHERE 
menbre.fecha_pago LIKE '$fecha_de_hoy%' and menbre.id_e='".$_SESSION['id']."' and cliente.codigo = '".$codigo."'")->fetch(PDO::FETCH_OBJ);
$_SESSION['membrecia']=$imprimir_membrecia;




require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/ 


/*
    Aquí, en lugar de "POS" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/

$nombre_impresora = "impresoraGym"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.
/*echo 1;

	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Ahora vamos a imprimir un encabezado
*/

$printer->text("\n"."<<  Mountain Fitness Center  >>" . "\n");
$printer->text("Direccion: Calle Sanchez   #15" . "\n");
$printer->text("Cel: (829) - 942 - 8548" . "\n");
#La fecha también
date_default_timezone_set("America/Santo_Domingo");
$printer->text(date("Y-m-d H:i:s") . "\n");
#Datos cabezera del cliente 
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("Codigo Cliente : $imprimir_membrecia->codigo_c \n");//Aqui debo poner el codigo traido desde detalle_membrecia
$printer->text("Cliente : ".$imprimir_membrecia->nombres."  ".$imprimir_membrecia->apellidos. "\n");
//$printer->text($nombre_cliente."    ".$apellido_cliente. "\n");
$printer->text("-------------------------------------" . "\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("DESCRIPCION             PRECIO   \n");
$printer->text("-------------------------------------"."\n");


/*
	Imprimemos el detalle de la membrecia
*/
$printer->text($imprimir_membrecia->tipo."                   ".$imprimir_membrecia->precio. ".00"."\n");
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("------------------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("ITBIS: 0 %\n");
$printer->text("TOTAL RD : ".$imprimir_membrecia->precio.".00"."\n");


/*
	Podemos poner también un pie de página
*/
$printer->text("--------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Cajero : ".$_SESSION['user']."\n");
$printer->text("Muchas gracias por Preferirnos...\n");

 


/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();
 header('location:detalle_membrecia.php');
?>