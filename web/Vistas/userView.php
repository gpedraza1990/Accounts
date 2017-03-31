<?php require("../include/header.php"); ?>

    <div class="container-fluid">
        <h3 class="info">Listado de Usuarios</h3>
        <form>
            <div class="container-fluid form-inline" style="margin-left: 15px; margin-bottom: 15px;display: inline-block">

                    <label>
                        <h4>Filtro</h4>
                    </label>
                    <input class="form-search input-xxlarge" type="search" placeholder="Buscar" id="searchTerm" style="margin-left: 15px;margin-right: 650px" onkeyup="doSearch()">

                    <label style="margin-right: 20px" >
                        <h4>Limite</h4>
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
                <th>Nombre</th>
                <th>Estatus</th>
                <th>Nivel de Acceso</th>
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
                $sql_coutn="SELECT count(*) FROM usuario";
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
  
                $sql="SELECT * FROM usuario Limit $start,$size";
               
                $result = mysql_query($sql);   
                $cont=1; 
                
                while ($row=mysql_fetch_array($result))
                {
                   
                    
                    $result1=mysql_query($sql); 
                    $fila=mysql_fetch_array($result1);
                    
                    $id=$row["idusuario"];
                 
                    switch ($row['nivel']) {
                    	case '0':
                    		  $tipo="Administrador";
                    		break;
                    	case '1':
                    		  $tipo="Consulta";
                    		break;
                    	case '2':
                    		  $tipo="Registrar";
                    		break;
                    	case '3':
                    		  $tipo="Modificar  del d&iacutea";
                    		break;
                        case '4':
                              $tipo="Eliminar del d&iacutea";
                            break;
                         case '5':
                              $tipo="Modificar";
                            break;           
                        case '6':
                              $tipo="Eliminar";
                            break;     
                         default:
                          $tipo="Consulta";
                          break;   
                    	
                    };

                     switch ($row['estatus']) {
                        case '0':
                              $estatus="No Activo";
                            break;
                        case '1':
                              $estatus="Activo";
                            break;                        
                    };
                    

                    echo "<tr>";
                    echo " <th scope='row'>".$cont."</th>";
                    echo " <td >".$row['nombre']."</td>";
                    echo " <td >".$estatus."</td>";
                    echo " <td >".$tipo."</td>";
                     
                    
                    $modificar=" <td><a href='editUserForm.php?id=$id'><button type='button' class='btn btn-default'>
                        <i class='icon-edit' title='Editar' >Editar</i>
                    </button></a> </td>";
                    $eliminar="<td> <a href='../Controladores/deleteUser.php?id=$id&paginator=$page&size=$size'><button type='button' class='btn btn-default'>
                        <i class=' icon-remove' title='Eliminar'> Eliminar</i>
                    </button></a> </td>";
                 $string="<td>
                    <a href='editUserForm.php?id=$id'><button type='button' class='btn btn-default'>
                        <i class='icon-edit' title='Editar' >Editar</i>
                    </button></a>
                     <a href='../Controladores/deleteUser.php?id=$id&paginator=$page&size=$size'><button type='button' class='btn btn-default'>
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
                            if ($date==$row['fecha_ing']) {
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
                            if ($date==$row['fecha_ing']) {
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
                     echo" <li><a href='userView.php?paginator=$back&size=$size' >&laquo;</a></li>";
                }
                    
                for ($i=0; $i < $cant_row/$size; $i++) { 
                    $index=$i+1;
                   echo "<li><a href='userView.php?paginator=$index&size=$size'>".$index."</a></li>";
                   
                }

                if($_GET['paginator']<$cant_row/$size && $cant_row/$size>1)
                {
                        
                    $next=$_GET['paginator']+1;
                     echo" <li><a href='userView.php?paginator=$next&size=$size' >&raquo;</a></li>";
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

           location.replace('userView.php?size='+value+'&paginator=1');  
        }
    </script>
<?php require("../include/footer.php"); ?>