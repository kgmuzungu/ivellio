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
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/popper.min.js"></script> -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <style>
  </style>
 </head>
 <body>

<div class="container">
<div class="card-deck">
  <div class="card">
    <div class="card-block">
      <h4 class="card-title" id="card1arbeitsplatz"></h4>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item" id="card1anwendung">Cras justo odio</li>
      <li class="list-group-item" id="card1geeignet">Dapibus ac facilisis in</li>
      <li class="list-group-item" id="card1device">Vestibulum at eros</li>
      <li class="list-group-item" id="card1image">image</li>
      <li class="list-group-item" id="card1preis">Vestibulum at eros</li>
      <li class="list-group-item" id="card1config">
      	<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    		Zubehoer und Software
  		</a>
  		<div class="collapse" id="collapseExample">
  			<div class="card">
  			<ul class="list-group list-group-flush">
      			<li class="list-group-item" id="">etc2</li>
      			<li class="list-group-item" id="">etc3</li>
      		</ul>
      		</div>
		</div>
	  </li>
    </ul>
  </div>
  <div class="card">
    <div class="card-block">
      <h4 class="card-title" id="card2arbeitsplatz"></h4>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item" id="card2anwendung">Cras justo odio</li>
      <li class="list-group-item" id="card2geeignet">Dapibus ac facilisis in</li>
      <li class="list-group-item" id="card2device">Vestibulum at eros</li>
      <li class="list-group-item" id="card2image">image</li>
      <li class="list-group-item" id="card2preis">Vestibulum at eros</li>
      <li class="list-group-item" id="card1config"> Zubehoer und Software
  		
  		
		
	  </li>
    </ul>
  </div>
  <div class="card">
    <div class="card-block">
      <h4 class="card-title" id="card3arbeitsplatz"></h4>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item" id="card3anwendung">Cras justo odio</li>
      <li class="list-group-item" id="card3geeignet">Dapibus ac facilisis in</li>
      <li class="list-group-item" id="card3device">Vestibulum at eros</li>
      <li class="list-group-item" id="card3image">image</li>
      <li class="list-group-item" id="card3preis">Vestibulum at eros</li>
      <li class="list-group-item" id="card3config">
      	<ul class="list-group list-group-flush">
      		<li class="list-group-item" id="">etc2</li>
      		<li class="list-group-item" id="">etc3</li>
      	</ul>
      </li>
    </ul>
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

	        	//result is an array of objects
				//console.dir('\n output ' + result[1].dev_arbeitsplatz);
				
				//key is the loop index = for result this is the index of the array = next object
				//and value is the object in the array at position key 
	        	$.each( result, function( key, value ) { 
	        		$("#card"+(key+1)+"arbeitsplatz").html(value['dev_arbeitsplatz']);
		        	$("#card"+(key+1)+"anwendung").html(value['dev_anwendung']);
		        	$("#card"+(key+1)+"geeignet").html(value['dev_geeignet']);
		        	$("#card"+(key+1)+"device").html(value['dev_device']);
		        	$("#card"+(key+1)+"preis").html(value['dev_preis']);
	            }); 
	       }); //end of done function
		}); //end of ready function
	 </script>

 </body>
</html>
 