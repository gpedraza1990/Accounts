<?php 
include '../Modelo/conexion.php';

if (isset($_POST['btn_aceptar'])) 
{

	$salerName=$_POST['salerName'];
	
	//Ver por que preguntar si existe el documento
	// $sql = "SELECT * FROM cliente WHERE telefono='$clientPhone'";
	// $result = mysql_query($sql);  
	// $con = mysql_fetch_object($result);
	
	// if($con->nombre==null)
	// {
		
		$rs = mysql_insert_id();
		$date=$date=date("Y")."-".date("m")."-".date("d");

		$sql2="INSERT INTO vendedor (idvendedor, nombre,fecha)";
      	$sql2 .= " VALUES (\"$rs\",\"$salerName\",\"$date\")";
      	mysql_query($sql2);    	
      	
	// }
	// else
	// {
	// 	$mens = "El el telefono insertado ya existe.";
 //    	header("Location: ../Vistas/newClientForm.php?error=$mens");
 //     	exit();

	// }

	header("Location: ../Vistas/newSalerForm.php");
}
?>