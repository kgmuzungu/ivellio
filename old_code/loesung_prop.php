<html>
 <head>
  <title>Device as a Service</title>
 </head>
 <body>
 	<?php echo "Herr/Frau " . $_POST["firstname"] . " " . $_POST["lastname"] . "," . "<br>"; 
 	echo "ihre Auswahl ist: <br>"
 	?>
 	
 	<!--
 	<table>
  <?php 
    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
  ?>
  </table>
  -->
  
  <br><br>
  <?php 
  $mysqli = new mysqli('127.0.0.1', 'root', 'webdev', 'mydb');
	if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    exit;
	}
	
	//wieviele Loesungen gibt es?
	if (!$result = $mysqli->query("SELECT COUNT(*) FROM Loesungen;")){
		die('There was an error running the query [' . $mysqli->error . ']');}
	$LoesungenCount = $result->fetch_assoc();
	$LoesungenCount = (int) $LoesungenCount['COUNT(*)'];
	$result->free();
	
	
	echo "<table>";
	echo "<tr>"."<th>Loesung</th><th>Auswahl</th><th>Beschreibung</th><th>Preis</th><th>Installationsanteil</th>"."</tr>";
	$sumPrice=0;
	$sumInstAnteil=0;
	//$key is the "name"-field of the input statement and value the corresponding value
	foreach ($_POST as $key => $value) {
		//echo "int:" . (int)$key;
		echo "<tr>";
		if ((int)$key!==0) {
			if (!$result = $mysqli->query("SELECT * FROM Loesungen LEFT JOIN Auswahl on Loesungen.idLoesungen = Auswahl.idLoesungen_FK WHERE idLoesungen='" . $key. "'")){
				echo "<h1>there was an error</h1>" . $mysqli->error;}
			$i=1;
			while($i <= $value){ //skipping rows that are not selected
				$row = $result->fetch_assoc();
				$i++;
			} 
			$sumPrice = $sumPrice + floatval($row['AuswahlPreis']);
			$sumInstAnteil = $sumInstAnteil + (floatval($row['AuswahlPreis'])*floatval($row['AuswahlInstAnteil']));
			echo "<td>" . $row['LoesungName']."</td>"."<td>".$row['AuswahlName']."</td>"."<td>".$row['AuswahlBeschreibung']."</td>"."<td>".$row['AuswahlPreis']."<td>"."<td>".$row['AuswahlInstAnteil']."<td>";
			$result->free();
		}//end if
		echo "</tr>";
  }
  echo "</table>";
  echo "GESAMTPREIS:".$sumPrice."EUR <br>";
  echo "GESAMTINSTANTEIL:".$sumInstAnteil."EUR <br>";
  echo "GRAND TOTAL:".($sumPrice+$sumInstAnteil)."EUR <br>";
 	?>
 	
 	
 </body>
</html>