<?php
require_once 'vendor/autoload.php';
$app=new \Slim\Slim();

$app->get("/productos",function() use($db,$app){

});

$app->run();
