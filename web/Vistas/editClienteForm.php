<?php require("../include/header.php"); ?>
   

    <div class="container">
        <h3 class="info">Modificar Cliente</h3>
        <form name="newClientForm" method="post" class="clientForm" action="../Controladores/editCliente.php">
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td><h4 class="info">Nombres y Apellidos</h4></td>
                        <?php
                        include '../Modelo/conexion.php';
                        if(isset($_GET['id']))
                        {

                            $id=$_GET['id'];

                            $sql="SELECT * FROM cliente WHERE idcliente=$id";


                            $result = mysql_query($sql);
                            $cliente=mysql_fetch_array($result);


                            $nombre=$cliente['nombre'];
                            $direccion=$cliente['direccion'];
                            $telefono=$cliente['telefono'];
                            $fecha=$cliente['fecha_ing'];
                            $balance=$cliente['balance'];
                            $vendedor=$cliente['vendedor'];
                            $estatus=$cliente['estatus'];

                            $var=$fecha;
                            $cont=0;
                            for ($i=0; $i<4; $i++)
                            {
                                $year=$year.$var[$i];
                            }
                            for ($i=5; $i<7; $i++)
                            {
                                $month=$month.$var[$i];
                            }
                            for ($i=8; $i<10; $i++)
                            {
                                $day=$day.$var[$i];
                            }
                            $fecha=$day."/".$month."/".$year;

                            $name= "<td> <input  id='clientNameId' type='text' name='clientName' class='input-xxlarge form-control' placeholder='Nombres y Apellidos' value='$nombre'>
                                  <input style='display:none' name='id' value='".$id."'>
                            </td>";
                            echo $name;
                        }
                        else
                        {
                            // Mensaje de error
                        }
                        ?>

                    </tr>
                    <tr>
                        <td><h4 class="info">Direcci&oacuten</h4></td>

                        <td><input id="clientAddressId" type="text" name="clientAddress"  class="input-xxlarge form-control" <?php echo "value=$direccion"; ?> ></td>
                    <tr id="rowPhone">
                        <td><h4 class="info">Tel&eacutefono</h4></td>
                        <td> <input type="tel" name="clientPhone" id="clientPhoneId" class="inputPhone col-xs-6" placeholder="Teléfono +xx-xxxx-xxxx" <?php echo "value=$telefono"; ?>></td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Fecha</h4></td>
                        <td>
                            <div class="hero-unit">
                                <input  type="text" placeholder="Seleccione una fecha" class="col-xs-6" name="clientDate" id="example1"  <?php echo "value=$fecha"; ?>>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Balance</h4></td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input id="clientBalanceId" type="number" name="clientBalance" class="inputNumber col-xs-6" placeholder="Balance"  <?php echo "value=$balance"; ?>>
                            </div>
                        </td>
                    </tr>
                    <tr id="rowStatus">
                        <td><h4 class="info">Estatus</h4></td>
                        <td>
                            <select name="clientEstatus" class="col-xs-6" id="clientStatusId">
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
                    <tr id="rowSaler">
                        <td><h4 class="info">Vendedor</h4></td>
                        <td>
                            <select name="saler" class="inputSelect col-xs-6" id="clientSalerId">
                                <?php
                                include '../Modelo/conexion.php';
                                $sql="SELECT * FROM vendedor ";
                                $result = mysql_query($sql);

                                while ($row=mysql_fetch_array($result))
                                {
                                    if ($vendedor==$row['idvendedor'])
                                    {
                                        echo "<option value='".$row['idvendedor']."' selected>";
                                        echo $row['nombre'];
                                        echo "</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='".$row['idvendedor']."' >";
                                        echo $row['nombre'];
                                        echo "</option>";
                                    }

                                }
                                ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <td></td>
                        <td>
                            <input type="submit" class="btn-lg btn-primary" name="btn_aceptar" onclick="return clientFormValidation()" value="Modificar">
                        </td>
                        </th>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <?php require("../include/footer.php"); ?>
