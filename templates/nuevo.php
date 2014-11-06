<!doctype html>
<html>
<head>
	<meta charset = "UTF-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class = "container">
		<form action="" method="POST" role="form">
			<legend>Nuevo Libro</legend>
			<div class="form-group">
				<label for="titulo">Titulo</label>
				<input type="text" class="form-control" id="titulo" name="titulo" placeholder="ingresa titulo">
				<label for="autor">Autor</label>
				<input type="text" class="form-control" id="autor" name="autor" placeholder="ingresa autor">
				<label for="titulo">ISBN</label>
				<input type="text" class="form-control" id="isbn" name="isbn" placeholder="ingresa isbn">
			</div>
			<button type="submit" class"btn btn-primary">Guardar</button>
		</form>

</body>
</html>