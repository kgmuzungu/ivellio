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
$msg = "List of arguments \n";

// use wordwrap() if lines are longer than 70 characters


// send email





$receivedData = $_POST;
//var_error_log($receivedData);

foreach($receivedData as $key => $value){
	//$key is the field name
	//$value is the actual value
	$msg = $msg."key:".$key." value:".$value."\n";
	echo $key;
	echo ">>>";
	echo $value;
	echo "***";
}
echo "***end";

$msg = wordwrap($msg,70);
//mail("webdev@WebLAMP.WebLAMP.at","DaaSConfig",$msg);

//echo $jsonReceiveData;
?>