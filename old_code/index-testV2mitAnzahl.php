<html>
 <head>
  <title>Device as a Service</title>
 </head>
 <body>
 	
 <form action="/loesung_propMitAnzahl.php" method="post">
 <table>
  <!-- <tr>
    <th>Loesung</th>
    <th>Auswahl</th>
    <th>Beschreibung</th>
    <th>Produkt</th>
    <th>Preis</th>
    <th>Installationsanteil</th>
  </tr>
  -->
 
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
	
	//$result = $mysqli->query("SELECT * FROM Loesungen LEFT JOIN Auswahl on Loesungen.idLoesungen = Auswahl.idLoesungen_FK");
	//while($row = $result->fetch_assoc()){
  //  echo $row['LoesungName'] . "######" . $row['AuswahlName'] . "#####" . $row['AuswahlBeschreibung'] . "######" . '<br />';
	//}
	//$result->free();
	
	//if (!$result = $mysqli->query("SELECT LoesungName FROM Loesungen")){
		if (!$result = $mysqli->query("SELECT * FROM Loesungen")){
		echo "<h1>there was an error</h1>" . $mysqli->error;}
	$i=0;
	$Loesung = [];
	//$idLoesungen = [];
	while($row = $result->fetch_assoc()){
		//echo $row['LoesungName'] . '<br />';
		//$idLoesungen[$i] = $row['idLoesungen'];
		$Loesung[$i] = $row['LoesungName'];
    //echo $Loesung[$i] . '<br />';
    $i++;
	}
	
	$i=1; //primary key in Loesungen table, will be sent in the forms POST
	foreach($Loesung as $item){
		if (!$result = $mysqli->query("SELECT * FROM Loesungen LEFT JOIN Auswahl on Loesungen.idLoesungen = Auswahl.idLoesungen_FK WHERE LoesungName='" . $item . "'")){
			echo "<h1>there was an error</h1>" . $mysqli->error;}
		echo "<tr>";
		echo "<td>" . $item . "</td>"; 
		echo "<td> <input type='text' name='amount".$i."' value='1' >" . "</td>";
		echo "<td>";
		echo "<table>";
		$k=0;
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			//echo "<td>" . $row['AuswahlName'] . "</td>";
			echo "<td> <input type='radio' name=".$i." value=". ($k+1) ." required>" . $row['AuswahlName'] . "</td>";
			echo "<td>  Preis:" . $row['AuswahlPreis'] . "</td>";
			echo "</tr>";
			$k++;
			}
		echo "</table>";
		echo "</td>";
		echo "</tr>";
		$i++; //primary key in Loesungen table, will be sent in the forms POST
	}
 ?>
 
</table>
	<br>
	Vorname :
  <input type="text" name="firstname" value="Mickey" required><br>
  Nachname :
  <input type="text" name="lastname" value="Louse" required><br>
	Frima :
  <input type="text" name="company" value="ACME" required><br>
  Telefonnummer :
  <input type="text" name="tel" value="018883520"><br>
  Emailadresse
  <input type="text" name="email" value="mickey.louse@acme.com" required><br><br>
	<input type="submit" value="Submit">
	</form> 
	
	<!-- load javascript files -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.11.1/validate.min.js"></script>
 </body>
</html>