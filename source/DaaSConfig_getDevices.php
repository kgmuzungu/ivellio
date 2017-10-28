<?php
//tutorial
//https://programmerblog.net/jquery-ajax-get-example-php-mysql/

$Devices = array();

$mysqli = new mysqli('127.0.0.1', 'root', 'webdev', 'DaaS');
if ($mysqli->connect_errno) {
	echo "Sorry, this website is experiencing problems.";
	echo "Error: Failed to make a MySQL connection, here is why: \n";
	echo "Errno: " . $mysqli->connect_errno . "\n";
	exit;
}
$mysqli->set_charset("utf8");

//if (!$result = $mysqli->query("SELECT LoesungName FROM Loesungen")){
if (!$result = $mysqli->query("SELECT * FROM devices")){
	echo "there was an error" . $mysqli->error;
}

//$i=0;
if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		//$Devices[$i] = $row['LoesungName'];
		//array_push($Devices, $row['LoesungName']);
		array_push($Devices, $row);
		//echo $Devices[$i] . '<br />';
		//$i++;
	}
}

// send the data encoded as JSON
echo json_encode($Devices);
$mysqli->close();
//exit;
?>
