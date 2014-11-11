<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
		'debug' => true,
		'templates.path' => 'templates',
	));

$db = new PDO("mysql:host=localhost;dbname=sdrest", "root", "");


$app->get('/', function () use($app, $db) {
    $dbq = $db->prepare("SELECT * FROM libro");
    $dbq->execute();
    $data['libros'] = $dbq->fetchAll(PDO::FETCH_ASSOC);
    $app->render('libros.php', $data);
    
});

$app->get('/nuevo', function() use($app){
	$app->render('nuevo.php');

});

$app->post('/nuevo', function () use($app, $db) {
	$request = $app->request;
	$tit = $request->post('titulo');
	$aut = $request->post('autor');
	$isb = $request->post('isbn');


    $dbq = $db->prepare("INSERT INTO libro VALUES (null ,:autor, :titulo, :isbn,NOW())");
    $dbq->execute(array(':autor' => $aut, ':titulo' => $tit, ':isbn' => $isb));
    $app->redirect('/rest');
});


$app->get('/editar/:id', function($id=0) use($app, $db){
	$id = (int)$id;

	$dbq= $db->prepare("SELECT * FROM libro WHERE id=:id LIMIT 1");
	$dbq->execute(array('id' => $id));

	$result = $dbq->fetch(PDO::FETCH_ASSOC);

	$app->render('editar.php', $result);


});

$app->post('/editar/:id', function($id) use($app, $db){
	$id = (int)$id;
	$request = $app->request;
	$tit = $request->post('titulo');
	$aut = $request->post('autor');
	$isb = $request->post('isbn');

	$dbq = $db->prepare("UPDATE libro SET titulo=:title, autor=:author, isbn=:num WHERE id=:id LIMIT 1");
	$dbq->execute(array(':title' => $tit, ':author' => $aut, ':num' => $isb, ':id' => $id));
	$app->redirect('/rest');
});


$app->get('/del/:id', function($id) use($app, $db){
	$id = (int)$id;
	$dbq = $db->prepare("DELETE FROM libro WHERE id=:id LIMIT 1");
	$dbq->execute(array(':id' => $id));
	$app->redirect('/rest');
});


$app->run();