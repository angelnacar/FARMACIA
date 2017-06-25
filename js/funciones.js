
	function agregarDatos(nombrem,apellidos,telefono,fecha)
	{
		cadena = "nombre=" + nombre + 
				 "&apellidos=" + apellidos + 
				 "&telefono=" +telefono +
				 "&pfecha=" + fecha;

			$.ajax({
				type:"POST",
				url:"procesos.php?accion=25",
				data:cadena,
				success:function(r)
				{
					if(r==1)
					{
						alertify.success("ACTUALIZADO CON EXITO");
					}
					else if(r==0)
					{
						alertify.error("ERROR DE ACTUALIZACION");
					}
				}
			});
	}
	function mostrarForm(datos)
	{

		d = datos.split('||');

		$('#idpersona').val(d[0]);
		$('#nombre').val(d[1]);
		$('#apellidos').val(d[2]);
		$('#telefono').val(d[3]);
		$('#producto').val(d[4]);
		$('#codigoN').val(d[5]);
		$('#unidades').val(d[6]);
		$('#observa').val(d[7]);
	}
	function actualizarDatos(id,nombre,apellidos,telefono,producto,cn,unidades,observaciones)
	{
		

		cadena = "idpersona=" + id +
				"&nombre=" + nombre + 
				 "&apellidos=" + apellidos + 
				 "&telefono=" +telefono +
				 "&producto=" + producto +
				 "&codigoN=" + cn +
				 "&unidades=" + unidades +
				 "&observa=" + observaciones;

			$.ajax({
				type:"POST",
				url:"procesos.php?accion=15",
				data:cadena,
				success:function(r)
				{
					if(r)
					{

						$('#tabla').load('procesos.php?accion=4');
						alertify.success("ACTUALIZADO CON EXITO");
					}
					else
					{
						alertify.error("ERROR DE ACTUALIZACION");
					}
				}
			});
	}
