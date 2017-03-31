<?php
	session_start();
	include '../Modelo/conexion.php';
	
	session_destroy();
	header("Location: ../index.php");
?>
