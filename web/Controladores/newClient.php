<?php 
include '../Modelo/conexion.php';

if (isset($_POST['btn_aceptar'])) 
{

	$clientName=$_POST['clientName'];
	$clienAddress=$_POST['clientAddress'];
	$clientPhone=$_POST['clientPhone'];
	$clientDate=$_POST['clientDate'];
	$clientBalance=$_POST['clientBalance'];
	$clientEstatus=$_POST['clientEstatus'];
	$saler=$_POST['saler'];

		$var=$clientDate;
		$cont=0;
		for ($i=0; $i<2; $i++) 
		{
			$day=$day.$var[$i];
		}
		for ($i=3; $i<5; $i++) 
		{
			$month=$month.$var[$i];
		}
		for ($i=6; $i<10; $i++) 
		{
			$year=$year.$var[$i];
		}
		$date=$year."-".$month."-".$day;
		

	//Busco si existe el cliente por el telefono
	$sql = "SELECT * FROM cliente WHERE telefono='$clientPhone'";
	$result = mysql_query($sql);  
	$con = mysql_fetch_object($result);
	
	if($con->nombre==null)
	{
		
		$rs = mysql_insert_id();

		$sql2="INSERT INTO cliente (idcliente, nombre, direccion, telefono, fecha_ing, balance, vendedor, estatus)";
      	$sql2 .= " VALUES (\"$rs\",\"$clientName\",\"$clienAddress\",\"$clientPhone\",\"$date\",\"$clientBalance\",\"$saler\",\"$clientEstatus\")";
      	mysql_query($sql2);

      	
      	
	}
	else
	{
		$mens = "El el telefono insertado ya existe.";
    	header("Location: ../Vistas/newClientForm.php?error=$mens");
     	exit();

	}

	header("Location: ../Vistas/newClientForm.php");
}
?>