<?php require("../include/header.php"); ?>
    <div class="container ">
        <h3 class="info">Registro de Documento</h3>
        <form name="newDocumentForm" class="clientForm" method="post" action="../Controladores/newDocument.php">
            <div class="col-md-8">
                <table class="table tabs-left">
                    <tr>
                        <td><h4 class="info">Nombre</h4></td>
                        <td> <input type="text" id="documentNameId" name="documentName" class="form-control" placeholder="Nombre" required autofocus></td>
                    </tr>
                    <tr id="rowType">
                        <td><h4 class="info">Documento</h4></td>
                        <td>
                            <select name="tipo" class="inputSelect col-xs-6" id="documentTypeId" required autofocus>
                                <option  value="-1"> Seleccionar Documento</option>
                                <option value="01">Facturas </option>
                                <option value="02">Pagos </option>
                                <option value="03">Ajustes de Cr&eacutedito </option>
                                <option value="04">Ajustes de D&eacutebito</option>
                                <select>
                        </td>
                    </tr>
                    <tr>
                        <td><h4 class="info">Secuencia</h4></td>
                        <td> <input type="number" id="documentSecuenceId" name="documentSecuence" class="inputNumber col-xs-6" placeholder="Secuencia" autofocus required></td>
                    </tr>
                    <tr id="rowOrigin">
                        <td><h4 class="info">Origen</h4></td>
                        <td>
                            <select name="documentOrigin" class="inputSelect col-xs-6" id="documentOriginId" required autofocus>
                                <option  value="-1"> Seleccionar Origen</option>
                                <option value="1">Suma </option>
                                <option value="0">Resta </option>
                                <select>
                        </td>
                    </tr>
                    <tr id="rowStatus">
                        <td><h4 class="info">Estatus</h4></td>
                        <td>  <select name="documentEstatus" class="inputSelect col-xs-6" id="documentStatusId" required autofocus>
                                <option  value="-1"> Seleccionar Estatus</option>
                                <option value="1">Activo </option>
                                <option value="0">No Activo </option>
                                <select>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <input type="submit" class="btn-lg btn-primary mySubmit" name="btn_aceptar" onclick="return documentFormValidation()" value="Registrar">
                    </tr>
                </table>
            </div>
        </form>
    </div>

 <?php require("../include/footer.php"); ?>
