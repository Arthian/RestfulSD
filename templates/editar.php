<!DOCTYPE html>
<html lan="es">
<head>
	<meta charset = "UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
	
	
</head>
<body style="background-color:#BADB0B">
	<div class="container">
			<form action="" method="POST" role="form" style="margin: 0 auto; max-width:330px; padding: 15px;">
				<legend>Editar Libro</legend>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ingrese nombre" value="<?php echo $titulo ?>">
					<label for="nombre">Autor</label>
					<input type="text" class="form-control" name="autor" id="autor" placeholder="Ingrese Autor" value="<?php echo $autor ?>">
					<label for="nombre">ISBN</label>
					<input type="text" class="form-control" name="isbn" id="isbn" placeholder="Ingrese ISBN" value="<?php echo $isbn ?>">
				</div>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</form>
	</div>
	<div id="foto">
		<img id="imagen" src="ninos.png">
	</div>
</body>
</html>