<?php 
ob_start();
include '../Modelo/conexion.php';


if (isset($_POST['btn_aceptar'])) 
{

	$userName=$_POST['userName'];
	$userStatus=$_POST['userStatus'];
	$userPassword=$_POST['userPassword'];
	$userLevel=$_POST['level'];
	
	
	//Busco a ver si el usuario que me estan entrando ya existe  
	$sql = "SELECT * FROM usuario WHERE nombre='$userName'";
	$result = mysql_query($sql);  
	
	
	$con = mysql_fetch_object($result);
	
	$usuario2 = $con->nombre;

	if ($usuario2==null)
	{
			
		$pass=md5($userPassword);
		$rs = mysql_insert_id();

		$sql2="INSERT INTO usuario (idusuario, nombre, estatus, clave, nivel)";
      	$sql2 .= " VALUES (\"$rs\",\"$userName\",\"$userStatus\",\"$pass\",\"$userLevel\")";
      	mysql_query($sql2);
      	
      
	}
	else
	{
		$mens = "El usuario insertado ya existe, seleccione otro por favor";
    	header("Location: ../Vistas/newUserForm.php?error=$mens");
     	exit();
	}


}

header("Location: ../Vistas/newUserForm.php");
ob_end_flush();
 ?>