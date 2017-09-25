<html>
 <head>
  <title>Device as a Service: Service Konfiguration</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 </head>
 <body>
 	
<!-- 	
 	<?php echo "Herr/Frau " . $_POST["firstname"] . " " . $_POST["lastname"] . "," . "<br>";
 	echo "ihre Auswahl ist: <br>"
 	?>
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
  
  <div class="container">
	  <p>Ihre Kontaktdaten sind:</p>
	  <div class="col-lg-6">
	  <div class="row">
		<div class="col-lg-6"> Vorname </div> <div class="col-lg-6"><?php echo $_POST["Vorname"]?></div>
	  </div><div class="row">
		<div class="col-lg-6"> Nachname </div> <div class="col-lg-6"><?php echo $_POST["Nachname"]?></div>
	  </div><div class="row">
		<div class="col-lg-6"> Firma </div> <div class="col-lg-6"><?php echo $_POST["Firma"]?></div>
	  </div><div class="row">	
		<div class="col-lg-6"> Email </div> <div class="col-lg-6"><?php echo $_POST["Email"]?></div>
	  </div><div class="row">	
		<div class="col-lg-6"> Telefon </div> <div class="col-lg-6"><?php echo $_POST["Telefon"]?></div>
	  </div> <!-- end div row -->
	  </div>
  </div> <!-- end div container --> 


  <br><br>
  <div class="container">
	  <p>Ihre Device as a Service Zusammenstellung ist:</p>
	  <div class="col-lg-12">
  <?php
  $mysqli = new mysqli('127.0.0.1', 'root', 'webdev', 'mydb');
	if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    exit;
	}
  $mysqli->set_charset("utf8");

	//wieviele Loesungen gibt es?
	if (!$result = $mysqli->query("SELECT COUNT(*) FROM Loesungen;")){
		die('There was an error running the query [' . $mysqli->error . ']');}
	$LoesungenCount = $result->fetch_assoc();
	$LoesungenCount = (int) $LoesungenCount['COUNT(*)'];
	$result->free();


	echo "<div class='row'>\n";
	echo "<div class='col-lg-1'> Loesung </div><div class='col-lg-1'> Anzahl </div><div class='col-lg-3'> Auswahl </div><div class='col-lg-5'> Beschreibung </div><div class='col-lg-1'> Preis </div><div class='col-lg-1'> Install </div>";
	$sumTotal=0;
	$sumService=0;
	$sumInstAnteil=0;
	//$key is the "name"-field of the input statement and value the corresponding value
	foreach ($_POST as $key => $value) {
		//echo "<tr>";
		echo "<div class='row'>\n";
		//echo "key as int ".(int)$key;
		if ((int)$key!==0) { //(int)$key is 0 if key is a string
			//echo "key is = ".$key."</br>";
			//db query in loop? because $key is PrimKey for Loesungen
			if (!$result = $mysqli->query("SELECT * FROM Loesungen LEFT JOIN Auswahl on Loesungen.idLoesungen = Auswahl.idLoesungen_FK WHERE idLoesungen='" . $key. "'")){
				echo "<h1>there was an error</h1>" . $mysqli->error;}
			$i=1;
			while($i <= $value){ //skipping rows that are not selected
				$row = $result->fetch_assoc();
				$i++;
			}
			$amountX = $_POST["amount".(int)$key];
			//installation Vorbereitung or VorOrt
			echo "<div class='col-lg-1'>" . $row['LoesungName']."</div>"."<div class='col-lg-1'>".$amountX."</div>"."<div class='col-lg-3'>".$row['AuswahlName']."</div>"."<div class='col-lg-5'>".$row['AuswahlBeschreibung']."</div>"."<div class='col-lg-1'>".$row['AuswahlPreis']."</div>";
			if ($_POST["checkbox".(int)$key.((int)$value-1)]==2) {
				$sumInstAnteil = floatval($row['AuswahlInstVorOrt']);
				echo "<div class='col-lg-1'>".$row['AuswahlInstVorOrt']."</div>";
				} else {
					$sumInstAnteil = floatval($row['AuswahlInstVorbe']);
					echo "<div class='col-lg-1'>".$row['AuswahlInstVorbe']."</div>";
					}
			$sumService = $amountX*(floatval($row['AuswahlPreis']) + $sumInstAnteil);
			$result->free();
		}//end if
		$sumTotal = $sumTotal + $sumService;
		$sumService = 0;
		$sumInstAnteil = 0;
		//echo "</tr>";
		echo "</div>"; // div end row
  }//end for
  echo "</div></br>"; // div end row
  echo "GESAMTPREIS: ".number_format($sumTotal, 2, ",", ".")."EUR </br>";
 	?>
 	 </div> <!-- end div col --> 
 	</div> <!-- end div container --> 
 	
 	<div class="container">
		</br></br></br>
		<p>Wollen Sie diese Zusammenstellung als Email an Ivellio-Vellin schicken?</p>
		<button type="submit" class="btn btn-default">Email senden</button> 
 	</div>
 	
 </body>
</html>
