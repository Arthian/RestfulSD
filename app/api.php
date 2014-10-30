
<?php if(!defined("SPECIALCONSTANT")) die("Acceso denegado");

$app->get("/book", function() use($app){

	try{
		echo "intentando conectar desde api";
		$connection = getConnection();
		$dbh = $connection->prepare("SELECT * FROM libro");
		$dbh->execute();
		$books = $dbh->fetchObject();
		$connection = null;

		$app->response->headers->set("Content-type","application/json");
		$app->response->status(200);
		$app->response->body(json_encode($books));
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
		echo "fallita";
	}

});