<?php
include "config.php";
include "utils.php";

$dbConn =  connect($db);
	
	require 'conexion.php'

	$id = $_GET['alumnoID'];
	
	$sql = "DELETE FROM alumnos WHERE alumnoID = '$alumnoID'";
	$resultado = $mysqli->query($sql);
	
header("HTTP/1.1 400 Bad Request");
?>