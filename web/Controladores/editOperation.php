<?php 
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
	$operationDays=$_POST['operationDays'];
	$numero=$_POST['numero'];

	$iddocumento=$_POST['iddocumento'];
	$idcliente=$_POST['idcliente'];

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

	$sql2 = "UPDATE documento_cliente
				    SET iddocumento = \"".$documentType."\",
				    	idcliente = \"".$client."\",
				    	numero = \"".$numero."\",          			
					    fecha = \"".$date."\",
					    valor = \"".$operationValue."\",
					    origen = \"".$operationOrigin."\",
					    detalle = \"".$operationDescription."\",
					    dias = \"".$operationDays."\",
					    estatus = \"".$operationStatus."\",
					    concepto = \"".$operationConcept."\"
			     WHERE iddocumento = $iddocumento AND idcliente=$idcliente"; 	


    mysql_query($sql2);

      	
}
	

	header("Location: ../Vistas/main_page.php");

?>