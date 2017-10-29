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
  <link rel="stylesheet" href="DaaS.css">
  <style>
  
  </style>
 </head>
 <body>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"><div class="yw-title"><p id="col2row1"></p></div></div>
        <div class="col-md-3"><div class="gr-title"><p id="col3row1"></p></div></div>
        <div class="col-md-3"><div class="bl-title"><p id="col4row1"></p></div></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p id="col1row2"> Typische Anwendung </p></div>
        <div class="col-md-3"><div class="yw-border"><p id="col2row2"></p></div></div>
        <div class="col-md-3"><div class="gr-border"><p id="col3row2"></p></div></div>
        <div class="col-md-3"><div class="bl-border"><p id="col4row2"></p></div></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p id="col1row3"> Geeignet fuer </p></div>
        <div class="col-md-3"><div class="yw-border"><p id="col2row3"></p></div></div>
        <div class="col-md-3"><div class="gr-border"><p id="col3row3"></p></div></div>
        <div class="col-md-3"><div class="bl-border"><p id="col4row3"></p></div></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p id="col1row4"> Device </p></div>
        <div class="col-md-3"><div class="yw-border"><p id="col2row4"></p></div></div>
        <div class="col-md-3"><div class="gr-border"><p id="col3row4"></p></div></div>
        <div class="col-md-3"><div class="bl-border"><p id="col4row4"></p></div></div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"><div class="yw-border"></div></div>
        <div class="col-md-3"><div class="gr-border"></div></div>
        <div class="col-md-3"><div class="bl-border"></div></div>
    </div>
    <div class="row">
        <div class="col-md-3"><p id="col1row6"> Mietpreis pro Monat </p></div>
        <div class="col-md-3"><div class="yw-border"><p id="col2row6"></p></div></div>
        <div class="col-md-3"><div class="gr-border"><p id="col3row6"></p></div></div>
        <div class="col-md-3"><div class="bl-border"><p id="col4row6"></p></div></div>
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
		        	//var colrow = "col"+(key+2)+"row1"; 
		        	//var colrow = "#col"+(key+2)+"row1"; 
		        	$("#col"+(key+2)+"row1").html(value['dev_arbeitsplatz']);
		        	$("#col"+(key+2)+"row2").html(value['dev_anwendung']);
		        	$("#col"+(key+2)+"row3").html(value['dev_geeignet']);
		        	$("#col"+(key+2)+"row4").html(value['dev_device']);
		        	$("#col"+(key+2)+"row6").html(value['dev_preis']);
        				//string += '<tr> <td> '+key+' ' + JSON.stringify(value) + '</td> </tr>';
            			//string += '<tr> <td> key'+ key+ ' ' + value['iddevices'] + '</td> <td> '+ value['dev_arbeitsplatz']+'</td> </tr>';
	            		//string += '<tr> <td>' + value['iddevices'] + '</td> <td> '+ value['dev_arbeitsplatz']+'</td> </tr>';
	            }); 
	            //string += '</table>'; 
	            //$("div.container").html(string); 
	       }); //end of done function
		        	
		}); //end of ready function
		

	 </script>

 </body>
</html>
 