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
  </style>
 </head>
 <body>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p> Typische Anwendung </p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p> Geeignet fuer </p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p> Device </p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p> Mietpreis pro Monat </p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
        <div class="col-md-3"><p></p></div>
    </div>
</div>





 	<!-- load javascript files -->
	 <script>
	 	//the following is using jQuery
	 	$(document).ready(function(){ //as soon as the DOM is ready, execute content
	 		$.ajax({ 
	          	method: "POST", 
	          	url: "DaaSConfig_getDevices.php", 
	         })
	        .done(function( data ) { 
	        	//console.dir(data);      // print to consol for debug
	        	var result = JSON.parse(data); //result form php-service is array
	 
	       		/* test test   output data on page */
	      		var string = '<table> <tr> <th>#</th> <th>Loesung</th> <tr>';
	      		
				//result is an array of objects
				//console.dir('\n output ' + result[1].dev_arbeitsplatz);
				
				//key is the loop index = for result this is the index of the array = next object
				//and value is the object in the array at position key 
	        	$.each( result, function( key, value ) { 

        				//string += '<tr> <td> '+key+' ' + JSON.stringify(value) + '</td> </tr>';
            			//string += '<tr> <td> key'+ key+ ' ' + value['iddevices'] + '</td> <td> '+ value['dev_arbeitsplatz']+'</td> </tr>';
	            		//string += '<tr> <td>' + value['iddevices'] + '</td> <td> '+ value['dev_arbeitsplatz']+'</td> </tr>';
	            	}); 
	             	string += '</table>'; 
	             	$("div.container").html(string); 
	       }); //end of done function
		        	
		}); //end of ready function
		

	 </script>

 </body>
</html>
 