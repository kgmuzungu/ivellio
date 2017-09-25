<!DOCTYPE html>
<!-- uses BS for layout and validation
		 in the other version I used validate.js
-->

<html>
 <head>
  <title>Device as a Service</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script> -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.11.1/validate.min.js"></script> -->
  <style>
    .help-block.error {
      margin-bottom: 5px;
    }
/*  draws a line
		.row:not(:last-child) {
    border-bottom: 1px solid #ccc;
		}
		.col-xs-3:not(:last-child) {
    border-right: 1px solid #ccc;
		}*/
 </style>
 </head>
 <body>
 <div class="container">
 <form class="form-horizontal" role="form" data-toggle="validator" action="/loesung_V3mABSVal.php" method="post" novalidate>

	<div class='row'>
		<div class='col-md-1'>Loesung</div>
		<div class='col-md-1'>Anzahl</div>
		<div class='col-md-10'>
			<div class='row'>
				<div class='col-md-2'>Produkt</div>
				<div class='col-md-3'>Beschreibung</div>
				<div class='col-md-2'>Preis</div>
				<div class='col-md-2'>Installation Vorbereitung</div>
				<div class='col-md-1'>Installation vor Ort</div>
			</div>
		</div>
	</div>

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
	//problem the connection was not UTF8 encoded
	$mysqli->set_charset("utf8");

	//if (!$result = $mysqli->query("SELECT LoesungName FROM Loesungen")){
		if (!$result = $mysqli->query("SELECT * FROM Loesungen")){
		echo "<h1>there was an error</h1>" . $mysqli->error;}
	$i=0;
	$Loesung = [];
	while($row = $result->fetch_assoc()){
		$Loesung[$i] = $row['LoesungName'];
    //echo $Loesung[$i] . '<br />';
    $i++;
	}

	  //echo "<div class='row'>";
		//echo "<div class='col-md-1'>". "Loesung" ."</div>";
		//echo "<div class='col-md-1'>". "Anzahl" ."</div>";
		//echo "<div class='col-md-10'>";
		//echo "<div class='row'>";
		//echo "<div class='col-md-2'>"."Produkt"."</div>";
	  //echo "<div class='col-md-3'>". "Beschreibung" ."</div>";
	  //echo "<div class='col-md-2'>"."Preis"."</div>";
		//echo "<div class='col-md-1'>" ."InstVorb"."</div>";
		//echo "<div class='col-md-1'>" ."InstVorOrt"."</div>";
		//echo "</div>";
		//echo "</div>";
	  //echo "</div>";

	$i=1; //primary key in Loesungen table, will be sent in the forms POST
	foreach($Loesung as $item){
		if (!$result = $mysqli->query("SELECT * FROM Loesungen LEFT JOIN Auswahl on Loesungen.idLoesungen = Auswahl.idLoesungen_FK WHERE LoesungName='" . $item . "'")){
			echo "<h1>there was an error</h1>" . $mysqli->error;}
		echo "<div class='form-group'>\n";
		echo "<div class='row'> \n";
		echo "<div class='col-md-1'>". $item ."</div> \n"; //Loesungsname
		echo "<div class='col-md-1'> \n"."<input type='numerical' class='form-control' name='amount".$i."' value='1' > \n"."</div> \n"; //Anzahl
		echo "<div class='col-md-10'>\n";
		$k=0;
		//echo "<fieldset class='form-group'>";
		while($row = $result->fetch_assoc()){
			echo "<div class='row'\n>";
			echo "<div class='col-md-2'>"."<div class='form-check'>\n<label title='".$row['AuswahlProdukt']."' class='form-check-label'>\n"."<input type='radio' id='inLoesungSelect' class='form-check-input' name=".$i." value=". ($k+1) ."  >" . $row['AuswahlName']."</label>";
			//check if this Auswahl is included somewhere else. if show glyphicon
			if (intval($row['AuswahlInkl']) != 0 ){
				//ask DB for name where the following Auswahl is included
				if (!$result2 = $mysqli->query("SELECT AuswahlName FROM Auswahl WHERE idAuswahl='" . $row['AuswahlInkl'] . "'")){
					echo "<h1>there was an error</h1>" . $mysqli->error;}
					$row2 = $result2->fetch_assoc();
					echo "<span class='glyphicon glyphicon-info-sign' style='color:red' aria-hidden='true' title='inkludiert in: ".$row2['AuswahlName']."'></span>";
					$result2->free();
				}
			echo "\n</div></div>\n";
			//echo "</fieldset>";
			echo "<div class='col-md-3'>".$row['AuswahlBeschreibung']."</div>\n";
			echo "<div class='col-md-2'>".$row['AuswahlPreis']." EUR" ."</div>\n";

			//Installationsanteil
			echo "<div class='col-md-5'>";
			echo "<fieldset>";
			if (!(floatval($row['AuswahlInstVorbe'])==0.00)){
				echo "<div class='col-md-4'>\n" ."<div class='form-check'>\n<label class='form-check-label'>\n"."<input type='radio' class='form-check-input' name='checkbox".$i.$k."' value='1' >" . $row['AuswahlInstVorbe']." EUR"."</label>\n</div></div>\n";}
			if (!(floatval($row['AuswahlInstVorOrt'])==0.00)){
				echo "<div class='col-md-4'>\n" ."<div class='form-check'>\n<label class='form-check-label'>\n"."<input type='radio' class='form-check-input' name='checkbox".$i.$k."' value='2' >" . $row['AuswahlInstVorOrt']." EUR"."</label>\n</div></div>\n";}
			echo "</fieldset>";
			echo "</div>";

			echo "</div>";//row
			$k++;
			}
		echo "</div>"; //div before while
		echo "</div>"; //form-group
		echo "</div>";
		$i++; //primary key in Loesungen table, will be sent in the forms POST
	}
 ?>

			</br></br>
			<p>Um Sie zu Ihrer Auswahl beraten zu koennen braeuchten wir ein paar Daten von Ihnen. Ihre Daten werden streng vertraulich behandelt und nicht an Dritte weitergegeben</p>
	    <div class="form-group">
        <label class="col-sm-2 control-label" for="email">Email</label>
        <div class="col-sm-5">
          <input id="email" class="form-control" type="email" placeholder="Email" name="Email" >
        </div>
        <div class="col-sm-5 messages"></div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="password">Vorname</label>
        <div class="col-sm-5">
          <input id="firstname" class="form-control" type="text" placeholder="Vorname" name="Vorname" >
        </div>
        <div class="col-sm-5 messages"></div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="lastname">Nachname</label>
        <div class="col-sm-5">
          <input id="lastname" class="form-control" type="text" placeholder="Nachname" name="Nachname" >
        </div>
        <div class="col-sm-5 messages"></div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="company">Firma</label>
        <div class="col-sm-5">
          <input id="company" class="form-control" type="text" placeholder="Firma" name="Firma">
        </div>
        <div class="col-sm-5 messages">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="telefone">Telefon</label>
        <div class="col-sm-5">
          <input id="telefone" class="form-control" type="text" pattern="^[0][0-9]{8,14}$" maxlength="14" placeholder="0123456789 keine Sonderzeichen wie + oder / oder -" name="Telefon">
        </div>
        <div class="col-sm-5 messages"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
	</form>
	</div> <!-- id=container -->

	<!-- load javascript files -->
	 <script>
	 	//the following is using jQuery
	 	$(document).ready(function(){ //as soon as the DOM is ready, execute content
	 		$("input[name*='checkbox']").prop("disabled", true); // set all InstallationVorb or VorOrt checkboxes to disabled
    	$("input[id=inLoesungSelect]").click(function(){
    		//each time a Loesung is clicked all Installation checkboxes are unchecked and disabled then the only two relevant are enabled
    		//[name*='sdfsdf'] finds all elements that have sdfsdf in the name string
        $("input[name*='checkbox" + $(this).attr("name") + "']").prop("checked", false);
        $("input[name*='checkbox" + $(this).attr("name") + "']").prop("disabled", true);
        //$("input[name*='checkbox" + $(this).attr("name") + ($(this).attr("value")-1) + "']").prop("disabled", false);
        //jquery .each() function is used to iterate through object arrays
        $("input[name*='checkbox" + $(this).attr("name") + ($(this).attr("value")-1) + "']").each(function(index){
				$(this).prop("disabled", false);
				if (index==0) {$(this).prop("checked", true);}
			});
    	});
		});
		//end of jQuery code

	 </script>

 </body>
</html>
