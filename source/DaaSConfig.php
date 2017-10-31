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
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script> -->
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
<form id="main_form">
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
      	<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
    		Zubehoer und Software
  		</a>
  		<div class="collapse" id="collapseExample1">
  			<div class="card">
  			<ul class="list-group list-group-flush" id="conf1"></ul>
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
      <li class="list-group-item" id="card1config">
      	<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
    		Zubehoer und Software
  		</a>
  		<div class="collapse" id="collapseExample2">
  			<div class="card">
  			<ul class="list-group list-group-flush" id="conf2"></ul>
      		</div>
		</div>
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
      <li class="list-group-item" id="card1config">
      	<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
    		Zubehoer und Software
  		</a>
  		<div class="collapse" id="collapseExample3">
  			<div class="card">
  			<ul class="list-group list-group-flush" id="conf3"></ul>
      		</div>
		</div>
	  </li>
    </ul>
  </div> 
 </div> <!-- end card deck -->
 </form>
 
  <div class="card">
    <div class="card-block">
      <h4 class="card-title"> Endpreis (exkl. MWSt): <p id="endpreis"> 0 </p>EUR</h4>
    </div>
  </div>  
 
  <div class="card">
    <div class="card-block">
      <h4 class="card-title" id="angebot"> Individuelles Angebot anfordern </h4>
    </div>
  </div>   

  <div class="card">
    <div class="card-block">
      <h4 class="card-title" id="pdfspeichern"> Als PDF speichern </h4>
    </div>
  </div>   
 
</div> <!-- end container -->





 	<!-- load javascript files -->
	 <script>
	 	//the following is using jQuery
	 	var deviceCount=0; //global var
		var deviceResult=[]; //global for adding up total price use push() to add array element and pop() to remove
	 	$(document).ready(function(){ //as soon as the DOM is ready, execute content
		 	//var deviceCount=0;		 	
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
		        	//$("#card"+(key+1)+"preis").html('<div class="input-group input-group-sm"> <label class="form-check-label">\n<input type="numerical" class="form-control" name="checkbox" value="1">   ' + value['dev_preis'] + ' EUR p.m.</label><span class="input-group-addon" id="basic-addon2">Stk.</span></div>');
		        	//$("#card"+(key+1)+"preis").html('<div class="input-group input-group-sm"><input type="numerical" class="form-control" name="checkbox" value="0"><span class="input-group-addon" id="basic-addon2">Stk.</span>  ' + value['dev_preis'] + ' EUR p.Stk.p.m.</div>');
		        	$("#card"+(key+1)+"preis").html('<h5>Preis:  ' + value['dev_preis'] + 'EUR p.Stk.p.m.</h5> <div class="input-group input-group-sm col-lg-5"><input type="numerical" class="form-control" name="dev_amount'+(key+1)+'" value="0" id="dev_amount"><span class="input-group-addon" id="basic-addon2">Stk.</span></div>');
		        	deviceResult.push(parseFloat(value['dev_preis'])); //save price in array for total price calc		        	
		        	//$("#card"+(key+1)+"preis").html(value['dev_preis']);
		        	//deviceCount++; //counting the offered devices (devices in DB)
	            }); 
	       }); //end of done function
	 		$.ajax({ 
	          	method: "POST", 
	          	url: "DaaSConfig_getConfig.php", 
	         })
	        .done(function( data ) { 
	        	//console.dir(data);      // print to consol for debug
	        	var result = JSON.parse(data); //result form php-service is array

				//key is the loop index = for result this is the index of the array = next object
				//and value is the object in the array at position key 
	        	$.each( result, function( key, value ) { 
	        		//$("#conf"+(value['conf_iddevice'])).append('<li class="list-group-item">' + value['conf_name'] + '</li>');
	        		$("#conf"+(value['conf_iddevice'])).append('<li class="list-group-item"> <label class="form-check-label">\n<input type="checkbox" class="form-check-input" name="checkbox'+(value['conf_iddevice'])+(key+1)+'" value="' + value['conf_preis'] + '" id="checkbox">' + value['conf_name'] + ' ' + value['conf_beschreibung'] + '</label></li>');
	            }); 
	       }); //end of done function	
		}); //end of ready function
		
		$(document).on('click', "#checkbox", function(){
			//alert( "in input, checkbox!" );
			var formResult = $('#main_form').serializeArray();
	    	//var queryString = $('#main_form').serialize();
			calculateFinalPrice(formResult);
	    	
	    	//console.log('deviceCount: '+deviceCount);
	    	//console.log(queryString);
		});
		$(document).on('focusout', "#dev_amount", function(){
			//alert( "in input, lost focus!" );
			var formResult = $('#main_form').serializeArray();
			calculateFinalPrice(formResult);
	    	//var queryString = $('#main_form').serialize();
	    	//console.log(queryString);
		});

		// this function does not autmatically adopt to more than 3 devices but can be easily modified
		//formSerialArray is the serialized form = all inputs that are relevant
		function calculateFinalPrice (formSerialArray){
			var totalPrice=0;
			var multiplicators=[];
			var priceResult=deviceResult.slice();
			//deviceResult global var already has price in it; was set above
			console.log('amount devices:'+deviceResult.length);
			
			
	    	$.each(formSerialArray, function(key, value){
	    		console.log('key '+key+' name '+ value['name'] +' value '+ value['value']);
	    		if (value['name'].includes('dev_amount')){
		    		multiplicators.push(Number(value['value'])); 
	    			//console.log('dev_amount');
			    }
	    		if (value['name'].includes('checkbox')){
	    			priceResult[(Number((value['name'])[8])-1)] += parseFloat(value['value']);
	    			//console.log('checkbox number:');
		    	}
			}); // end .each loop
	    	//finally multiply all sums with the amount of devices
	    	for (i=0; i < deviceResult.length; i++){
					priceResult[i] *= multiplicators[i];
					totalPrice += priceResult[i];
		    }
	    	console.log('totalpreis '+totalPrice);
		    $('#endpreis').html(totalPrice);
    		$.each(priceResult, function(key, value){
	    		console.log('priceresult key '+key+' value '+ value);	
			});
		}
			
	 </script>

 </body>
</html>
 