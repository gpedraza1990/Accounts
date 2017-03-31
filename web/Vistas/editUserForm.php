<?php require("../include/header.php"); ?>

    <div class="container">
        <h3 class="info">Modificar Usuario</h3>

        <form name="newUserForm" class="userForm" action="../Controladores/editUser.php" method="post">
            <div class="col-md-8">
                <table class="table tabs-left">
                    <tr>
                        <td><h4 class="info">Usuario</h4></td>
                        <?php
                        include '../Modelo/conexion.php';
                        if(isset($_GET['id']))
                        {

                            $id=$_GET['id'];

                            $sql="SELECT * FROM usuario WHERE idusuario=$id";


                            $result = mysql_query($sql);
                            $usuario=mysql_fetch_array($result);

                            $nombre=$usuario['nombre'];
                            $clave=$usuario['clave'];
                            $nivel=$usuario['nivel'];
                            $estatus=$usuario['estatus'];


                            $name= "<td> <input id='userNameId' type='text' name='userName' class='input-xxlarge form-control' placeholder='Usuario' value='$nombre'>
                                  
                            </td>";
                            echo $name;
                        }
                        else
                        {
                            // Mensaje de error
                        }
                        if ($_GET['error'])
                            echo"<td> <h4 class='info'>".$_GET['error']."</h4></td>";
                        ?>

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
                        <td>
                            <select id="userStatusId" name="documentEstatus" class="inputSelect form-control" >
                                <option  value="-1"> Seleccionar Estatus</option>
                                <?php

                                if ($estatus)
                                {
                                    $status="<option value='1' selected>Activo</option>
                                            <option value='0'>Inactivo</option>";

                                }
                                else
                                {
                                    $status="<option value='1' selected>Activo</option>
                                            <option value='0' selected>Inactivo</option>";
                                }
                                echo $status;
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><h4 class="info">Permisos</h4></td>
                        <?php
                        echo "<td>
                              			<select id='userPrivilegesId' name='level' class='inputSelect form-control' >
                              				 <option  value='-1'> Seleccionar Permisos</option>";

                        switch ($nivel) {
                            case '0':
                                $stringTipo="<option value='0' selected>Administrador </option>
				                                <option value='1'>Consulta </option>
				                                <option value='2'>Registrar </option>
				                                <option value='3'>Modificar  del d&iacutea</option>
				                                <option value='4'>Eliminar del d&iacutea</option>
				                                <option value='5'>Modificar</option>
				                                <option value='6'>Eliminar</option>";
                                break;
                            case '1':
                                $stringTipo="<option value='0' >Administrador </option>
  		                                <option value='1' selected>Consulta </option>
  		                                <option value='2'>Registrar </option>
  		                                <option value='3'>Modificar  del d&iacutea</option>
  		                                <option value='4'>Eliminar del d&iacutea</option>
  		                                <option value='5'>Modificar</option>
  		                                <option value='6'>Eliminar</option>";
                                break;
                            case '2':
                                $stringTipo="<option value='0' >Administrador </option>
                                      <option value='1' >Consulta </option>
                                      <option value='2' selected>Registrar </option>
                                      <option value='3'>Modificar  del d&iacutea</option>
                                      <option value='4'>Eliminar del d&iacutea</option>
                                      <option value='5'>Modificar</option>
                                      <option value='6'>Eliminar</option>";
                                break;
                            case '3':
                                $stringTipo="<option value='0' >Administrador </option>
				                                <option value='1'>Consulta </option>
				                                <option value='2'>Registrar </option>
				                                <option value='3' selected>Modificar  del d&iacutea</option>
				                                <option value='4'>Eliminar del d&iacutea</option>
				                                <option value='5'>Modificar</option>
				                                <option value='6'>Eliminar</option>";
                                break;
                            case '4':
                                $stringTipo="<option value='0' >Administrador </option>
				                                <option value='1'>Consulta </option>
				                                <option value='2'>Registrar </option>
				                                <option value='3'>Modificar  del d&iacutea</option
				                                <option value='4' selected>Eliminar del d&iacutea</option>
				                                <option value='5'>Modificar</option>
				                                <option value='6'>Eliminar</option>";
                                break;

                            case '5':
                                $stringTipo="<option value='0' >Administrador </option>
				                                <option value='1'>Consulta </option>
				                                <option value='2'>Registrar </option>
				                                <option value='3'>Modificar  del d&iacutea</option>
				                                <option value='4'>Eliminar del d&iacutea</option>
				                                <option value='5' selected>Modificar</option>
				                                <option value='6'>Eliminar</option>";
                                break;
                            case '6':
                                $stringTipo="<option value='0' >Administrador </option>
				                                <option value='1'>Consulta </option>
				                                <option value='2'>Registrar </option>
				                                <option value='3'>Modificar  del d&iacutea</option>
				                                <option value='4'>Eliminar del d&iacutea</option>
				                                <option value='5'>Modificar</option>
				                                <option value='6' selected>Eliminar</option>";
                                break;

                            default:
                                $stringTipo="
				                                <option value='1'>Consulta </option>
				                                <option value='2'>Registrar </option>
				                                <option value='3'>Modificar  del d&iacutea</option>
				                                <option value='4'>Eliminar del d&iacutea</option>
				                                <option value='5'>Modificar</option>
				                                <option value='6'>Eliminar</option>";
                                break;
                        }
                        echo $stringTipo;
                        echo " </select> <input style='display:none' name='id' value='".$id."'></td>  ";
                        ?>

                        <!--                        <td>-->
<!--                            <select id="userPrivilegesId" name="level" class="inputSelect form-control" >-->
<!--                                <option value="-1">Seleccionar Permisos</option>-->
<!--                                --><?php
//                                if ($_SESSION["nivel"]==0 )
//                                {
//                                    echo "<option value='0'>Administrador</option>";
//                                }
//                                ?>
<!---->
<!--                                <option value="1">Consulta</option>-->
<!--                                <option value="2">Crear</option>-->
<!--                                <option value="3">Modificar del d&iacutea</option>-->
<!--                                <option value="4">Eliminar del d&iacutea</option>-->
<!--                                <option value="5">Modificar</option>-->
<!--                                <option value="6">Eliminar</option>-->
<!--                            </select>-->
<!--                        </td>-->
                    </tr>
                    <tr>
                        <th>
                        <td></td>
                        <td>
                            <input type="submit" class="btn-primary btn-lg" onclick="return userFormValidation()" name="btn_aceptar" value="Modificar">
                        </td>
                        </th>
                    </tr>
                </table>
            </div>
        </form>
    </div>
   <?php require("../include/footer.php"); ?>