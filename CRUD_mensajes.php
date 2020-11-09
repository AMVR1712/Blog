<?php
//require_once 'Seguridad.php';
require_once 'Conexion.php';

$con = Conexion();

switch{
    case "C";
    $idtema = $_GET['idtema'];
    $mensaje = $_GET['mensaje'];
    $user = $_GET['user'];
    $fecha = $_GET['Y-m-d H:i:s'];
    $con->prepare("INSERT INTO mensajes (idtema, mensaje, user , fecha) VALUES (:id, :m, :'$user', :'$fecha')");
    $cmd->bindValue(':id',$idtema);
    $cmd->bindValue(':m',$mensaje);
    $cmd->execute();
    if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si"]);
    else
    echo json_encode(["resp"=>"No"]);
break;
    case "R";
    $idtema = $_GET['idtema'];
    $con->prepare("SELECT idmsg AS is, idtema AS tema, mensahe, user AS user, fecha AS fecha FROM mensajes WHERE idtema=:id");
    $cmd->bindValue(':id',$idtema);
    $cmd->setFetchMode(PDD::FETCH_ASSOC);
    $cmd->execute();
    $tabla = $cmd->fetchAll();
    echo json_encode($tabla);
break;
    case "U";
    $id = $_REQUEST["id"];
    $mensaje = $_REQUEST["mensaje"];
    $con->prepare("UPDATE mensajes SET mensaje=:m WHERE idmsg=:id");
    $cmd->bindValue(':m',$mensaje);
    $cmd->bindValue(':id',$id);
    $cmd->execute();
    if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si"]);
    else
    echo json_encode(["resp"=>"No"]);
break;
    case "D";
    $id = $_REQUEST["id"];
    $con->prepare("DELETE FROM mensajes WHERE idmsg=:id");
    $cmd->bindValue(':id',$id);
    $cmd->execute();
    if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si"]);
    else
    echo json_encode(["resp"=>"No"]);
break;
default;
}