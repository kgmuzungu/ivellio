<?php
//tutorial
//https://programmerblog.net/jquery-ajax-get-example-php-mysql/

//function var_error_log($mixed = null) {
function var_error_log($mixed) {
		
	//ob_start();
	//var_dump($mixed);
	//$content = ob_get_contents();
	//ob_end_clean();
	//error_log( $mixed ); 
	//return $content;
	ob_start();
	var_dump($mixed);
	error_log(ob_get_clean());
}
//var_error_log($_POST);

//check if $_POST is not empty
//if(isset($_POST

//save $_POST array to local var
//$jsonReceiveData = json_encode($_POST);

//$jsonReceiveData = json_decode($_POST);
//var_error_log($jsonReceiveData);

// the message


//$receivedData = $_POST;
//var_error_log($receivedData);

$receivedDataJSONdecoded = json_decode($_POST['data'], true);
//$receivedDataJSONdecode = json_decode($_POST);
//var_error_log($receivedDataJSONdecoded);

$emailMsg = "DaaS Anfrage von Herrn/Frau ".($receivedDataJSONdecoded[0]['Vorname'])." ".($receivedDataJSONdecoded[0]['Nachname']).",\n\n";
$emailMsg = $emailMsg."von Firma:      ".($receivedDataJSONdecoded[0]['Firma'])."\n";
$emailMsg = $emailMsg."Telefonnummer:  ".($receivedDataJSONdecoded[0]['Telefon'])."\n";
$emailMsg = $emailMsg."Emailadresse:   ".($receivedDataJSONdecoded[0]['Email'])."\n";
$emailMsg = $emailMsg."Kommentar:      ".($receivedDataJSONdecoded[0]['Kommentar'])."\n\n";

$emailMsg = $emailMsg."Diese Geraete und Optionen wurden ausgewaehlt:\n";

var_error_log($emailMsg);
var_error_log($receivedDataJSONdecoded[0]);

$msg ="";
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
mail("webdev@WebLAMP.WebLAMP.at","DaaSConfig",$emailMsg);

//echo json_encode($msg);
?>