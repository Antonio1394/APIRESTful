<?php
require_once 'vendor/autoload.php';
$app=new \Slim\Slim();

$app->get("/hola/:nombre",function($nombre){
    echo "Hola ".$nombre;
});
function pruebaMiddle(){
  echo "Soy un middleware";
}

function pruebaTwo(){
  echo "Soy un middleware 2";
}

$app->get("/pruebas(/:uno(/:dos))",'pruebaMiddle','pruebaTwo',function($uno=NULL,$dos=NULL){
    echo $uno."<br/>";
    echo $dos."<br/>";
})->conditions(array(
  "uno"=>"[a-zA-Z]*",
  "dos"=>"[0-9]*"
));


$app->run();
