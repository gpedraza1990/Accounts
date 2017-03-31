<?php

if(isset($_POST['entrar']))
{
$usuario = $_POST['user'];
$pas = md5($_POST['pass']);
}
?>
<!DOCTYPE html>

  <head>
  <title>Centos Work</title>
  <meta charset="utf-8">
  </head>

  <body>
    <form name="form1" method="post" action="../Controladores/autenticar.php">

      <label>Usuario</label>
      <input type="text" id="ususrio" name="usuario"><br>

      <label>Contrase&ntilde;a:</label>
      <input type="password" name="pass" id="pass"><BR>

      <input name="btn_log" type="submit" onClick="return ValLogin()" value=" Inicio">

    </form> <!-- end form -->
  </body> <!-- end body -->
</html>
