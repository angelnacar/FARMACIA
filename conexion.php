<?php

$host = "localhost";
$usuario = "root";
$clave = "";
$bbdd = "farmacia";

$enlace = mysqli_connect($host,$usuario,$clave,$bbdd);
    if(!$enlace){
      echo "ERROR DE CONEXION";
    }

?>
