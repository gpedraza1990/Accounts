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
	$id=$_POST['id'];

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

	$sql2 = "UPDATE cliente 
				    SET nombre = \"".$clientName."\",          			
					    direccion = \"".$clienAddress."\",
					    telefono = \"".$clientPhone."\",
					    fecha_ing = \"".$date."\",
					    balance = \"".$clientBalance."\",
					    vendedor = \"".$saler."\",
					    estatus = \"".$clientEstatus."\"
			     WHERE idcliente = $id"; 	
    mysql_query($sql2);

 
      	
	}
	

	header("Location: ../Vistas/clientsView.php");

?>