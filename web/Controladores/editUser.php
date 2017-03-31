<?php 
include '../Modelo/conexion.php';


if (isset($_POST['btn_aceptar'])) 
{
	$userName=$_POST['userName'];
	$userStatus=$_POST['userStatus'];
	$userPassword=md5($_POST['userPassword']);
	$userLevel=$_POST['level'];
	
	$id=$_POST['id'];


	$sql2 = "UPDATE usuario 
				    SET nombre = \"".$userName."\",          			
					    clave = \"".$userPassword."\",
					    estatus = \"".$userStatus."\",
					    nivel = \"".$userLevel."\"
					    
			     WHERE idusuario = $id"; 	


    mysql_query($sql2);
      	
}
	

	header("Location: ../Vistas/userView.php");

?>