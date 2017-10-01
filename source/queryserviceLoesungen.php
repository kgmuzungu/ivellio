<?php 

$Loesung = array();

$mysqli = new mysqli('127.0.0.1', 'root', 'webdev', 'mydb');
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    exit;
}
$mysqli->set_charset("utf8");
        
//if (!$result = $mysqli->query("SELECT LoesungName FROM Loesungen")){
if (!$result = $mysqli->query("SELECT * FROM Loesungen")){
    echo "<h1>there was an error</h1>" . $mysqli->error;
}
    
//$i=0;
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        //$Loesung[$i] = $row['LoesungName'];
        //array_push($Loesung, $row['LoesungName']);
        array_push($Loesung, $row);
        //echo $Loesung[$i] . '<br />';
        //$i++;
    }
}
            
            // send the data encoded as JSON
echo json_encode($Loesung);
$mysqli->close();
//exit;
?>
