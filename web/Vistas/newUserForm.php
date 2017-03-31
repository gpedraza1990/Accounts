<?php require("../include/header.php"); ?>
   
    <div class="container">
        <h3 class="info">Registro de Nuevo Usuario</h3>

        <form name="newUserForm" class="userForm" action="../Controladores/insertUser.php" method="post">
            <div class="col-md-8">
            <table class="table tabs-left">
                <tr>
                    <td><h4 class="info">Usuario</h4></td>
                    <td> <input id="userNameId" type="text" name="userName" class="input-xxlarge form-control" placeholder="usuario"></td>
                </tr>
                 <tr>
                    <td><h4 class="info">Contrase&ntilde;a</h4></td>
                    <td>                     
                    <input type="password" name="userPwd" id="userPwdId" class="inputPassword form-control" placeholder="Contraseña" >
                    </td>
                </tr>
                 <tr>
                    <td><h4 class="info">Repetir Contrase&ntilde;a</h4></td>
                    <td> <input type="password" id="userRepeatPwdId" class="inputPassword form-control" placeholder="Contraseña"></td>
                </tr>
                <tr>
                    <td><h4 class="info">Estatus</h4></td>
                     <td>  <select id="userStatusId" name="documentEstatus" class="inputSelect form-control" >
                                <option  value="-1"> Seleccionar Estatus</option>
                                <option value="1">Activo </option>
                                <option value="0">No Activo </option>
                        <select>
                    </td>
                </tr>
               
                <tr>
                    <td><h4 class="info">Permisos</h4></td>
                    <td>
                        <select id="userPrivilegesId" name="level" class="inputSelect form-control" >
                            <option value="-1">Seleccionar Permisos</option>
                            <?php 
                                if ($_SESSION["nivel"]==0 ) 
                                {
                                    echo "<option value='0'>Administrador</option>";
                                }
                             ?>
                           
                            <option value="1">Consulta</option>
                            <option value="2">Crear</option>
                            <option value="3">Modificar del d&iacutea</option>
                            <option value="4">Eliminar del d&iacutea</option>
                            <option value="5">Modificar</option>
                            <option value="6">Eliminar</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        <td></td>
                        <td>
                            <input type="submit" class="btn-primary btn-lg" onclick="return userFormValidation()" name="btn_aceptar" value="Registrar">
                        </td>
                    </th>
                </tr>
            </table>
            </div>
        </form>
    </div>

   <?php require("../include/footer.php"); ?>