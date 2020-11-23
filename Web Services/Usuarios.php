<?php
//Permisos para CORS (Cross, Origign, Resource, Sharing).
header("Acces-Control-Allow-Origin: *");
header("Acces-Control-Allow-Headers: Authorization, Acces-Control-Allow-Methods, Acces-Control-Allow-Headers, Acces-Control-Allow-Origin");
header("Acces-Control-Allow-Methods: GER, POST, PUT, DELETE, OPTIONS, HEAD");
header("Allow: GET, POST, PUT, DELETE, OPTIONS, HEAD");
//require_once '../Seguridad.php';
require_once '../Conexion.php';

/* WEB SERVICE TIPO REST */
$op = $_SERVER['REQUEST_METHOD'];

$con = Conexion();

switch($op){
    case "Post":
        //Código para la alta, CREATE.
        if(isset($_GET['user']) && isset($_GET['pass']) && isset($_GET['tipo']) && isset($_GET['nombre'])){
        $u = $_POST['user'];
        $p = $_POST['pass'];
        $t = $_POST['tipo'];
        $n = $_POST['nombre'];
        $con->prepare("INSERT INTO usuarios VALUES (:u, :p, :'t', :'n')");
        $cmd->bindValue(':user',$u);
        $cmd->bindValue(':pass',$p);
        $cmd->bindValue(':tipo',$t);
        $cmd->bindValue(':nombre',$n);
        $cmd->execute();

        header("HTTP/1.1 200 OK");
        if($cmd->rowCount > 0)
        echo json_encode(["resp"=>"Si"]);
        else
        echo json_encode(["resp"=>"No"]);
        }else{
            header("HTTP/1.1 400 BAD REQUEST");
        }
        break;
    case "GET":
        //Código para la consulta, READ.
        if(isset($_GET['user'])){
            $sql = "SELECT * FROM usuarios WHERE user=user";
            $cmd = $con->prepare(sql);
            $cmd->bindValue(':user', $_GET['user']);
            $cmd->setFetchMode(PDD::FETCH_ASSOC);
            $cmd->execute();
            $tabla = $cmd->fetch();
        }else{
            $sql = "SELECT * FROM usuarios";
            $cmd = $con->prepare(sql);
            $cmd->setFetchMode(PDD::FETCH_ASSOC);
            $cmd->execute();
            $tabla = $cmd->fetchAll();
        }
    break;
    case "PUT":
        //Código para la actualización UPDATE.
        if(isset($_GET['user']) && isset($_GET['pass']) && isset($_GET['tipo']) && isset($_GET['nombre'])){
            $u = $_GET['user'];
            $p = $_GET['pass'];
            $t = $_GET['tipo'];
            $n = $_GET['nombre'];
            $con->prepare("UPDATE usuarios SET pass=:p, tipo=:t, nombre=:n WHERE user=:u");
            $cmd->bindValue(':u',$u);
            $cmd->bindValue(':p',$p);
            $cmd->bindValue(':t',$t);
            $cmd->bindValue(':n',$n);
            $cmd->execute();
    
            header("HTTP/1.1 200 OK");
            if($cmd->rowCount > 0)
            echo json_encode(["resp"=>"Si"]);
            else
            echo json_encode(["resp"=>"No"]);
            }else{
                header("HTTP/1.1 400 BAD REQUEST");
            }
    break;
    case "DELETE":
        //Código para la eliminación DELETE.
        if(isset($_GET['user'])){
            $u = $_GET['user'];
            $p = $_GET['pass'];
            $t = $_GET['tipo'];
            $n = $_GET['nombre'];
            $con->prepare("DELETE FROM usuarios WHERE user=:u");
            $cmd->bindValue(':u',$u);
            $cmd->execute();
    
            header("HTTP/1.1 200 OK");
            if($cmd->rowCount > 0)
            echo json_encode(["resp"=>"Si"]);
            else
            echo json_encode(["resp"=>"No"]);
            }else{
                header("HTTP/1.1 400 BAD REQUEST");
            }
    break;
    default:
    header("HTTP/1.1 400 BAD REQUEST");
}
