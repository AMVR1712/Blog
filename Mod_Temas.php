<?php
//require_once 'Seguridad.php';
require_once 'Conexion.php';

$con = Conexion();
$id = $_REQUEST["id"];
$nombre = $_REQUEST["nombre"];
$con->prepare("UPDATE temas SET nombre=:nom WHERE idTema=:id");
$cmd->bindValue(':nom',$nombre);
$cmd->bindValue(':id',$id);
$cmd->execute();
if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si"]);
else
echo json_encode(["resp"=>"No"]);