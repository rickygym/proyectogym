<?php
session_start();
include("conexion.php");

session_destroy();
mysqli_close($mysqli);
header("Location: index.html");
date_default_timezone_set('America/Santo_Domingo');
?>
