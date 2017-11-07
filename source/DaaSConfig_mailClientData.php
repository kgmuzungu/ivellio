<?php
//tutorial
//https://programmerblog.net/jquery-ajax-get-example-php-mysql/

function var_dump_log($mixed = null) {
	ob_start();
	var_dump($mixed);
	$content = ob_get_contents();
	ob_end_clean();
	error_log( $contents ); 
	//return $content;
}

//check if $_POST is not empty
//if(isset($_POST

var_error_log($_POST);

//save $_POST array to local var
//$jsonReceiveData = json_encode($_POST);

$jsonReceiveData = json_decode($_POST);



foreach($jsonReceiveData as $obj){
	echo $obj->name;	
}
echo "***end";
//echo $jsonReceiveData;
?>