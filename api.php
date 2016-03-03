<?php
require_once 'vendor/autoload.php';
$app=new \Slim\Slim();

$db=new mysqli("localhost","root","","prueba1");
$app->get("/productos",function() use($db,$app){
  $query=$db->query("SELECT * FROM Productos");
  $productos=array();
  while ($fila=$query->fetch_assoc()) {
    $productos[]=$fila;
  }
  echo json_encode($productos);
});

$app->run();
