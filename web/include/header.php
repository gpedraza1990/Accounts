<?php
session_start();
include '../Controladores/verificar.php';
?>

<!DOCTYPE html leng="es">
<html>
	<head>
		<title>T&iacutetulo de la p&aacutegina</title>
		<meta charset="utf-8">
		
		<meta http-equiv="X-UA-Compatible" ="" content="IE=edge">
	<meta name="viewport" content="width=divice-width, initial-sccale=1">
	<!-- The above 3 meta tags must come firts in the head; any other head 
	content must come after this tags -->

	<link rel="stylesheet" href="../css/datepicker.css">
<!--	<link rel="stylesheet" href="../css/bootstrap.css">-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/formStyle.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/sweetalert.css">

	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li ><a href="../Vistas/main_page.php">Inicio</a></li>
							<?php 
								$string="<li class='dropdown'>
								<a  class='dropdown-toggle' data-toggle='dropdown' >Administraci&oacuten <span class='caret'></span></a>
								<ul class='dropdown-menu'>
							 				<li> <a href='../Vistas/newUserForm.php'>Insertar Usuario</a> </li> 
							 				<li> <a href='../Vistas/userView.php'>Listar Usuario</a> </li> 
							 				
							 	</ul>
							</li>";

							if ($_SESSION["nivel"]==0) 
							{
								echo $string;
							}
							 ?>
							

							<li >
								<?php 
									$string='<a href="#" class="dropdown-toggle" data-toggle="dropdown">Registros <span class="caret"></span></a>
								<ul class="dropdown-menu">
					 				<li> <a href="../Vistas/newClientForm.php">Nuevo Cliente</a> </li> 
					 				<li> <a href="../Vistas/newDocumentForm.php">Nuevo Documento</a> </li> 
					 				<li> <a href="../Vistas/newSalerForm.php">Nuevo Vendedor</a> </li> 
					 				<li> <a href="../Vistas/countsOperationsForm.php">Cuentas por cobrar</a> </li> 
					 			</ul>';

					 			if ($_SESSION["nivel"]!=1 && $_SESSION["nivel"]>=0 && $_SESSION["nivel"]<=6) 
								{
									echo $string;
								}
						 			
								 ?>
								
								
							</li>
							<li  >
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Listados <span class="caret"></span></a>
								<ul class="dropdown-menu">
					 				<li> <a href="../Vistas/clientsView.php">Listado Cliente</a> </li> 
					 				<li> <a href="../Vistas/operationsView.php">Listado Operaciones</a> </li> 
					 				<li> <a href="../Vistas/documentView.php">Listado Documento</a> </li> 
					 				<li> <a href="../Vistas/salerView.php">Listado Vendedores</a> </li> 
					 			</ul>
							</li>

							<li   style="position: absolute; margin: 0em 80%;" >
								<a href="../Controladores/logout.php" >Salir </a>
							</li>
						</ul>
					</div>
					
				</div>
			</nav>	
		
		
		
	