<?php
session_start();
include("conexionPDO.php");

$articulos = $_SESSION['articulos'];
$cliente = $_SESSION['cliente'];
$user = $_SESSION['user'];
$total = 0;


$query_max_id = $bd->prepare("SELECT MAX(venta.id_v)+1 As 'id_v_max' FROM `venta`");
$query_max_id->execute();
while($row = $query_max_id->fetch())
{
    $id_v_max=$row['id_v_max'];
}


$imprimir=$bd->query("SELECT venta.id_v,venta.total, venta.id_c, cliente.nombres, cliente.email,detalle.cantidad, detalle.id_d, detalle.id_p, producto.descripcion, producto.precio
FROM
venta INNER JOIN cliente ON cliente.id_c=venta.id_c INNER JOIN detalle on detalle.id_v=venta.id_v INNER JOIN producto on detalle.id_p = producto.id_p
WHERE venta.id_e = '". $_SESSION['id']."' ")->fetchAll(PDO::FETCH_OBJ);



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
echo 1;
/*
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
$printer->text("Codigo Cliente : $cliente->codigo.\n");
$printer->text("Cliente : ");
$printer->text($cliente->nombres. "\n");
$printer->text("No. Venta : ");
$printer->text($id_v_max."\n");
$printer->text("-------------------------------------" . "\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("DESCRIPCION    CANT.   P.U   SUBTOTAL.\n");
$printer->text("-------------------------------------"."\n");


/*
	Imprimemos el detalle de venta
*/
foreach ($articulos as $a) {
	$printer->text($a->descripcion."\n");
	$printer->text($a->cantidad."          ".$a->precio.".00"."          ".$a->cantidad * $a->precio.".00"."\n");
    $total += ($a->precio * $a->cantidad);
}
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$printer->text("------------------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("ITBIS: 0 %\n");
$printer->text("TOTAL RD : ".$total.".00"."\n");


/*
	Podemos poner también un pie de página
*/
$printer->text("--------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Cajero : ".$user."\n");
$printer->text("Muchas gracias por su compra...\n");

 


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

?>