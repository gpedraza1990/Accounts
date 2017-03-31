<?php require("../include/header.php"); ?>
    <div class="container">
        <h3 class="info">Modificar Documento</h3>
        <form name="newDocumentForm" class="clientForm" method="post" action="../Controladores/editDocument.php?paginator=$page&size=$size">
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <?php
                        include '../Modelo/conexion.php';
                        if(isset($_GET['id']))
                        {

                        $id=$_GET['id'];

                        $sql="SELECT * FROM documento WHERE iddocumento=$id";


                        $result = mysql_query($sql);
                        $documento=mysql_fetch_array($result);


                        $nombre=$documento['nombre'];
                        $secuencia=$documento['secuencia'];
                        $estatus=$documento['estatus'];
                        $origen=$documento['origen'];
                        $tipo=$documento['tipo'];
                        $page=$_GET['paginator'];
                        $size=$_GET['size'];
                        ?>


                        <td><h4 class="info">Nombre</h4></td>
                        <td> <input id="documentNameId" type="text" name="documentName" class="input-xxlarge form-control" placeholder="Nombre"  <?php echo "value=$nombre"; ?>></td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Documento</h4></td>
                        <?php

                            echo "<td>
                              		<select id='documentTypeId' name='tipo' class='inputSelect col-xs-6'>";


                            switch ($tipo) {
                                case '01':
                                    $stringTipo="<option value='01' selected>Facturas </option>
				                                <option value='02'>Pagos </option>
				                                <option value='03'>Ajustes de Cr&eacutedito </option>
				                                <option value='04'>Ajustes de D&eacutebito</option>";
                                    break;
                                case '02':
                                    $stringTipo="<option value='01'>Facturas </option>
				                                <option value='02' selected>Pagos </option>
				                                <option value='03'>Ajustes de Cr&eacutedito </option>
				                                <option value='04'>Ajustes de D&eacutebito</option>";
                                    break;
                                case '03':
                                    $stringTipo="<option value='01' >Facturas </option>
				                                <option value='02'>Pagos </option>
				                                <option value='03' selected>Ajustes de Cr&eacutedito </option>
				                                <option value='04'>Ajustes de D&eacutebito</option>";
                                    break;
                                case '04':
                                    $stringTipo="<option value='01' >Facturas </option>
				                                <option value='02'>Pagos </option>
				                                <option value='03'>Ajustes de Cr&eacutedito </option>
				                                <option value='04' selected>Ajustes de D&eacutebito</option>";
                                    break;
                                default:
                                    $stringTipo="<option value='01' >Facturas </option>
				                                <option value='02'>Pagos </option>
                                                <option value='03'>Ajustes de Cr&eacutedito </option>
                                                <option value='04'>Ajustes de D&eacutebito</option>";
                                    break;
                            }
                            echo $stringTipo;
                            echo " </select> <input style='display:none' name='id' value='".$id."'> </td>  ";
                        }
                        else
                        {
                            // Mensaje de error
                        }
                        ?>
                    </tr>
                    <tr>
                        <td><h4 class="info">Secuencia</h4></td>
                        <td> <input id="documentSecuenceId" type="number" name="documentSecuence" class="inputNumber col-xs-6" placeholder="Secuencia" <?php echo "value=$secuencia"; ?> ></td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Origen</h4></td>
                        <td>
                            <select id="documentOriginId" name="documentOrigin" class="inputSelect col-xs-6" >
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
                                <select>
                        </td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Estatus</h4></td>
                        <td>  <select id="documentStatusId" name="documentEstatus" class="inputSelect col-xs-6" >
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
                                <select>
                        </td>
                    </tr>
                    <tr>
                        <th>
                        <td></td>
                        <td>
                            <input type="submit" class="btn-lg btn-primary" name="btn_aceptar" onclick="return documentFormValidation()" value="Modificar">
                        </td>
                        </th>
                    </tr>
                </table>
            </div>
        </form>
    </div>

 <?php require("../include/footer.php"); ?>
