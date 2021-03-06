<?php
//require_once 'Seguridad.php';
require_once 'Conexion.php';

$op = $_GET['operacion'];

$con = Conexion();

switch{
    case "C";
    $idtema = $_GET['idtema'];
    $mensaje = $_GET['mensaje'];
    $user = $_GET['user'];
    $fecha = $_GET['Y-m-d H:i:s'];
    $con->prepare("INSERT INTO mensajes (idtema, mensaje, user , fecha) VALUES (:id, :mensaje, :'$user', :'$fecha')");
    $cmd->bindValue(':idtema',$idtema);
    $cmd->bindValue(':mensaje',$mensaje);
    $cmd->execute();
    if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si", "id"=>$id]);
    else
    echo json_encode(["resp"=>"No"]);
break;
    case "R";
    $idtema = $_GET['idtema'];
    $cmd = $con->prepare("SELECT idmsg AS, idtema, tema AS tema, mensaje AS mensaje, user AS user, fecha AS fecha FROM mensajes WHERE idtema=:idtema");
    $cmd->bindValue(':idtema',$idtema);
    $cmd->setFetchMode(PDD::FETCH_ASSOC);
    $cmd->execute();
    $tabla = $cmd->fetchAll();
    echo json_encode($tabla);
break;
    case "U";
    $id = $_REQUEST["id"];
    $mensaje = $_REQUEST["mensaje"];
    $con->prepare("UPDATE mensajes SET mensaje=:m WHERE idmsg=:id");
    $cmd->bindValue(':mensaje',$mensaje);
    $cmd->bindValue(':id',$id);
    $cmd->execute();
    if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si", "id"=>$id]);
    else
    echo json_encode(["resp"=>"No"]);
break;
    case "D";
    $id = $_REQUEST["id"];
    $con->prepare("DELETE FROM mensajes WHERE idmsg=:id");
    $cmd->bindValue(':id',$id);
    $cmd->execute();
    if($cmd->rowCount > 0)
    echo json_encode(["resp"=>"Si", "id"=>$id]);
    else
    echo json_encode(["resp"=>"No"]);
break;
default;
}