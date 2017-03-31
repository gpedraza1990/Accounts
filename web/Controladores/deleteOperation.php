<?php 

include '../Modelo/conexion.php';
$page=$_GET['paginator'];
$size=$_GET['size'];
$iddocumento=$_GET['iddocumento'];
$idcliente=$_GET['idcliente'];

$sql = "DELETE FROM documento_cliente WHERE iddocumento = \"$iddocumento\" AND idcliente= \"$idcliente\"";
$result2 = mysql_query($sql);	


     header("Location: ../Vistas/operationsView.php?paginator=$page&size=$size");
 ?>