<?php 

include '../Modelo/conexion.php';
$page=$_GET['paginator'];
$size=$_GET['size'];
$id=$_GET['id'];

$sql = "DELETE FROM cliente WHERE idcliente = \"$id\"";
$result2 = mysql_query($sql);	

     header("Location: ../Vistas/clientsView.php?paginator=$page&size=$size");
 ?>