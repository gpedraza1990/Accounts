<?php
$conection = @mysql_pconnect("localhost","root","");

if (!$conection) 
    die('<strong>No pudo conectarse:</strong> ' . mysql_error());
$bd = mysql_select_db("cuentas",$conection);
?>
