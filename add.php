<!DOCTYPE html>
<html>
	<head>
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
		<div id="formulario">
				<form action="" method="post" >
					Ingrese nombre del libro:
					<input type="text" name="name" id="blank">
					<br>
					Ingrese autor:
					<input type="text" name="autor" id="blank">
					<br>
					Ingrese code ISBN:
					<input type="text" name="isbn" id="blank">
					<br>
					<input type="submit" name="create" value ="Agregar Libro" id="form" onclick="this.form.action='respuesta.php';this.form.submit();">
					<br>
					<input type="submit" name="back" value="Volver" id="form" onclick="this.form.action='asd.html';this.form.submit();">
				</form>
		</div>
		<div id="foto">
			<img id="imagen" src="ninos.png">
		</div>
	</body>
</html>