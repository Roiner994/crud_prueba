<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Editar manufacturer</h1>

	<form id = "formulario">
		<label>Nombre</label>
		<input type="text" id="name" name="name">
		<br>
		<label>Sitio Web</label>
		<input type="text" id="website" name="website">
		<br>
		<button type="button" id="btn_formulario_editar">Guardar</button>
	</form>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	var id = {{$id}};
	var url = '{{ url('/api/manufacturers') }}'+'/'+id;
	var index = '{{ url('/manufacturers') }}';


	function llenarFormulario(){
		$.ajax({                        
			type: "GET",                 
			url: url,                     
			success: function(data)             
			{
				$('#name').val(data.data.name);
				$('#website').val(data.data.website);
			}
		});
	}


	$(document).ready(function(){

		llenarFormulario();

		$('#btn_formulario_editar').click(function(){
			$.ajax({                        
				type: "PUT",                 
				url: url,                     
				data: $("#formulario").serialize(), 
				success: function(data)             
				{
					window.location.replace(index);
				}
			});
		});

	});
</script>
