<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<style type="text/css">
			#frase{
				font:150px "Guakala", Sans-Serif; 
			}
			#naranjo{
				color: #fb7922;
			}
			#cafe{
				color: #562504;
			}
			#foto{
				position:absolute;
				bottom:0;
				right:0;
			}
			#imagen{
				width: 600px;
			}
			#formulario{
				position: absolute;
				top: 50px;
				right: 240px;
			}
			#form{
				display: block;
				margin-left: auto;
				margin-right: auto;
			}
			#blank{
				display: block;
				margin-right: 0;
			}
		</style>
		
	</head>
	<body style="background-color:#BADB0B">
		<div id="frase">
			<div>
				<a id="cafe">C</a><a id="naranjo">o</a><a id="cafe">m</a><a id="naranjo">p</a><a id="cafe">a</a><a id="naranjo">r</a><a id="cafe">t</a><a id="naranjo">e</a>
			</div>
			<div>
				<a id="cafe">T</a><a id="naranjo">u</a>
			</div>
			<div>
				<a id="cafe">l</a><a id="naranjo">i</a><a id="cafe">b</a><a id="naranjo">r</a><a id="cafe">o</a>
			</div>
		</div>
		<div id="formulario" class="container">
				<form action="" method="POST" role="form">
					<legend>Editar Libro</legend>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre" value="<?php echo $nombre ?>">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre" value="<?php echo $nombre ?>">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre" value="<?php echo $nombre ?>">
					</div>
					<button type="submit" class="btn btn-primary">Actualizar</button>
				</form>
		</div>
		<div id="foto">
			<img id="imagen" src="ninos.png">
		</div>
	</body>
</html>