<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Crear manufacturer</h1>

	<form id = "formulario">
		<label>Nombre</label>
		<input type="text" name="name">
		<br>
		<label>Sitio Web</label>
		<input type="text" name="website">
		<br>
		<button type="button" id="btn_formulario_crear">Guardar</button>
	</form>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

	$(document).ready(function(){

		var url = '{{ url('/api/manufacturers') }}';
		var index = '{{ url('/manufacturers') }}';

		$('#btn_formulario_crear').click(function(){
			console.log('estoy entrando aqui')
			$.ajax({                        
				type: "POST",                 
				url: url,                     
				data: $("#formulario").serialize(), 
				success: function(data)             
				{
					// $('#resp').html(data);
					window.location.replace(index);
				}
			});
		});

	});
</script>
