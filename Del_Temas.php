<?php
//require_once 'Seguridad.php';
require_once 'Conexion.php';

$con = Conexion();
$id = $_REQUEST["id"];
$con->prepare("DELETE FROM temas WHERE idTema=:id");
$cmd->bindValue(':id',$id);
$cmd->execute();
if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si"]);
else
echo json_encode(["resp"=>"No"]);