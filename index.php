<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
		'debug' => true,
		'templates.path' => 'templates',
	));

$db = new PDO("mysql:host=localhost;dbname=sdrest", "root", "");

$app->get('/', function () {
    echo "Hello";
});


$app->get('/read', function () use($app, $db) {
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
    
});


$app->run();