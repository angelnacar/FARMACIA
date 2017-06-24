
	function agregarDatos(nombrem,apellidos,telefono,producto,cn,unidades,observaciones)
	{
		cadena = "nombre=" + nombre + 
				 "&apellidos=" + apellidos + 
				 "&telefono=" +telefono +
				 "&producto=" + producto +
				 "&cn=" + cn +
				 "&unidades=" + unidades +
				 "&observaciones=" + observaciones;

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
	function actualizarDatos()
	{
		id = $('#idpersona').val();
		nombre = $('#nombre').val();
		apellidos = $('#apellidos').val();
		telefono = $('#telefono').val();
		producto = $('#producto').val();
		cn = $('#codigoN').val();
		unidades = $('#unidades').val();
		observaciones = $('#observa').val();

		cadena = "idpersona" + id +
				"&nombre=" + nombre + 
				 "&apellidos=" + apellidos + 
				 "&telefono=" +telefono +
				 "&producto=" + producto +
				 "&codigoN=" + cn +
				 "&unidades=" + unidades +
				 "&observa=" + observaciones;

			$.ajax({
				type:"POST",
				url:"modificar.php",
				data:cadena,
				success:function(r)
				{
					if(r==1)
					{
						$('#tabla').load('procesos.php?accion=6');
						alertify.success("ACTUALIZADO CON EXITO");
					}
					else
					{
						alertify.error("ERROR DE ACTUALIZACION");
					}
				}
			});
	}
