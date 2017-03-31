<?php require("../include/header.php"); ?>
   

    <div class="container">
        <h3 class="info">Registro de Cliente</h3>
        <form id="newClientForm" name="newClientForm" method="post" class="clientForm" action="../Controladores/newClient.php">
            <div class="col-md-8">
                <table class="table">
                    <tr>
                        <td><h4 class="info">Nombres y Apellidos</h4></td>
                        <td>
                            <div class="clientNameClass">
                                <input type="text" id="clientNameId" name="clientName" class="input-xxlarge form-control" placeholder="Nombres y Apellidos">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Direcci&oacuten</h4></td>
                        <td>
                            <div class="clientAddressClass">
                                <input type="text" id="clientAddressId" name="clientAddress" placeholder="Dirección" class="input-xxlarge form-control">
                            </div>
                        </td>
                    </tr>
                    <tr id="rowPhone">
                        <td><h4 class="info">Tel&eacutefono</h4></td>
                        <td> <input type="tel" id="clientPhoneId" name="clientPhone" class="inputPhone col-xs-6" placeholder="Teléfono +xx-xxxx-xxxx"></td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Fecha</h4></td>
                        <td>

                            <div class="hero-unit">
                                <input  type="date" placeholder="Fecha"  class="col-xs-6 " name="clientDate" id="example1" >
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Balance</h4></td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="number" name="clientBalance" id="clientBalanceId" class="col-xs-6" placeholder="Balance" >
                            </div>
                        </td>
                    </tr>
                    <tr id="rowStatus">
                        <td><h4 class="info">Estatus</h4></td>
                        <td>  
                            <select name="clientEstatus" id="clientStatusId" class="inputSelect col-xs-6" >
                                <option  value="-1"> Seleccionar Estatus</option>
                                <option value="1">Activo </option>
                                <option value="0">No Activo </option>
                                <select>
                        </td>
                    </tr>                    
                    <tr id="rowSaler">
                        <td><h4 class="info">Vendedor</h4></td>
                        <td>
                            <select name="saler" id="clientSalerId" class="inputSelect col-xs-6" >
                                <option  value="-1"> Seleccionar Vendedor</option>
                                <?php
                                include '../Modelo/conexion.php';
                                $sql="SELECT * FROM vendedor ";
                                $result = mysql_query($sql);

                                while ($row=mysql_fetch_array($result))
                                {
                                    echo "<option value='".$row['idvendedor']."' >";
                                    echo $row['nombre'];
                                    echo "</option>";
                                }
                                ?>

                            </select>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <input type="submit" id="myBtn" class="btn-lg btn-primary mySubmit" name="btn_aceptar" onclick="return clientFormValidation()" value="Registrar">
                    </tr>
                </table>
            </div>




        </form>
    </div>




    </div>
    <?php require("../include/footer.php"); ?>
