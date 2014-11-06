<!doctype html>
<html>
<head>
	<meta charset = "UTF-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class = "container">
		<h1>Libros</h1>
		<?php foreach ($libros as $key => $value): ?>
			<div class="row">
				<div class="col-md-8"><?php echo $value['titulo']." ".$value['autor']." ".$value['isbn']; ?></div>
				<div class="col-md-4"><a href="edit/<?php echo $value['id'] ?>/usuario">Editar</a></div>
				<div class="col-md-4"><a href="del/<?php echo $value['id'] ?>/usuario">Borrar</a></div>
			</div>
		<?php endforeach; ?>	 
		<a href="nuevo">Agregar</a>
	</div>	
</body>
