<?php require("../include/header.php"); ?>



<div class="container">
    <h3 class="info">Cuentas por Cobrar</h3>
    <form name="newForPayForm" class="forPayForm" action="../Controladores/cuentasPorCobrar.php" method="post">
        <table class="table">
            <tr id="rowCountsDocument">
                <td><h4 class="info">Nombre de Documento</h4></td>
                <td>

                    <?php
                    include '../Modelo/conexion.php';
                    if(isset($_GET['iddocumento']) && isset($_GET['idcliente']))
                    {


                        $iddocumento=$_GET['iddocumento'];
                        $idcliente=$_GET['idcliente'];

                        $sql="SELECT * FROM documento_cliente WHERE iddocumento=$iddocumento AND idcliente=$idcliente";

                        $result = mysql_query($sql);
                        $documento_cliente=mysql_fetch_array($result);


                        $numero=$documento_cliente['numero'];
                        $fecha=$documento_cliente['fecha'];
                        $estatus=$documento_cliente['estatus'];
                        $origen=$documento_cliente['origen'];
                        $valor=$documento_cliente['valor'];
                        $concepto=$documento_cliente['concepto'];
                        $detalle=$documento_cliente['detalle'];
                        $dias=$documento_cliente['dias'];

                        $var=$fecha;

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

                    }
                    ?>

                    <select name="documentType" class="inputSelect form-control" id="countsDocumentId">
                        <option  value="-1"> Seleccionar Documento</option>
                        <?php

                        $sql="SELECT * FROM documento";
                        $result = mysql_query($sql);

                        while ($row=mysql_fetch_array($result))
                        {

                            if ($iddocumento==$row['iddocumento'])
                            {
                                echo "<option value='".$row['iddocumento']."' selected >";
                                echo $row['nombre'];
                                echo "</option>";
                            }
                            else
                            {
                                echo "<option value='".$row['iddocumento']."' >";
                                echo $row['nombre'];
                                echo "</option>";
                            }

                        }
                        ?>
                    </select>
                    <?php
                    echo"	<input style='display:none' name='iddocumento' value='".$iddocumento."'> 
                                <input style='display:none' name='idcliente' value='".$idcliente."'>";
                    ?>
                </td>
                <td class="myLabel"><h4 class="info" style="margin-left: 50px">Estatus</h4></td>
                <td>  <select name="operationStatus" class="inputSelect form-control" id="countsStatusId">
                        <option  value="-1"> Seleccionar Estatus</option>
                        <option value="1">Activo </option>
                        <option value="0">Inactivo </option>
                        <select>
                </td>

            </tr>
            <tr id="rowCountsClient">
                <td><h4 class="info">Cliente</h4></td>
                <td>
                    <select name="client" class="inputSelect form-control input-xxlarge" id="countsClientId">

                        <option  value="-1"> Seleccionar Cliente</option>
                        <?php
                        include '../Modelo/conexion.php';
                        $sql="SELECT * FROM cliente ";
                        $result = mysql_query($sql);

                        while ($row=mysql_fetch_array($result))
                        {
                            if ($idcliente==$row['idcliente'])
                            {
                                echo "<option value='".$row['idcliente']."' selected >";
                                echo $row['nombre'];
                                echo "</option>";
                            }
                            else
                            {
                                echo "<option value='".$row['idcliente']."' >";
                                echo $row['nombre'];
                                echo "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
                <td class="myLabel"><h4 class="info" style="margin-left: 50px">Origen</h4></td>
                <td> <select name="operationOrigin" class="inputSelect form-control" id="countsOriginId" >
                        <option  value="-1"> Seleccionar Origen</option>
                        <?php
                        if ($origen)
                        {
                            $origin="<option value='1' selected>Activo</option>
	                                            <option value='0'>Inactivo</option>";

                        }
                        else
                        {
                            $origin="<option value='1' selected>Activo</option>
	                                            <option value='0' selected>Inactivo</option>";
                        }
                        echo $origin;
                        ?>
                        </select>
                </td>
            </tr>
            <tr>

                <td class="myLabel"><h4 class="info">Días</h4></td>
                <td > <input type="number" id="countsDaysId" name="operationDays" class="inputNumber form-control " placeholder="Días" <?php echo "value=$dias"; ?>></td>

                </td>
                <td class="myLabel"><h4 class="info" style="margin-left: 50px">Valor</h4></td>
                <td ><div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="number" id="countsValueId" class="form-control" placeholder="Valor"  <?php echo "value=$valor"; ?> >
                    </div>
                </td>
            </tr>

            <tr>
                <td><h4 class="info">Concepto</h4></td>
                <td><textarea class="form-control"><?php echo "$concepto"; ?></textarea></td>
                <td><h4 class="info" style="margin-left: 50px">Descripción</h4></td>
                <td><textarea class="form-control"><?php echo "$detalle"; ?></textarea></td>
            </tr>
            <tr>
                <td class="myLabel"><h4 class="info">N&uacutemero</h4></td>
                <td > <input type="number" name="numero" id="countsNumberId" class="inputNumber form-control " placeholder="Número" <?php echo "value=$numero"; ?>></td>
                <td class="myLabel"><h4 class="info" style="margin-left: 50px">Fecha</h4></td>
                <td>
                    <div class="hero-unit">
                        <input  type="text" placeholder="Fecha" id="example1" class="form-control" name="operationDate" <?php echo "value=$fecha"; ?>>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <input type="submit" class="btn-lg btn-primary mySubmit" name="btn_aceptar" onclick="return countsFormValidation()" value="Modificar">
            </tr>
        </table>

    </form>
</div>


      <?php require("../include/footer.php"); ?>

    



