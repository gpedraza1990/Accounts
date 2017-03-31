<?php
session_start(); 	
include '../Modelo/conexion.php';
header('Content-Type: text/html; charset=UTF-8');  

$usuario = $_POST['usuario'];
$pass = md5($_POST['pass']);
$_SESSION["login"]=false; // variable que creo para saber si el usuario se autentico o no.


$sql = "SELECT idusuario, nombre, estatus, clave, nivel  FROM usuario WHERE nombre='$usuario' and clave='$pass'";
$resultado = mysql_query($sql);
echo $resultado;
$fila = mysql_fetch_array($resultado);





if(isset($_POST['btn_log'])){ 

	if($fila)
	{
	    $_SESSION["login"]=true; // variable que creo para saber si el usuario se autentico o no.		
		$_SESSION["idusuario"] = $fila[0];
		$_SESSION["nombre"] = $usuario;
		$_SESSION["estatus"] = $fila[2];
		$_SESSION["clave"] = $fila[3];
		$_SESSION["nivel"] = $fila[4];		
		$_SESSION["autenticar"] = 1;		
		
        header("location:../Vistas/main_page.php");
		
			
	}	
	else
	{
			$_SESSION["login"]=false; // variable que creo para saber si el usuario se autentico o no.
			//$log = false;
			header("location:../Vistas/error_autenticacion.php");
			exit();	
	}
        
      
        
}
?>