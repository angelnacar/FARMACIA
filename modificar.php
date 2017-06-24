<?php

	include "conexion.php";

		$i = $_POST["idpersona"];
          $a = $_POST['nombre'];
          $b = $_POST['apellidos'];
          $c = $_POST['telefono'];
          $d = $_POST['producto'];
          $e = $_POST['cn'];
          $f = $_POST['unidades'];
          $g = $_POST['observaciones'];

            $sql = mysqli_query($enlace,"UPDATE encargos SET nombre = '$a' where id = '$i' ");

?>