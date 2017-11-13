<?php
//function var_error_log($mixed = null) {
function var_error_log($mixed) {
	ob_start();
	var_dump($mixed);
	error_log(ob_get_clean());
}
//var_error_log($_POST);

//check if $_POST is not empty
//if(isset($_POST

$receivedDataJSONdecoded = json_decode($_POST['data'], true);
//$receivedDataJSONdecode = json_decode($_POST);
//var_error_log($receivedDataJSONdecoded);

$emailMsg = "DaaS Anfrage von Herrn/Frau ".($receivedDataJSONdecoded[0]['Vorname'])." ".($receivedDataJSONdecoded[0]['Nachname']).",\n\n";
$emailMsg = $emailMsg."von Firma:      ".($receivedDataJSONdecoded[0]['Firma'])."\n";
$emailMsg = $emailMsg."Telefonnummer:  ".($receivedDataJSONdecoded[0]['Telefon'])."\n";
$emailMsg = $emailMsg."Emailadresse:   ".($receivedDataJSONdecoded[0]['Email'])."\n";
$emailMsg = $emailMsg."Kommentar:      ".($receivedDataJSONdecoded[0]['Kommentar'])."\n\n";

$emailMsg = $emailMsg."Diese Geraete und Optionen wurden ausgewaehlt:\n";

//var_error_log($emailMsg);
//var_error_log($receivedDataJSONdecoded[0]);

//two cascaded arrays; outer array max 3 elements =  3 diferent Arbeitsplaetze; inner array info amount plus options
foreach($receivedDataJSONdecoded as $key => $value){
	if ($key!=0) {
		foreach ($value as $key2 => $value2){
			$emailMsg= $emailMsg."  ".$key2.": ".$value2."\n";
		}
	}
	$emailMsg=$emailMsg."\n";
}

//$emailMsg=$emailMsg."\n\nDieses ist zur internen Verwendung gedacht\n";

//use wordwrap() if lines are longer than 70 characters
$emailMsg= wordwrap($emailMsg,70);
//hier die To: Emailadresse eintragen
$emailTo="webdev@WebLAMP.WebLAMP.at";
// oder auch das selbe Email an den Kunden
//$emailTo="webdev@WebLAMP.WebLAMP.at".$receivedDataJSONdecoded[0]['Email'];
$success=mail($emailTo,"DaaSConfig",$emailMsg);

var_error_log($success);

$returnMsg ="";
if ($success) {$returnMsg = "Vielen Dank!\nIhre Nachricht wurde erfolgreich an uns uebermittelt.\nWir werden Sie in Kuerze kontaktieren";}
else {$returnMsg = "Es ist leider ein Problem bei der Uebertragung aufgetreten.\nBitte kontaktieren Sie uns direkt oder versuchen Sie es später nochmals";}

echo json_encode($returnMsg);
?>