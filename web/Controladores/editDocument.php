<?php 
include '../Modelo/conexion.php';


if (isset($_POST['btn_aceptar'])) 
{
	$documentName=$_POST['documentName'];
	$documentSecuence=$_POST['documentSecuence'];
	$documentOrigin=$_POST['documentOrigin'];
	$documentEstatus=$_POST['documentEstatus'];
	$tipo=$_POST['tipo'];
	$id=$_POST['id'];

	$page=$_GET['paginator'];
	$size=$_GET['size'];

	$sql2 = "UPDATE documento 
				    SET nombre = \"".$documentName."\",          			
					    secuencia = \"".$documentSecuence."\",
					    estatus = \"".$documentEstatus."\",
					    origen = \"".$documentOrigin."\",
					    tipo = \"".$tipo."\"
			     WHERE iddocumento = $id"; 	


    mysql_query($sql2);

    echo $sql2;

      	
}
	

	header("Location: ../Vistas/documentView.php?id=$id&paginator=$page&size=$size");

?>