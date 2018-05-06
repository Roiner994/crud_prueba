<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>index Manufacturers</h1>

	<a href="{{ url('/manufacturers/crear') }}">Nuevo</a>

	Lista de manufacturers
	<div id="lista">
		
	</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
	var url = '{{ url('/api/manufacturers') }}';
	var index = '{{ url('/manufacturers') }}';
	var editar = '{{ url('/manufacturers/editar/') }}';

	function pintar_lista(manufacturers){ //Esto lo puedes hacer en el cliente o traerte el html de una tabla o lista desde el servidor
		html="<ul>";
			$.each(manufacturers, function(index, val) {
				html+="<li>"+val.name+" "+val.website+" <a href='"+editar+"/"+val.id+"'>editar</a>"+" <button class='btn_borrar' value='"+val.id+"'>eliminar</button>"+"</li>";
			});
		html+="</ul>";
		return html;
	}

	function eliminarItem($id){
		$.ajax({                        
			type: "DELETE",                 
			url: url+'/'+$id,                     
			success: function(data)             
			{
				pintarListaIndex();
			}
		});
	}

	function pintarListaIndex(){
		$.ajax({                        
			type: "GET",                 
			url: url,                     
			success: function(data)             
			{
				html = pintar_lista(data.data);
				console.log(html);
				$('#lista').html(html);
				$('#lista').find('.btn_borrar').click(function(event) {
					var eliminar = confirm('¿desea eleminar este itemn?');

					if(eliminar){
						eliminarItem($(this).val());
					}
				});
			}
		});
	}
	$(document).ready(function(){
		
		pintarListaIndex();

	});
</script>