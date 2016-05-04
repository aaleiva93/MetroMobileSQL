<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header("Access-Control-Allow-Headers: X-Requested-With");

require_once "vendor/autoload.php";

$app = new \Slim\Slim();
$serverName = "(local)\sqlexpress";
$connectionInfo = array( "Database"=>"transportegadb");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$app->get("/multas", function() use ($conn, $app){
	$result= sqlsrv_query($conn, "SELECT * FROM MULTAS");
	$multas = array();
	while($fila=sqlsrv_fetch_array ($result)){
		$multas[]=$fila;
	}
	echo json_encode ($multas);
});


$app->run();