<?php

$hostname = "localhost";
$usuario = "root";
$senha = "root";
$database = "consultapet";
$port = "3306";
$mysqli = new mysqli($hostname, $usuario, $senha, $database, $port);
if($mysqli->connect_error){
   echo die("Falha ao conectar:" . $mysqli->error);

}