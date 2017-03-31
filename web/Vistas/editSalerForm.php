<?php require("../include/header.php"); ?>

    <div class="container-fluid">
        <h3 class="info">Modificar Vendedor</h3>
        <form name="newSaler" class="clientForm" action="../Controladores/editSaler.php" method="post">
            <table class="table tabs-left">
                <tr>
                    <td><h4 class="info">Nombre</h4></td>
                    <?php 
                        include '../Modelo/conexion.php';
                        if(isset($_GET['id']))
                        {

                            $id=$_GET['id'];
                          
                            $sql="SELECT * FROM vendedor WHERE idvendedor=$id";
                         
                            
                             $result = mysql_query($sql);
                             $cliente=mysql_fetch_array($result);
                             

                             $nombre=$cliente['nombre']; 
                            
                                
                            $name= "<td> <input id='salerNameId' type='text' name='salerName' class='input-xxlarge form-control' placeholder='Nombres y Apellidos' value='$nombre'>
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
                    <th>
                    <td></td>
                    <td>
                        <input type="submit" class="btn-lg btn-primary" name="btn_aceptar" onclick="return salerFormValidation()" value="Modificar">
                    </td>
                    </th>
                </tr>
            </table>
        </form>
    </div>

<?php require("../include/footer.php"); ?>