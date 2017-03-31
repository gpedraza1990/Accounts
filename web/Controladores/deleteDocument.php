<?php 

include '../Modelo/conexion.php';
$page=$_GET['paginator'];
$size=$_GET['size'];
$id=$_GET['id'];

$sql = "DELETE FROM documento WHERE iddocumento = \"$id\"";
$result2 = mysql_query($sql);	


     header("Location: ../Vistas/documentView.php?paginator=$page&size=$size");
 ?>