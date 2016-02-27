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

$app->group("/api",function() use($app){
  $app->group("/ejemplo",function() use($app){
    $app->get("/hola/:nombre",function($nombre){
        echo "Hola ".$nombre;
    });
    $app->get("/dime-tu-apellido/:apellido",function($apellido){
        echo "Hola tu apellido es".$apellido;
    });
  });
});


$app->run();
