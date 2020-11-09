<?php
//require_once 'Seguridad.php';
require_once 'Conexion.php';

$con = Conexion();

$con->prepare("SELECT idTema as id, nombre as tema FROM temas");
$cmd->setFetchMode(PDO::FETCH_ASSOC);
$cmd->execute();
$tabla = $cmd->fetchAll();
echo json_encode($tabla);