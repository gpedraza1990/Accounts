<?php 

include '../Modelo/conexion.php';
$page=$_GET['paginator'];
$size=$_GET['size'];
$id=$_GET['id'];

$sql = "DELETE FROM vendedor WHERE idvendedor = \"$id\"";
$result2 = mysql_query($sql);	

     header("Location: ../Vistas/salerView.php?paginator=$page&size=$size");
 ?>