<?php require("../include/header.php"); ?>
<div class="container">
    <h3 class="info">Listado de Operaciones</h3>
    <form>
        <div class="container-fluid form-inline" style="margin-left: 15px; margin-bottom: 15px">
            <label><h4>Filtro</h4></label>
            <input class="form-search input-xxlarge" type="search" placeholder="Buscar" id="searchTerm" style="margin-left: 15px;margin-right: 650px" onkeyup="doSearch()">

                    <label style="margin-right: 20px" >
                        <h4>L&iacutemite</h4>
                    </label>
                    <select id="paginationSize" onchange="getValue()">
                    <?php 
                       
                        
                       
                        if (!isset($_GET['size']))
                        {
                            echo " 
                            <option value='50'>50</option>
                            <option value='20'>20</option>
                            <option value='10'>10</option>
                            <option value='2'>2</option>
                            ";

                        }
                       
                        else 
                         {
                            switch ($_GET['size']) 
                            {
                                case '50':
                                    echo " 
                                        <option d value='50' selecte>50</option>
                                        <option value='20'>20</option>
                                        <option value='10'>10</option>
                                        <option value='2'>2</option>
                                    ";

                                    break;
                                case '20':
                                    echo " 
                                        <option  value='50'>50</option>
                                        <option  value='20' selected>20</option>
                                        <option value='10'>10</option>
                                        <option value='2'>2</option>
                                    ";
                                    break;
                               case '10':
                                echo " 
                                    <option  value='50'>50</option>
                                    <option  value='20' selected>20</option>
                                    <option value='10'selected>10</option>
                                    <option value='2'>2</option>
                                ";
                                    break;
                                case '2':
                                echo " 
                                    <option  value='50'>50</option>
                                    <option  value='20' >20</option>
                                    <option value='10'>10</option>
                                    <option value='2' selected>2</option>
                                ";
                                    break;
                            }
                        }
                           
                    ?> 
                       
                    </select>
        </div>
    </form>

    <table class="table table-hover table-bordered" id="dataTable">
        <thead>
        <tr>
            <th><div class="text-center">#</div></th>
            <th>Documento</th>
            <th>Cliente</th>
            <th>Valor</th>
            <th>Fecha</th>
            <th>D&iacuteas</th>
            <th>N&uacutemero</th>
            <th>Origen</th>
            <th>Estatus</th>
            <th>Concepto</th>
            <th>Descripci&oacuten</th>
            <?php 
                    if ($_SESSION["nivel"]!=1 && $_SESSION["nivel"]!=2 && $_SESSION["nivel"]>=0 && $_SESSION["nivel"]<=6) 
                    {
                        echo  "<th>Acciones</th>";
                    }
            ?>
        </tr>
        </thead>
        <tbody>
            <?php 

                 include '../Modelo/conexion.php';
                $sql_coutn="SELECT count(*) FROM documento_cliente";
                $cant_row=mysql_query($sql_coutn);
                $cant_row=mysql_fetch_array($cant_row)[0];

                $size=50;
                if(isset($_GET['size']))
                    $size=$_GET['size'];

                if(isset($_GET['paginator']))
                {
                    $page=$_GET['paginator'];
                    $start=($page-1)*$size;
                   
                }
               else
                {
                    $page=1;
                    $start=0;
                }
  
                $sql="SELECT * FROM documento_cliente Limit $start,$size";
                
                $result = mysql_query($sql);   
                $cont=1; 
                   
                while ($row=mysql_fetch_array($result))
                {  

                    $iddocumento=$row["iddocumento"];
                    $sql2="SELECT  documento.nombre FROM `documento`
                    INNER JOIN documento_cliente ON documento_cliente.iddocumento = documento.iddocumento WHERE documento.iddocumento=$iddocumento";
                    $idcliente=$row["idcliente"];
                    $sql3="SELECT  cliente.nombre FROM `cliente`
                    INNER JOIN documento_cliente ON documento_cliente.idcliente = cliente.idcliente WHERE cliente.idcliente=$idcliente";
                    
                    $result1=mysql_query($sql2); 
                    $fila=mysql_fetch_array($result1);
                    $resultCliente=mysql_query($sql3); 
                    $nombreCliente=mysql_fetch_array($resultCliente);
                    
                    
                    echo "<tr>";
                    echo " <th scope='row'>".$cont."</th>";
                    echo " <td >".$fila['nombre']."</td>";
                    echo " <td >".$nombreCliente['nombre']."</td>";
                    echo " <td >".$row['valor']."</td>";
                    echo " <td >".$row['fecha']."</td>";
                    echo " <td >".$row['dias']."</td>";
                    echo " <td >".$row['numero']."</td>";
                    echo " <td >".$row['origen']."</td>";
                    echo " <td >".$row['estatus']."</td>";
                    echo " <td >".$row['concepto']."</td>";
                    echo " <td >".$row['detalle']."</td>";
                    
                    $modificar=" <td><a href='editOperationForm.php?iddocumento=$iddocumento&idcliente=$idcliente'><button type='button' class='btn btn-default'>
                        <i class='icon-edit' title='Editar' >Editar</i>
                    </button></a> </td>";
                    $eliminar="<td> <a href='../Controladores/deleteOperation.php?iddocumento=$iddocumento&idcliente=$idcliente&paginator=$page&size=$size'><button type='button' class='btn btn-default'>
                        <i class=' icon-remove' title='Eliminar'> Eliminar</i>
                    </button></a> </td>";
                 $string="<td>
                    <a href='editOperationForm.php?iddocumento=$iddocumento&idcliente=$idcliente'><button type='button' class='btn btn-default'>
                        <i class='icon-edit' title='Editar' >Editar</i>
                    </button></a>
                     <a href='../Controladores/deleteOperation.php?iddocumento=$iddocumento&idcliente=$idcliente&paginator=$page&size=$size'><button type='button' class='btn btn-default'>
                        <i class=' icon-remove' title='Eliminar'> Eliminar</i>
                    </button></a>
                </td>";
                    if ($_SESSION["nivel"]==0 ) 
                    {
                        echo $string;
                    }
                    else  if ($_SESSION["nivel"]==3 || $_SESSION["nivel"]==5) 
                    {
                       
                        if ($_SESSION["nivel"]==3 )
                         {


                            $date=date("Y")."-".date("m")."-".date("d");       
                            if ($date==$row['fecha']) {
                                 echo $modificar;
                            }
                            else
                            {
                                echo"<td>Sin Permiso</td>";
                            }
                        }
                        else
                        echo $modificar;
                    }
                     else  if ($_SESSION["nivel"]==4 || $_SESSION["nivel"]==6) 
                    {
                        if ($_SESSION["nivel"]==4 )
                         {


                            $date=date("Y")."-".date("m")."-".date("d");       
                            if ($date==$row['fecha']) {
                                 echo $eliminar;
                            }
                            else
                            {
                                echo"<td>Sin Permiso</td>";
                            }
                        }
                        else
                        echo $eliminar;
                    }
                    echo "</tr>";
                    $cont++;
                }   
             ?>
        </tbody>
    </table>

    <div class="container-fluid col-md-12 text-center">
        <ul class="pagination ">
            <?php 
                        
                if($_GET['paginator']>1  && isset($_GET['paginator']))
                {
                    $back=$_GET['paginator']-1;
                     echo" <li><a href='operationsView.php?paginator=$back&size=$size' >&laquo;</a></li>";
                }
                    
                for ($i=0; $i < $cant_row/$size; $i++) { 
                    $index=$i+1;
                   echo "<li><a href='operationsView.php?paginator=$index&size=$size'>".$index."</a></li>";
                   
                }

                if($_GET['paginator']<$cant_row/$size && $cant_row/$size>1)
                {
                        
                    $next=$_GET['paginator']+1;
                     echo" <li><a href='operationsView.php?paginator=$next&size=$size' >&raquo;</a></li>";
                }

             ?>
            </ul>
    </div>
</div>
 <script type="text/javascript">
         function getValue()
        {
           var element = document.getElementById('paginationSize');
           var index= element.selectedIndex;
           var value=element.options[index].value;

           location.replace('operationsView.php?size='+value+'&paginator=1');  
        }
    </script>
<?php require("../include/footer.php"); ?>