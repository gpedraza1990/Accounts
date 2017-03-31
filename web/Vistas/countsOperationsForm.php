<?php require("../include/header.php"); ?>
   

    <div class="container">
        <h3 class="info">Cuentas por Cobrar</h3>
        <form name="newForPayForm" class="forPayForm" action="../Controladores/cuentasPorCobrar.php" method="post">
            <table class="table">
                <tr id="rowCountsDocument">
                    <td><h4 class="info">Nombre de Documento</h4></td> 
                     <td>
                        <select name="documentType" class="inputSelect form-control" id="countsDocumentId">
                        <option  value="-1"> Seleccionar Documento</option>
                        <?php 
                            session_start();
                            include '../Modelo/conexion.php';
                            $sql="SELECT * FROM documento ";
                            $result = mysql_query($sql);    
                            
                            while ($row=mysql_fetch_array($result))
                            {  
                                echo "<option value='".$row['iddocumento']."' >";
                                echo $row['nombre'];
                                echo "</option>";
                            }   
                         ?>
                        </select>
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
                                echo "<option value='".$row['idcliente']."' >";
                                echo $row['nombre'];
                                echo "</option>";
                            }   
                         ?>
                        </select>
                    </td>
                    <td class="myLabel"><h4 class="info" style="margin-left: 50px">Origen</h4></td>
                    <td> <select name="operationOrigin" class="inputSelect form-control" id="countsOriginId" >
                            <option  value="-1"> Seleccionar Origen</option>
                            <option value="1">Suma </option>
                            <option value="0">Resta </option>
                            <select>
                    </td>
                </tr>
                <tr>

                    <td class="myLabel"><h4 class="info">Días</h4></td>
                    <td > <input type="number" id="countsDaysId" name="operationDays" class="inputNumber form-control " placeholder="Días" ></td>

                    </td>
                    <td class="myLabel"><h4 class="info" style="margin-left: 50px">Valor</h4></td>
                    <td ><div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="number" id="countsValueId" class="form-control" placeholder="Valor">
                        </div>
                    </td>
                </tr>                
            
                <tr>
                    <td><h4 class="info">Concepto</h4></td>
                    <td><textarea class="form-control"></textarea></td>
                    <td><h4 class="info" style="margin-left: 50px">Descripción</h4></td>
                    <td><textarea class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td class="myLabel"><h4 class="info">N&uacutemero</h4></td>
                    <td > <input type="number" name="numero" id="countsNumberId" class="inputNumber form-control " placeholder="Número"></td>
                     <td class="myLabel"><h4 class="info" style="margin-left: 50px">Fecha</h4></td>
                    <td>  
                        <div class="hero-unit">
                                <input  type="text" placeholder="Fecha" id="example1" class="form-control" name="operationDate">
                        </div>  
                    </td>
                </tr>                 
            </table>
            <table>
                <tr>                
                    <input type="submit" class="btn-lg btn-primary mySubmit" name="btn_aceptar" onclick="return countsFormValidation()" value="Registrar">
                </tr> 
            </table>
                      
        </form>
    </div>




      <?php require("../include/footer.php"); ?>

    



