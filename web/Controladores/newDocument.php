<?php 
include '../Modelo/conexion.php';

if (isset($_POST['btn_aceptar'])) 
{

	$documentName=$_POST['documentName'];
	$documentSecuence=$_POST['documentSecuence'];
	$documentOrigin=$_POST['documentOrigin'];
	$documentEstatus=$_POST['documentEstatus'];
	$tipo=$_POST['tipo'];

	//Ver por que preguntar si existe el documento
	// $sql = "SELECT * FROM cliente WHERE telefono='$clientPhone'";
	// $result = mysql_query($sql);  
	// $con = mysql_fetch_object($result);
	
	// if($con->nombre==null)
	// {
		
		$rs = mysql_insert_id();
		$date=$date=date("Y")."-".date("m")."-".date("d");  

		$sql2="INSERT INTO documento (iddocumento, nombre, secuencia, estatus, origen,tipo,fecha)";
      	$sql2 .= " VALUES (\"$rs\",\"$documentName\",\"$documentSecuence\",\"$documentEstatus\",\"$documentOrigin\",\"$tipo\",\"$date\")";
      	mysql_query($sql2);
      	//echo $sql2;
      	

      	
      	
	// }
	// else
	// {
	// 	$mens = "El el telefono insertado ya existe.";
 //    	header("Location: ../Vistas/newClientForm.php?error=$mens");
 //     	exit();

	// }

	header("Location: ../Vistas/newDocumentForm.php");
}
?>