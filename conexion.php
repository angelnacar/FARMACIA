<?php

$host = "localhost";
$usuario = "root";
$clave = "1983";
$bbdd = "farmacia";

$enlace = mysqli_connect($host,$usuario,$clave,$bbdd);
    if(!$enlace){
      echo "ERROR DE CONEXION";
    }

?>
