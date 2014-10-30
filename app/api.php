
<?php if(!defined("SPECIALCONSTANT")) die("Acceso denegado");

$app->get("/book", function() use($app){

	try{
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

$app->post("/book", function() use($app){

    $title = $app->request->post("titulo");
    $isbn = $app->request->post("isbn");
    $autor = $app->request->post("autor");

    try{
        
        $connection = getConnection();
        $dbh = $connection->prepare("INSERT INTO libro VALUES (null ,?, ?, ?,NOW())");
        $dbh->bindParam(1, $autor);
        $dbh->bindParam(2, $title);
        $dbh->bindParam(3, $isbn);  
        $dbh->execute();
        $books = $dbh->lastInsertId();
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

$app->put("/book", function() use($app){

    $title = $app->request->put("titulo");
    $isbn = $app->request->put("isbn");
    $autor = $app->request->put("autor");
    $id = $app->request->put("id");

    try{
        
        $connection = getConnection();
        $dbh = $connection->prepare("UPDATE libro SET titulo = ?, isbn = ? , autor = ?, creado = NOW() WHERE id = ?");
        $dbh->bindParam(1, $title);
        $dbh->bindParam(2, $isbn);
        $dbh->bindParam(3, $autor);  
        $dbh->bindParam(4, $id);    
        $dbh->execute();

        $connection = null;

        $app->response->headers->set("Content-type","application/json");
        $app->response->status(200);
        $app->response->body(json_encode(array("res" => 1)));
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        echo "fallita";
    }

});

$app->delete("/book/:id", function($id) use($app){


    try{
        
        $connection = getConnection();
        $dbh = $connection->prepare("DELETE FROM libro WHERE id = ?");
        $dbh->bindParam(1, $id);    
        $dbh->execute();

        $connection = null;

        $app->response->headers->set("Content-type","application/json");
        $app->response->status(200);
        $app->response->body(json_encode(array("res" => 1)));
    }
    catch(PDOException $e){
        echo "Error: " . $e->getMessage();
        echo "fallita";
    }

});