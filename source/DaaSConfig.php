<!DOCTYPE html>
<!-- uses BS for layout and validation
		 in the other version I used validate.js
-->

<html>
 <head>
  <title>Device as a Service</title>
  <meta charset="UTF-8">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script> -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.11.1/validate.min.js"></script> -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  
  <style>
  </style>
 </head>
 <body>

<div class="container">
<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-block">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-block">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="..." alt="Card image cap">
    <div class="card-block">
      <h4 class="card-title">Card title</h4>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
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
	      		//var string = '<table> <tr> <th>#</th> <th>Loesung</th> <tr>';
	      		
				//result is an array of objects
				//console.dir('\n output ' + result[1].dev_arbeitsplatz);
				
				//key is the loop index = for result this is the index of the array = next object
				//and value is the object in the array at position key 
	        	$.each( result, function( key, value ) { 
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
 