<?php 
include '../Modelo/conexion.php';


if (isset($_POST['btn_aceptar'])) 
{

	$salerName=$_POST['salerName'];
	
	$id=$_POST['id'];


	$sql2 = "UPDATE vendedor 
				    SET nombre = \"".$salerName."\"     			
					   
			     WHERE idvendedor = $id"; 	
    mysql_query($sql2);

 
      	
	}
	

	header("Location: ../Vistas/salerView.php");

?>