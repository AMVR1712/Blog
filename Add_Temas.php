<?php
//require_once 'Seguridad.php';
require_once 'Conexion.php';

$con = Conexion();
$nombre = $_REQUEST["nombre"];
$con->prepare("INSERT INTO temas(nombre) VALUES(:nom)");
$cmd->bindValue(':nom',$nombre);
$cmd->execute();
$id = $con->lastInsertId();
if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si", "id"=>$id]);
else
echo json_encode(["resp"=>"No"]);