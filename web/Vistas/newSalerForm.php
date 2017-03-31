<?php require("../include/header.php"); ?>

    <div class="container">
        <h3 class="info">Registro de Vendedor</h3>
        <div class="col-md-8">
            <form name="newSaler" class="clientForm" action="../Controladores/newSaler.php" method="post">
                <table class="table tabs-left">
                    <tr>
                        <td><h4 class="info">Nombre</h4></td>
                        <td> <input type="text" id="salerNameId" name="salerName" class="input-xxlarge form-control" placeholder="Nombres y Apellidos"></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <input type="submit" class="btn-lg btn-primary mySubmit" name="btn_aceptar" onclick="return salerFormValidation()" value="Registrar">
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php require("../include/footer.php"); ?>