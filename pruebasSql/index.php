<html> 
<body> 

<?php
$serverName = "(local)\sqlexpress"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"transportegadb");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexion establecida.<br />";
}else{
     echo "Conexion no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

 
	$result = sqlsrv_query($conn, "SELECT * FROM MULTAS");

	while ($row = sqlsrv_fetch_array ($result)){ 
		echo "<table border=true>";
		echo "<tr>";
		echo "<td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td>";
		echo "</tr>";
		echo "</table>";
	} 
	?> 

</body> 
</html> 