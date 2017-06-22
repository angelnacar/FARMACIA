<!DOCTYPE html>
<html>
<head>

      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
      <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/alertify.css">
      <link rel="stylesheet" href="css/default.css">
      <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/alertify.js"></script>
      <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
      <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>

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



</head>
<body>
<?php
  include("conexion.php");

if(isset($_POST["ENCARGOS"])){

  echo "<div id='contenedor3'>
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
              <br><br>
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
                </form></div>";
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

          mysqli_query($enlace,"CALL REGISTRO_ENCARGO('$empleado','$nombre','$apellidos','$telf','$producto','$codigoNaci',$unidades,'$proveedor','$fecha','$observaciones')");
          echo "<script> alert('ENCARGO REGISTRADO') ; window.location='index.php';</script>";

        }
      else if(isset($_POST["BUSCAR"])){
        echo "<div id='contenedor'>
                <div id='contenedor2'>
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
                </div></div>
            </div>";
      }
      else if(@$_GET["accion"] == 2){    //AGREGA CONTACTOS
        $nombre = @$_POST["nombre"];
        $apellidos = @$_POST["apellidos"];
          $producto = @$_POST["producto"];
            $codigoNaci = @$_POST["codigoNaci"];
              $fecha = @$_POST["fecha"];

      }
    else if(isset($_POST["SERVICIOS"])){
      echo "<div id='contenedor3'>

              <h1><strong>SERVICIOS</strong></h1>

              <form name='REGISTRO' method='POST' action='procesos.php?accion=3'>
              NOMBRE:
              <input id='texto' type='text'  name='nombre'><br><br>
              APELLIDOS:
              <input id='texto' type='text'  name='apellidos'><br><br>
              TELÉFONO:
              <input id='texto' type='text'  name='telefono'><br><br>
              FECHA:
              <input type='text' name='fecha' class='tcal'  /><br><br>
              HORA:
              <input id='texto' type='text'  name='hora' placeholder='00:00'><br><br>
              SERVICIO:
              <select name='servicio'>
              <option value='1'>DIETÉTICA</option>
              <option value='2'>ESTÉTICA</option>
              </select></br></br>
              <input id='boton' type='submit' name='buscar' value='REGISTRAR'>

              </form></div>";

    }
    else if(@$_GET["accion"] == 3){    //AGREGA CONTACTOS
      $nombre = @$_POST["nombre"];
      $apellidos = @$_POST["apellidos"];
      $telf = @$_POST["telefono"];
            $fecha  = @$_POST["fecha"];
            $hora = @$_POST["hora"];
            $servicio = @$_POST["servicio"];
            $fecha2 = date("Y-m-d", strtotime($fecha));
            mysqli_query($enlace,"INSERT INTO clientes (idcliente,nombre,apellidos,telefono) VALUES (null,'$nombre','$apellidos','$telf')");
              $idcli = mysqli_insert_id($enlace);

              mysqli_query($enlace,"INSERT INTO encargos (cliente,servicio,fecha,hora) VALUES ($idcli,$servicio,'$fecha2','$hora')");

            echo "<script>alert('SERVICIO REGISTRADO');
            window.location='index.php';</script>";



    }
      else if(@$_GET["accion"] == 4){

      echo "<div id='contenedor3'>
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
              <div class='col-xs-8'>
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

              </form></div>";
      }
      else if(@$_GET["accion"] == 6){
              $nombre = @$_POST["nombre"];
              $apel = @$_POST["apellidos"];
              $producto = @$_POST["producto"];
              $codigoN = @$_POST["codigoNaci"];
              $fechaini = @$_POST["fechaini"];
              $fechafin = @$_POST["fechafin"];

                echo $nombre;


              $buscar = mysqli_query($enlace, "CALL CONSULTA_PRODUCTOS('$nombre','$apel','$producto','$codigoN','$fechaini','$fechafin')");

              echo "<div class='container'>
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

                          </tr>";
                while($fila = mysqli_fetch_array($buscar)){
                  $id = $fila["id"];
                echo "<tr>
                      <td>$fila[empleado]</td>
                      <td>$fila[nombre]</td>
                      <td>$fila[apellidos]</td>
                      <td>$fila[telef]</td>
                      <td>$fila[producto]</td>
                      <td>$fila[unidades]</td>
                      <td>$fila[cn]</td>
                      <td>$fila[fechaHora]</td>
                      <td>$fila[proveedor]</td>
                      <td>$fila[observaciones]</td>
                      <td><form method='POST' action='procesos.php?accion=20'> <button type='submit' class='btn btn-warning glyphicon glyphicon-pencil' value='$id'></button></form> </td>
                    </tr>";
                    }
                      echo  "</table></div>
                       </div>
                      </div>
                    </div>";


      }
      else if($_GET["accion"]==10){
         $cod = $_POST["id"];
            mysqli_query($enlace, "UPDATE encargos SET dispensado = 'SI' where id='$cod'");

            echo "<script>alert('PRODUCTO DISPENSADO');
            window.location='index.php';</script>";

      }
      else if($_GET["accion"]==5){
        echo "<html><body><div id='contenedor3'>

                <h1><strong>BUSCAR SERVICIO</strong></h1>

                <form name='REGISTRO' method='POST' action='procesos.php?accion=11'>

                NOMBRE:
                <input id='texto' type='text'  name='nombre'>
                APELLIDOS:
                <input id='texto' type='text'  name='apellidos'><br><br>
                SERVICIO:
                <select name='servicio'>
                <option value='3'>N/A</option>
                <option value='1'>DIETÉTICA</option>
                <option value='2'>ESTÉTICA</option>
                </select>
                FECHA:
                <input type='text' name='fecha' class='tcal'  /><br><br>

                  <input id='boton' type='submit' name='registrar' value='BUSCAR'>

                </form></id></body></html>";

      }
      else if($_GET["accion"]==11){
          $nombre = $_POST["nombre"];
          $apellidos = $_POST["apellidos"];
          $servicio = $_POST["servicio"];
          $fecha = $_POST["fecha"];
            $fecha2 = date("Y-m-d", strtotime($fecha));

        if($nombre != ""){
          $buscar = mysqli_query($enlace, "SELECT  clientes.nombre,clientes.apellidos,clientes.telefono,servicios.tipo,encargos.fecha,encargos.id, encargos.hora,encargos.servicio,encargos.estado from clientes inner join encargos on clientes.idcliente = encargos.cliente inner join servicios on servicios.idservicio = encargos.servicio  where clientes.nombre like '$nombre%';");
          echo "<style> table, table td, table tr {padding:0px;border-spacing: 0px;}table {position: relative;left: 20%;
            top: 5%;
            border:1px black solid;
            border-radius:5px;
              min-width:400px;
              font-family: Helvetica,Arial;
            }
            table td {
              padding:6px;
            }
            #boton{
              position: relative; left:45%;top:15%;
            }
            table tr:first-child td:first-child {
              border-radius:5px 0px 0px 0px;
            }
            table tr:first-child td:last-child {
              border-radius:0px 5px 0px 0px;
            }

            table tr:last-child td:first-child {
              border-radius:0px 0px 0px 5px;
            }

            table tr:last-child td:last-child {
              border-radius:0px 0px 5px 0px;
            }

            table td:not(:last-child) {
              border-right:1px #666 solid;
            }

            table tr:nth-child(2n) {
              background: #87CEEB;
            }

            table tr:nth-child(2n+1){
              background: #ADD8E6;
            }

            table.header tr:not(:first-child):hover, table:not(.header) tr:hover {
              background:#E0FFFF;
            }

            table:not(.header) tr {
              text-align: left;
            }

            table.header tr:first-child {
              font-weight: bold;
              color:#fff;
              background-color: #444;
              border-bottom:1px #000 solid;
            }

            table.header tr:nth-child(n+2) {
              text-align: right;
            }</style><table id='tabla'><td>NOMBRE</td><td>APELLIDOS</td><td>TELF</td><td>SERVICIO</td><td>FECHA</td><td>HORA</td><td>CONFIRMADO</td><td>CONFIRMAR</td>";
            while($fila = mysqli_fetch_array($buscar)){
                $id = $fila["id"];
                  if($fila["servicio"] == 1){
                    $ser = 'DIETETICA';
                  }
                  else {
                    $ser = 'ESTETICA';
                  }
              echo "<tr>
                    <td>$fila[nombre]</td>
                    <td>$fila[apellidos]</td>
                    <td>$fila[telefono]</td>
                    <td>$ser</td>
                    <td>$fila[fecha]</td>
                    <td>$fila[hora]</td>
                    <td>$fila[estado]</td>

                    <td><form method='POST' action='procesos.php?accion=15'>
                      <input name='id' type='hidden' value='$id'>

                      <input name='comprar' type='submit' value='confirmar'>
                      </form></td></tr>";
            }
            echo "</table>
            <form id='boton' name='F10' method='POST' action='index.php'>
            <input type='submit' name='inicio' value='INICIO'></form></body></html>";

      }
      else if($apellidos != ""){
        $buscar = mysqli_query($enlace, "SELECT  clientes.nombre,clientes.apellidos,clientes.telefono,servicios.tipo,encargos.fecha,encargos.id, encargos.hora,encargos.servicio,encargos.estado from clientes inner join encargos on clientes.idcliente = encargos.cliente inner join servicios on servicios.idservicio = encargos.servicio  where clientes.apellidos like '$apellidos%';");
        echo "<style> table, table td, table tr {padding:0px;border-spacing: 0px;}table {position: relative;left: 20%;
          top: 5%;
          border:1px black solid;
          border-radius:5px;
            min-width:400px;
            font-family: Helvetica,Arial;
          }
          table td {
            padding:6px;
          }
          #boton{
            position: relative; left:45%;top:15%;
          }
          table tr:first-child td:first-child {
            border-radius:5px 0px 0px 0px;
          }
          table tr:first-child td:last-child {
            border-radius:0px 5px 0px 0px;
          }

          table tr:last-child td:first-child {
            border-radius:0px 0px 0px 5px;
          }

          table tr:last-child td:last-child {
            border-radius:0px 0px 5px 0px;
          }

          table td:not(:last-child) {
            border-right:1px #666 solid;
          }

          table tr:nth-child(2n) {
            background: #87CEEB;
          }

          table tr:nth-child(2n+1){
            background: #ADD8E6;
          }

          table.header tr:not(:first-child):hover, table:not(.header) tr:hover {
            background:#E0FFFF;
          }

          table:not(.header) tr {
            text-align: left;
          }

          table.header tr:first-child {
            font-weight: bold;
            color:#fff;
            background-color: #444;
            border-bottom:1px #000 solid;
          }

          table.header tr:nth-child(n+2) {
            text-align: right;
          }</style><table id='tabla'><td>NOMBRE</td><td>APELLIDOS</td><td>TELF</td><td>SERVICIO</td><td>FECHA</td><td>HORA</td><td>CONFIRMADO</td><td>CONFIRMAR</td>";
          while($fila = mysqli_fetch_array($buscar)){
              $id = $fila["id"];
                if($fila["servicio"] == 1){
                  $ser = 'DIETETICA';
                }
                else {
                  $ser = 'ESTETICA';
                }
            echo "<tr>
                  <td>$fila[nombre]</td>
                  <td>$fila[apellidos]</td>
                  <td>$fila[telefono]</td>
                  <td>$ser</td>
                  <td>$fila[fecha]</td>
                  <td>$fila[hora]</td>
                  <td>$fila[estado]</td>

                  <td><form method='POST' action='procesos.php?accion=15'>
                    <input name='id' type='hidden' value='$id'>

                    <input name='comprar' type='submit' value='confirmar'>
                    </form></td></tr>";
          }
          echo "</table>
          <form id='boton' name='F10' method='POST' action='index.php'>
          <input type='submit' name='inicio' value='INICIO'></form></body></html>";

    }
    else if($servicio == 1 || $servicio == 2){
      $buscar = mysqli_query($enlace, "SELECT  clientes.nombre,clientes.apellidos,clientes.telefono,servicios.tipo,encargos.fecha,encargos.id, encargos.hora,encargos.servicio,encargos.estado from clientes inner join encargos on clientes.idcliente = encargos.cliente inner join servicios on servicios.idservicio = encargos.servicio  where encargos.servicio = '$servicio%';");
      echo "<style> table, table td, table tr {padding:0px;border-spacing: 0px;}table {position: relative;left: 20%;
        top: 5%;
        border:1px black solid;
        border-radius:5px;
          min-width:400px;
          font-family: Helvetica,Arial;
        }
        table td {
          padding:6px;
        }
        #boton{
          position: relative; left:45%;top:15%;
        }
        table tr:first-child td:first-child {
          border-radius:5px 0px 0px 0px;
        }
        table tr:first-child td:last-child {
          border-radius:0px 5px 0px 0px;
        }

        table tr:last-child td:first-child {
          border-radius:0px 0px 0px 5px;
        }

        table tr:last-child td:last-child {
          border-radius:0px 0px 5px 0px;
        }

        table td:not(:last-child) {
          border-right:1px #666 solid;
        }

        table tr:nth-child(2n) {
          background: #87CEEB;
        }

        table tr:nth-child(2n+1){
          background: #ADD8E6;
        }

        table.header tr:not(:first-child):hover, table:not(.header) tr:hover {
          background:#E0FFFF;
        }

        table:not(.header) tr {
          text-align: left;
        }

        table.header tr:first-child {
          font-weight: bold;
          color:#fff;
          background-color: #444;
          border-bottom:1px #000 solid;
        }

        table.header tr:nth-child(n+2) {
          text-align: right;
        }</style><table id='tabla'><td>NOMBRE</td><td>APELLIDOS</td><td>TELF</td><td>SERVICIO</td><td>FECHA</td><td>HORA</td><td>CONFIRMADO</td><td>CONFIRMAR</td>";
        while($fila = mysqli_fetch_array($buscar)){
            $id = $fila["id"];
              if($fila["servicio"] == 1){
                $ser = 'DIETETICA';
              }
              else {
                $ser = 'ESTETICA';
              }
          echo "<tr>
                <td>$fila[nombre]</td>
                <td>$fila[apellidos]</td>
                <td>$fila[telefono]</td>
                <td>$ser</td>
                <td>$fila[fecha]</td>
                <td>$fila[hora]</td>
                <td>$fila[estado]</td>

                <td><form method='POST' action='procesos.php?accion=15'>
                  <input name='id' type='hidden' value='$id'>

                  <input name='comprar' type='submit' value='confirmar'>
                  </form></td></tr>";
        }
        echo "</table>
        <form id='boton' name='F10' method='POST' action='index.php'>
        <input type='submit' name='inicio' value='INICIO'></form></body></html>";

  }
  else if($fecha != ""){
    $buscar = mysqli_query($enlace, "SELECT  clientes.nombre,clientes.apellidos,clientes.telefono,servicios.tipo,encargos.fecha,encargos.id, encargos.hora,encargos.servicio,encargos.estado from clientes inner join encargos on clientes.idcliente = encargos.cliente inner join servicios on servicios.idservicio = encargos.servicio  where encargos.fecha = '$fecha2';");

    echo "<style> table, table td, table tr {padding:0px;border-spacing: 0px;}table {position: relative;left: 20%;
      top: 5%;
      border:1px black solid;
      border-radius:5px;
        min-width:400px;
        font-family: Helvetica,Arial;
      }
      table td {
        padding:6px;
      }
      #boton{
        position: relative; left:45%;top:15%;
      }
      table tr:first-child td:first-child {
        border-radius:5px 0px 0px 0px;
      }
      table tr:first-child td:last-child {
        border-radius:0px 5px 0px 0px;
      }

      table tr:last-child td:first-child {
        border-radius:0px 0px 0px 5px;
      }

      table tr:last-child td:last-child {
        border-radius:0px 0px 5px 0px;
      }

      table td:not(:last-child) {
        border-right:1px #666 solid;
      }

      table tr:nth-child(2n) {
        background: #87CEEB;
      }

      table tr:nth-child(2n+1){
        background: #ADD8E6;
      }

      table.header tr:not(:first-child):hover, table:not(.header) tr:hover {
        background:#E0FFFF;
      }

      table:not(.header) tr {
        text-align: left;
      }

      table.header tr:first-child {
        font-weight: bold;
        color:#fff;
        background-color: #444;
        border-bottom:1px #000 solid;
      }

      table.header tr:nth-child(n+2) {
        text-align: right;
      }</style><table id='tabla'><td>NOMBRE</td><td>APELLIDOS</td><td>TELF</td><td>SERVICIO</td><td>FECHA</td><td>HORA</td><td>CONFIRMADO</td><td>CONFIRMAR</td>";
      while($fila = mysqli_fetch_array($buscar)){
          $id = $fila["id"];
            if($fila["servicio"] == 1){
              $ser = 'DIETETICA';
            }
            else {
              $ser = 'ESTETICA';
            }
        echo "<tr>
              <td>$fila[nombre]</td>
              <td>$fila[apellidos]</td>
              <td>$fila[telefono]</td>
              <td>$ser</td>
              <td>$fila[fecha]</td>
              <td>$fila[hora]</td>
              <td>$fila[estado]</td>

              <td><form method='POST' action='procesos.php?accion=15'>
                <input name='id' type='hidden' value='$id'>

                <input name='comprar' type='submit' value='confirmar'>
                </form></td></tr>";
      }
      echo "</table>
      <form id='boton' name='F10' method='POST' action='index.php'>
      <input type='submit' name='inicio' value='INICIO'></form></body></html>";

}

    }
      else if($_GET["accion"]==15){
         $cod = $_POST["id"];
            mysqli_query($enlace, "UPDATE encargos SET estado = 'SI' where id='$cod'");

            echo "<script>alert('CLIENTE CONFIRMADO');
            window.location='index.php';</script>";

      }
      else if($_GET["accion"]==20){
         $cod = $_POST["id"];
            mysqli_query($enlace, "UPDATE encargos SET avisado = 'SI' where id='$cod'");

            echo "<script>alert('CLIENTE AVISADO');
            window.location='index.php';</script>";

      }

?>
</body>
</html>
