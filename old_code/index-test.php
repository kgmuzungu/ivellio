<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<H1>Hello World</H1>'; ?> 
 <!-- <?php phpinfo(); ?> -->
 <?php
	// mysqli
	//$mysqli = new mysqli("example.com", "user", "password", "database");
	$mysqli = new mysqli('127.0.0.1', 'root', 'webdev', 'mydb');
	if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    exit;
	}
	
	
	if (!$result = $mysqli->query("SELECT COUNT(*) FROM Loesungen;")){
		die('There was an error running the query [' . $mysqli->error . ']');}
	$LoesungenCount = $result->fetch_assoc();
	$result->free();
	echo "Loesungen count is: " . $LoesungenCount['COUNT(*)'] . '<br />' . '<br />';
	
	//$result = $mysqli->query("SELECT * FROM Loesungen LEFT JOIN Auswahl on Loesungen.idLoesungen = Auswahl.idLoesungen_FK;");
	//while($row = $result->fetch_assoc()){
  //  echo $row['LoesungName'] . "######" . $row['AuswahlName'] . "#####" . $row['AuswahlBeschreibung'] . "######" . '<br />';
	//}
	//$result->free();
	
	if (!$result = $mysqli->query("SELECT LoesungName FROM Loesungen;")){
		echo "<h1>there was an error</h1>" . $mysqli->error;}
	$i=0;
	$Loesung = [];
	while($row = $result->fetch_assoc()){
		//echo $row['LoesungName'] . '<br />';
		$Loesung[$i] = $row['LoesungName'];
    //echo $Loesung[$i] . '<br />';
    $i++;
	}
	
	foreach($Loesung as $item){
		if (!$result = $mysqli->query("SELECT * FROM Loesungen LEFT JOIN Auswahl on Loesungen.idLoesungen = Auswahl.idLoesungen_FK WHERE LoesungName='" . $item . "'")){
			echo "<h1>there was an error</h1>" . $mysqli->error;}
	//$i=0;
	while($row = $result->fetch_assoc()){
		echo $row['AuswahlName'] . '<br />';
		//$Loesung[$i] = $row['LoesungName'];
    //echo $Loesung[$i] . '<br />';
    //$i++;
	}
}
	
 ?>
 
<!-- /action_page.php is the form-handler --> 
<form action="/action_page.php">
  First name:<br>
  <input type="text" name="firstname" value="Mickey"><br>
  Last name:<br>
  <input type="text" name="lastname" value="Mouse"><br><br>
  <input type="submit" value="Submit">
</form>
 
 <form action="/action_page.php">
 <table>
  <tr>
    <th>Loesung</th>
    <th>Auswahl</th>
    <th>Beschreibung</th>
    <th>Produkt</th>
    <th>Preis</th>
    <th>Installationsanteil</th>
  </tr>
 <?php ?>
  
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
</table>
<input type="submit" value="Submit">
</form> 
 
 
 </body>
</html>