<?php
require_once 'vendor/autoload.php';
$app=new \Slim\Slim();

$app->get("/hola/:nombre",function($nombre){
    echo "Hola ".$nombre;
});

$app->get("/pruebas(/:uno(/:dos))",function($uno=NULL,$dos=NULL){
    echo $uno."<br/>";
    echo $dos."<br/>";
})->conditions(array(
  "uno"=>"[a-zA-Z]*",
  "dos"=>"[0-9]*"
));


$app->run();
