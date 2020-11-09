<?php
session_start();
//include la inclusion del archivo no es obligatoria
//include_once carga una vez
//require carga siempre que se ejecute
require_once 'Conexion.php';
$_SESSION["login"] = "No";
$_SESSION["nombre"] = "";

$u = $_GET['user'];
$p = $_GET['pass'];

$con = Conexion();

$comando = $con->prepare("SELECT * FROM usuarios WHERE user=:u AND pass=:p");
$comando->bindValue(':u', $u);
$comando->bindValue(':p', $p);

$comando->execute();
$consulta = $comando->fetch();

if($consulta){
    $_SESSION["login"] = "Si";
    $_SESSION["login"] = $consulta["nombre"];
    echo json_encode(["resp"=>"Si"]);
}else{
    echo json_encode(["resp"=>"No"]);
}