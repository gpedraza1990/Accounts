<?php 

include '../Modelo/conexion.php';
$page=$_GET['paginator'];
$size=$_GET['size'];
$id=$_GET['id'];

$sql = "DELETE FROM usuario WHERE idusuario = \"$id\"";
$result2 = mysql_query($sql);	

     header("Location: ../Vistas/userView.php?paginator=$page&size=$size");
 ?>