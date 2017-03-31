<?php 
ob_start();
include '../Modelo/conexion.php';


if (isset($_POST['btn_aceptar'])) 
{

	$documentType=$_POST['documentType'];
	$operationDate=$_POST['operationDate'];
	$client=$_POST['client'];
	$operationValue=$_POST['operationValue'];

	$operationOrigin=$_POST['operationOrigin'];
	
	$operationConcept=$_POST['operationConcept'];
	$operationDescription=$_POST['operationDescription'];
	$operationStatus=$_POST['operationStatus'];
	$numero=$_POST['numero'];

	$var=$operationDate;
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
	
	// //Busco a ver si el usuario que me estan entrando ya existe  
	// $sql = "SELECT * FROM usuario WHERE nombre='$userName'";
	// $result = mysql_query($sql);  
	
	// $con = mysql_fetch_object($result);
	
	// $usuario2 = $con->nombre;

	// if ($usuario2==null)
	// {

		$sqlNumero="SELECT secuencia FROM documento INNER JOIN documento_cliente ON documento.iddocumento=documento_cliente.iddocumento WHERE documento.iddocumento= $documentType";
			
		  $resultNumero=	mysql_query($sqlNumero);
		$numero=mysql_fetch_array($resultNumero)[0];
		$numero++;
		


		$sql2="INSERT INTO documento_cliente (iddocumento, idcliente, numero, fecha, valor, origen, concepto, detalle, estatus)";
      	$sql2 .= " VALUES (\"$documentType\",\"$client\",\"$numero\",\"$date\",\"$operationValue\",\"$operationOrigin\",\"$operationConcept\",\"$operationDescription\",\"$operationStatus\")";
      	mysql_query($sql2);
      	echo $sql2;
      	
      	$sqlBalance="SELECT balance FROM cliente WHERE idcliente=$client";
      	$balance=mysql_query($sqlBalance);
      	$balance=mysql_fetch_array($balance)[0];
      
      	
      	if ($operationOrigin) 
      	{
      		$balance+=$operationValue;
      		$sqlCliente = "UPDATE cliente 
				    SET balance = \"".$balance."\"
			     WHERE idcliente = $client"; 	
   			 mysql_query($sqlCliente);
   			
      	}
      	else
      	{
      		$balance-=$operationValue;
      		$sqlCliente = "UPDATE cliente 
				    SET balance = \"".$balance."\"
			     WHERE idcliente = $client"; 	
   			 mysql_query($sqlCliente);
      	}
      
	// }
	// else
	// {
	// 	$mens = "El usuario insertado ya existe, seleccione otro por favor";
 //    	header("Location: ../Vistas/newUserForm.php?error=$mens");
 //     	exit();
	// }


}

header("Location: ../Vistas/countsOperationsForm.php");
ob_end_flush();
 ?>