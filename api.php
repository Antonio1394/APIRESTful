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

$app->post("/productos",function() use($db,$app){
    $query="INSERT INTO productos VALUES (NULL,"
      . "'{$app->request->post("name")}',"
      . "'{$app->request->post("description")}',"
      . "'{$app->request->post("price")}'"
      . ")";
    $insert=$db->query($query);
    if ($insert) {
          $result=array("STATUS"=>"true","message"=>"Producto   Creado Exitosamente..");
    }else{
          $result=array("STATUS"=>"false","message"=>"Error al crear Producto");
    }
    echo json_encode($result);

});

$app->put("/productos/:id",function($id) use($db,$app){
    $query="UPDATE productos SET"
      . "name='{$app->request->post("name")}',"
      . "description='{$app->request->post("description")}',"
      . "price='{$app->request->post("price")}'"
      . "WHERE id={$id}";
    $update=$db->query($query);
    if ($update) {
          $result=array("STATUS"=>"true","message"=>"Producto Actualizado Exitosamente..");
    }else{
          $result=array("STATUS"=>"false","message"=>"Error al actualizar");
    }
    echo json_encode($result);

});

$app->run();
