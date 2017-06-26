<!DOCTYPE html>
<html>
<head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css" />
      <link rel="stylesheet" href="css/alertify.css">
      <link rel="stylesheet" href="css/default.css">
      <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
     
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/alertify.js"></script>
      <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
      <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
      <script src="js/funciones.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("#tablas").tablesorter();
});
</script>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker2').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#ACTUALIZAR').click(function(){
      nombre = $('#nombre').val();
      apellidos = $('#apellidos').val();
      telefono = $('#telefono').val();
      producto = $('#producto').val();
      cn = $('#codigoN').val();
      unidades = $('#unidades').val();
      observaciones = $('#observa').val();
      agregardatos(nombre,apellidos,telefono,producto,cn,unidades,observaciones);
    });
      $('#botonAtras').click(function(){
          window.location="index.php";
      });

      $('#actualizarDatos').click(function(){

      id = $('#idpersona').val();
      nombre = $('#nombre').val();
      apellidos = $('#apellidos').val();
      telefono = $('#telefono').val();
      producto = $('#producto').val();
      cn = $('#codigoN').val();
      unidades = $('#unidades').val();
      observaciones = $('#observa').val();
      
      actualizarDatos(id,nombre,apellidos,telefono,producto,cn,unidades,observaciones);
      });

       $('#actualizarServicios').click(function(){

      id = $('#id2').val();
      nombre = $('#nombre2').val();
      apellidos = $('#apellidos2').val();
      telefono = $('#telefono2').val();
      confirmado = $('#confi2').val();
      fecha = $('#fecha2').val();
     
      actualizarSer(id,nombre,apellidos,telefono,confirmado,fecha);
    });
   });

</script>

</head>

<body>

<?php
  include("conexion.php");

if(isset($_POST["ENCARGOS"])){
?>

  <div class="container">
    <div id='contenedor3'>
        <h1><strong>AGREGAR ENCARGO</strong></h1>
            <div class='row'>
              <div class='col-xs-3'>
                <form name='REGISTRO' method='POST' action='procesos.php?accion=1' enctype='multipart/form-data'>

                  <select class='form-control' placeholder='.col-xs-3' name='empleado'>
                  <option value='ANGEL'>ANGEL</option>
                  <option value='MAR'>MAR</option>
                  <option value='PAZ'>PAZ</option>
                  <option value='EMILIO'>EMILIO</option>
                  <option value='GLORIA'>GLORIA</option>
                  <option value='YESI'>YESI</option>
                  <option value='JORGE'>JORGE</option>
                  <option value='NURIA'>NURIA</option>
                  <option value='ANA'>ANA</option>
                  <option value='DANI'>DANI</option>
                  <option value='MARIA'>MARIA</option>
                  </select>
                </div>
                  <div class='col-xs-3'>
                  <input type='text' class='form-control' placeholder='NOMBRE CLIENTE' name='nombre'>
                </div>
                <div class='col-xs-3'>
                  <input type='text' class='form-control' placeholder='APELLIDOS CLIENTE' name='apellidos'>
                </div>
                <div class='col-xs-3'>
                  <input type='text' class='form-control' placeholder='TELÉFONO CLIENTE' name='telefono'>
                </div>
              </div>

                <div class='col'>
                  <div class='col-xs-3'>
                    <input type='text' class='form-control' placeholder='PRODUCTO' name='producto'>
                  </div>
                  <div class='col-xs-3'>
                    <input type='text' class='form-control' placeholder='CODIGO NACIONAL' name='codigoNaci'>
                  </div>
                  <div class='col-xs-3'>
                    <input type='number' class='form-control' placeholder='UNIDADES' required name='unidades'>
                  </div>
                  <div class='col-xs-3'>
                    <select class='form-control' placeholder='.col-xs-3' name='proveedor'>
                    <option value='HEFAME'>HEFAME</option>
                    <option value='ALLIANCE'>ALLIANCE</option>
                    <option value='COFAMASA'>COFAMASA</option>
                    <option value='ACTIBIOS'>ACTIBIOS</option>
                    <option value='ORTOPEDIA'>ORTOPEDIA</option>
                    </select>
                  </div>
                </div>


                OBSERVACIONES:<br>
                <textarea class='form-control' rows='10' name='observa'></textarea><br><br>
                  <button type='submit' class='btn btn-primary btn-lg' name='registrar'>REGISTRAR</button>
                </form>
                <form name='ATRAS' method='POST' action='index.php' enctype='multipart/form-data'>
                  <button type='submit' class='btn btn-primary btn-lg' name='vovler'>ATRÁS</button>
                </form>
            </div>
          </div>
    <?php
        }
        else if(@$_GET["accion"] == 1){    //REGISTRO DE ENCARGOS
          $empleado = @$_POST["empleado"];
          $nombre = @$_POST["nombre"];
          $apellidos = @$_POST["apellidos"];
          $telf = @$_POST["telefono"];
          $producto = @$_POST["producto"];
          $codigoNaci = @$_POST["codigoNaci"];
          $unidades = @$_POST["unidades"];
          $estado = @$_POST["pedido"];
          $proveedor = @$_POST["proveedor"];
          $observaciones = @$_POST["observa"];
          $fecha = date("Y-m-d H:i");

         $resultado = mysqli_query($enlace,"CALL REGISTRO_ENCARGO('$empleado','$nombre','$apellidos','$telf','$producto','$codigoNaci',$unidades,'$proveedor','$fecha','$observaciones')");

         if(resultado)
         {
             echo "<script> alert('ENCARGO REGISTRADO') ; window.location='index.php';</script>";
         }
         else 
         {
            echo "<script> alert('FALLO EN REGISTRO, VUELVA A INTENTARLO') ; window.location='procesos.php?ENCARGOS';</script>";
         }
         

        }
      else if(isset($_POST["BUSCAR"])){
    ?>
        <div class="container">
          <div id='contenedor3'>
              <h1>BUSCAR</h1>
            <div class='row'>
              <div class='col-xs-5'>
                <form name='F1' method='POST' action='procesos.php?accion=5'>
                  <button type='submit' class='btn btn-primary btn-lg' name='vovler'>SERVICIOS</button></form>
              </div>
              <div class='col-xs-2'>
                <form name='F2' method='POST' action='procesos.php?accion=4'>
                  <button type='submit' class='btn btn-primary btn-lg' name='vovler'>ENCARGOS</button></form>
              </div>
              <div class='col-xs-5'>
                <form name='F2' method='POST' action='index.php'>
                  <button type='submit' class='btn btn-primary btn-lg' name='vovler'>INICIO</button></form>
              </div>
            </div>
          </div>

    <?php
      }

    else if(isset($_POST["SERVICIOS"])){
  ?>
    <div class="container">
      <div id='contenedor3'>
        <h1><strong>AGREGAR SERVICIO</strong></h1>

              <form name='REGISTRO' method='POST' action='procesos.php?accion=3'>
              <label>NOMBRE</label>
              <input id='texto' type='text'  name='nombre'><br><br>
              <label>APELLIDOS</label>
              <input id='texto' type='text'  name='apellidos'><br><br>
              <label>TELEFONO</label>
              <input id='texto' type='text'  name='telefono'><br><br>
              <label>FECHA/HORA</label>
              <div id='datetimepicker1' class='input-append date'>
                    <input data-format='yyyy/MM/dd hh:mm' type='text' name='fecha' placeholder='FECHA/HORA INICIAL'></input>
                      <span class='add-on'>
                      <i data-time-icon='icon-time' data-date-icon='icon-calendar'></i>
                      </span>
                  </div>
              <label>SERVICIO</label>
              <select name='servicio'>
              <option value='1'>DIETÉTICA</option>
              <option value='2'>ESTÉTICA</option>
              </select></br></br>
             <button type="submit" class="btn btn-primary btn-lg" name="registrar">REGISTRAR</button><br>
            </form>
              <button id="botonAtras" class="btn btn-primary btn-lg">ATRAS</button>
        </div>
      </div>
<?php
    }
    else if(@$_GET["accion"] == 3){    //AGREGA CONTACTOS
      $nombre = @$_POST["nombre"];
      $apellidos = @$_POST["apellidos"];
      $telf = @$_POST["telefono"];
      $fecha  = @$_POST["fecha"];
      $hora = @$_POST["hora"];
      $servicio = @$_POST["servicio"];
    
            
          $valor = mysqli_query($enlace,"SELECT REGISTRO_SERVICIO('$nombre','$apellidos','$telf','$servicio','$fecha')");

          $valores = mysqli_fetch_array($valor);
            echo $valores[0];

          if($valores[0] == 1)
          {
            echo "<script> alert('SERVICO REGISTRADO'); window.location='index.php';</script>";
          }
          else
          {
            echo "<script> alert('DIA Y HORA OCUPADA, VUELVA A INTENTARLO'); window.location='index.php';</script>";
          }
            
?>


<?php
    }
      else if(@$_GET["accion"] == 4){
    ?>
  <div class="container">
    <div id='contenedor3'>
      <h1><strong>BUSCAR ENCARGO</strong></h1>
          <form name='REGISTRO' method='POST' action='procesos.php?accion=6'>
              <div class='row'>
                <div class='col-xs-3'>
                  <input type='text' class='form-control' placeholder='NOMBRE CLIENTE' name='nombre'>
                </div>
                <div class='col-xs-3'>
                  <input type='text' class='form-control' placeholder='APELLIDOS CLIENTE' name='apellidos'>
                </div>
                <div class='col-xs-3'>
                  <input type='text' class='form-control' placeholder='PRODUCTO' name='producto'>
                </div>
                <div class='col-xs-3'>
                  <input type='text' class='form-control' placeholder='CODIGO NACIONAL' name='codigoNaci'>
                </div>
              </div>

              <div class='row'>
                <div class='col-xs-7'>
                  <div id='datetimepicker1' class='input-append date'>
                    <input data-format='yyyy/MM/dd hh:mm' type='text' name='fechaini' placeholder='FECHA/HORA INICIAL'></input>
                      <span class='add-on'>
                      <i data-time-icon='icon-time' data-date-icon='icon-calendar'></i>
                      </span>
                  </div>
                </div>
              <div class='col-xs-1'>
                  <div id='datetimepicker2' class='input-append date'>
                    <input data-format='yyyy/MM/dd hh:mm' type='text' name='fechafin' placeholder='FECHA/HORA FINAL'></input>
                    <span class='add-on'>
                    <i data-time-icon='icon-time' data-date-icon='icon-calendar'></i>
                    </span>
                  </div>
              </div>
            </div>
              <br><br>
                  <button type='submit' class='btn btn-primary btn-lg' name='buscar'>BUSCAR</button>
                </form>
        </div>
      </div>
    <?php
      }
      else if(@$_GET["accion"] == 6){
              $nombre = @$_POST["nombre"];
              $apel = @$_POST["apellidos"];
              $producto = @$_POST["producto"];
              $codigoN = @$_POST["codigoNaci"];
              $fechaini = @$_POST["fechaini"];
              $fechafin = @$_POST["fechafin"];
                  if($fechaini == '' && $fechafin == '') //solución para los casos en que devuelve falso la consulta a la bbdd
                  {
                    $fechaini = '9999/12/30';
                    $fechafin = '9999/12/30';
                  }

            $buscar = mysqli_query($enlace, "CALL CONSULTA_PRODUCTOS('$nombre','$apel','$producto','$codigoN','$fechaini','$fechafin')");


              
      ?>
        
              
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
                      </div>
                      <div class="modal-body">
                          <input  hidden="" id="idpersona" name="">
                         <label>Nombre</label>
                          <input type="" name=""  id="nombre">
                          <label>Apellidos</label>
                          <input type="" name="" id="apellidos">
                          <label>Telefono</label>
                          <input type="" name="" id="telefono">
                          <label>Producto</label>
                          <input type="" name="" id="producto">
                          <label>C.N.</label>
                          <input type="" name="" id="codigoN">
                          <label>Unidades</label>
                          <input type="" name="" id="unidades">
                          <label>Observaciones</label>
                          <input type="" name="" id="observa">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CERRAR</button>
                        <button type="button"  class="btn btn-primary" id="actualizarDatos">ACTUALIZAR</button>
                       </div>
                      </div>
                    </div>
                  </div>
                    <div class='container'>
                      <div id='tabla'>

                        <div class='row'>
                          <div class'col-sm-12'>
                              <h2>RESULTADOS</h2>
                            <table class='table table-hover table-condensed table-bordered'>
                          <tr>
                            <th>EMPLEADO</th>
                            <td>NOMBRE</td>
                            <td>APELLIDOS</td>
                            <td>TELEFONO</td>
                            <td>PRODUCTO</td>
                            <td>C.N.</td>
                            <td>UDS</td>
                            <td>PROVEEDOR</td>
                            <td>FECHA/HORA</td>
                            <td>OBSERVACIONES</td>
                            <td>MODIFICAR</td>

                          </tr>
                <?php
                while($fila = mysqli_fetch_array($buscar)){
                  $id = $fila["id"] ."||".
                        $fila["nombre"] ."||".
                        $fila["apellidos"] ."||".
                        $fila["telef"] ."||".
                        $fila["producto"] ."||".
                        $fila["cn"] ."||".
                        $fila["unidades"] ."||".
                    $fila["observaciones"];
                     ?> 
                <tr>
                      <td><?php echo $fila[1] ?></td>
                      <td><?php echo $fila[2] ?></td>
                      <td><?php echo $fila[3] ?></td>
                      <td><?php echo $fila[4] ?></td>
                      <td><?php echo $fila[5] ?></td>
                      <td><?php echo $fila[6] ?></td>
                      <td><?php echo $fila[7] ?></td>
                      <td><?php echo $fila[8] ?></td>
                      <td><?php echo $fila[11] ?></td>
                      <td><?php echo $fila[12] ?></td>
                      <td> <button type="button" class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#myModal" onclick="mostrarForm('<?php echo $id ?>')"></button> 
                      </td>
                    </tr>
               <?php
                    }
                 
                ?>
                  </table>
                </div>
              </div>
            </div>
          </div>

<?php
      }
      else if($_GET["accion"]==10){
         $cod = $_POST["id"];
            mysqli_query($enlace, "UPDATE encargos SET dispensado = 'SI' where id='$cod'");
      ?>
            <script>alert('PRODUCTO DISPENSADO');
            window.location='index.php';</script>
<?php
      }
      else if($_GET["accion"]==5){
      ?>
      <div class="container">
        <div id='contenedor3'>

                <h1><strong>BUSCAR SERVICIO</strong></h1>
              
                <form name='REGISTRO' method='POST' action='procesos.php?accion=11'>

                <label>NOMBRE</label>
                <input id='texto' type='text'  name='nombre'>
                <label>APELLIDOS</label>
                <input id='texto' type='text'  name='apellidos'><br><br>
                <label>SERVICIO</label>
                <select name='servicio'>
                <option value='3'>N/A</option>
                <option value='1'>DIETÉTICA</option>
                <option value='2'>ESTÉTICA</option>
                </select>
                <label>FECHA/HORA</label>
                <div id='datetimepicker1' class='input-append date'>
                    <input data-format='yyyy/MM/dd hh:mm' type='text' name='fecha' placeholder='FECHA/HORA INICIAL'></input>
                      <span class='add-on'>
                      <i data-time-icon='icon-time' data-date-icon='icon-calendar'></i>
                      </span>
                  </div>
                  <button type="submit" class="btn btn-primary">BUSCAR</button>

                </form></div></div>
<?php
      }
      else if($_GET["accion"]==11){
          $nombre = $_POST["nombre"];
          $apellidos = $_POST["apellidos"];
          $servicio = $_POST["servicio"];
          $fecha = $_POST["fecha"];

          if($fecha == '')
          {
            $fecha = '9999/12/30';
          }
          
?>
          <!-- Agregar servicios -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  AGREGAR SERVICIO
</button>

<!-- Modificar servicios -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar</h4>
      </div>
      <div class="modal-body">
         <input type="hidden" name="" id="id2">
        <label>Nombre</label>
        <input type="" name=""  id="nombre2">
        <label>Apellidos</label>
        <input type="" name="" id="apellidos2">
        <label>Telefono</label>
        <input type="" name="" id="telefono2">
        <label>FECHA</label>
        <input type="" name="" id="fecha2">
        <label>CONFIRMAR</label>
        <input type="" name="" id="confi2">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="actualizarServicios">Guardar</button>
      </div>
    </div>
  </div>
</div>

     <div class='container'>
                      <div id='tabla'>

                        <div class='row'>
                          <div class'col-sm-12'>
                              <h2>RESULTADOS</h2>
                            <table class='table table-hover table-condensed table-bordered'>
                          <tr>
                            
                            <th>NOMBRE</th>
                            <th>APELLIDOS</th>
                            <th>TELEFONO</th>
                            <th>CONFIRMADO</th>
                            <th>FECHA/HORA</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>

                          </tr>
                <?php
                    $buscar = mysqli_query($enlace, "CALL CONSULTA_SERVICIOS('$nombre','$apellidos','$fecha','$servicio')");

                while($fila = mysqli_fetch_array($buscar)){
                  $id = $fila["id"] ."||".
                        $fila["nombre"] ."||".
                        $fila["apellidos"] ."||".
                        $fila["telef"] ."||".
                        $fila["confirmado"] ."||".
                        $fila["fechaHora"];

                        
                     ?> 
                <tr>
                      
                      <td><?php echo $fila[2] ?></td>
                      <td><?php echo $fila[3] ?></td>
                      <td><?php echo $fila[4] ?></td>
                      <td><?php echo $fila[10] ?></td>
                      <td><?php echo $fila[11] ?></td>
                  
                      <td> <button type="button" class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#myModal" onclick="mostrarFormSer('<?php echo $id ?>')"></button> 
                      </td>
                      <td> <button type="button" class="btn btn-danger glyphicon glyphicon-remove" data-toggle="modal" data-target="#myModal" onclick="mostrarForm('<?php echo $id ?>')"></button> 
                      </td>
                    </tr>
                <?php

              }
             ?> 
   <?php     
    }
      else if($_GET["accion"]==15){

         $i = $_POST["idpersona"];
          $a = $_POST['nombre'];
          $b = $_POST['apellidos'];
          $c = $_POST['telefono'];
          $d = $_POST['producto'];
          $e = $_POST['codigoN'];
          $f = $_POST['unidades'];
          $g = $_POST['observa'];

            $sql = mysqli_query($enlace,"UPDATE encargos SET nombre = '$a',apellidos = '$b',telef = '$c',producto = '$d',cn = '$e',unidades = '$f',observaciones = '$g' where id = '$i' ");

            

      }
      else if($_GET["accion"]==20){
          $i = $_POST["id"];
          $a = $_POST['nombre'];
          $b = $_POST['apellidos'];
          $c = $_POST['telefono'];
          $d = $_POST['confirmado'];
          $e = $_POST['fecha'];

          mysqli_query($enlace,"UPDATE encargos SET nombre = '$a',apellidos = '$b',telef = '$c',confirmado = '$d',fechaHora = '$e' where id = '$i'");

      }

?>
</body>
</html>
