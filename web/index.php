<?php

if(isset($_POST['btn_log']))
{
$usuario = $_POST['usuario'];
$pas = md5($_POST['pass']);
}
?>
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

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/formStyle.css">
  </head>

  <body>
  <div class="container">

    <form class="form-signin" method="post" action="Controladores/autenticar.php">
      <h2 class="form-signin-heading">Autenticaci&oacuten</h2>
      <label for="inputText" class="sr-only">Usuario</label>
      <input type="text" id="inputText" class="form-control" placeholder="Usuario" name="usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
      <div class="checkbox">
        <label>
          <input type="checkbox" value="Recordar"> Recordar
        </label>
      </div>
      <button class="btn btn-large btn-primary btn-block" name="btn_log" type="submit" >Entrar</button>
    </form>

  </div> <!-- /container -->

  </body> <!-- end body -->
</html>