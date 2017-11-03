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
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
  	@font-face {
    	font-family: GlyphaLT55;
    	src: url(glypha-lt-55-roman-59f998248fb40.ttf) format("truetype");
		}
  	html {
		font-size: 14px;
		}
	body{
		font-family: "Courier New", Courier, monospace;
		color:#000;
	}
	div.card{background-color:#f9f7f7;}
	li[id^="card"]{
		padding-bottom: 0.25rem;
		padding-top: 0.5rem;
		background-color:#f9f7f7;
		}
	ul#listIcons { list-style:none; }
	ul#listIcons li { margin-bottom:0px; }
	li#listIcons:before {    
    	font-family: 'FontAwesome';
    	aria-hidden='true';
    	content: '\f087';
    	margin:0 5px 0 -15px;
    	color: #868E96;
		}
	#pdfspeichern:before {    
    	font-family: 'FontAwesome';
    	aria-hidden='true';
    	content: '\f1c1';
    	margin:0 5px 0 -15px;
    	color: #000;
		}
	#angebot:before {    
    	font-family: 'FontAwesome';
    	aria-hidden='true';
    	content: '\f0e0';
    	margin:0 5px 0 -15px;
    	color: #000;
		}
	.anchorAngebot, .anchorAngebot:hover {
		color:#000;
		text-decoration: none;
		}
	.textAngebot {padding:1rem 1rem 1rem 1rem;}
	.btn{margin-bottom:10px;}
	.bg-primary{background-color:#3e9bff;}
	.bg-success{background-color:#3bd75e;}
  
  </style>
 </head>
 <body>

<div class="container">
<form id="main_form">
<div class="card-deck">
  <div class="card">
  	 <div class="card-header" style="background-color:#3e9bff;"><h5 style="font-weight:bold;" id="card1arbeitsplatz"></h4></div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item " id="card1anwendung">Cras justo odio</li>
      <li class="list-group-item" id="card1geeignet">Dapibus ac facilisis in</li>
      <li class="list-group-item" id="card1device">Vestibulum at eros</li>
      <li class="list-group-item" id="card1image">image</li>
      <li class="list-group-item" id="card1preis">Vestibulum at eros</li>
      <li class="list-group-item" id="card1config">
      	<a class="btn btn-outline-primary" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
    		<b>Zubehoer und Software</b>
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
  	 <div class="card-header" style="background-color:#3bd75e;"><h5 style="font-weight:bold;" id="card2arbeitsplatz"></h4></div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item" id="card2anwendung">Cras justo odio</li>
      <li class="list-group-item" id="card2geeignet">Dapibus ac facilisis in</li>
      <li class="list-group-item" id="card2device">Vestibulum at eros</li>
      <li class="list-group-item" id="card2image">image</li>
      <li class="list-group-item" id="card2preis">Vestibulum at eros</li>
      <li class="list-group-item" id="card1config">
      	<a class="btn btn-outline-success" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
    		<b>Zubehoer und Software</b>
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
  	 <div class="card-header bg-warning"><h5 style="font-weight:bold;" id="card3arbeitsplatz"></h4></div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item" id="card3anwendung">Cras justo odio</li>
      <li class="list-group-item" id="card3geeignet">Dapibus ac facilisis in</li>
      <li class="list-group-item" id="card3device">Vestibulum at eros</li>
      <li class="list-group-item" id="card3image">image</li>
      <li class="list-group-item" id="card3preis">Vestibulum at eros</li>
      <li class="list-group-item" id="card1config">
      	<a class="btn btn-outline-warning" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
    		<b>Zubehoer und Software</b>
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
 <!-- </form> -->
 
  <div class="card text-white" style="border-color:#f35d5d; background-color:#f35d5d;margin-top: 5px;margin-bottom: 5px;">
    <div class="card-block">
      <h4 class="card-title my-auto"> <b style="padding-left: 30px;">Endpreis (exkl. MWSt): <span id="endpreis"> 0 </span> EUR p.m.</b></h4>
    </div>
  </div>  
 
  <div class="card">
    <div class="card-block">
      <h4 class="card-title my-auto" style="padding-left: 30px;"> <span id="pdfspeichern">Als PDF speichern </span></h4>
    </div>
  </div>   

  <div class="card">
    <div class="card-block">
      <a class="anchorAngebot" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
      		<h4 class="card-title my-auto" style="padding-left: 30px;"> 
      			<span id="angebot">Individuelles Angebot anfordern 
      			</span></h4>
      </a>
    </div>
    	<div class="collapse" id="collapseExample4">
  			<div class="card">
  				
				<!-- ********************************************************* -->
				
		<p class="textAngebot">Um Sie zu Ihrer Auswahl beraten zu koennen braeuchten wir ein paar Daten von Ihnen. Ihre Daten werden streng vertraulich behandelt und nicht an Dritte weitergegeben</p>
		
	    <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="text-align:right;">Email</label>
        <div class="col-sm-5">
          <input id="email" class="form-control" type="email" placeholder="Email" name="Email" >
        </div>
        <div class="col-sm-5 messages"></div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="text-align:right;">Vorname</label>
        <div class="col-sm-5">
          <input id="firstname" class="form-control" type="text" placeholder="Vorname" name="Vorname" >
        </div>
        <div class="col-sm-5 messages"></div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="text-align:right;">Nachname</label>
        <div class="col-sm-5">
          <input id="lastname" class="form-control" type="text" placeholder="Nachname" name="Nachname" >
        </div>
        <div class="col-sm-5 messages"></div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="text-align:right;">Firma</label>
        <div class="col-sm-5">
          <input id="company" class="form-control" type="text" placeholder="Firma" name="Firma">
        </div>
        <div class="col-sm-5 messages">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" style="text-align:right;">Telefon</label>
        <div class="col-sm-5">
          <input id="telefone" class="form-control" type="text" pattern="^[0][0-9]{8,14}$" maxlength="14" placeholder="0123456789 keine Sonderzeichen wie + oder / oder -" name="Telefon">
        </div>
        <div class="col-sm-5 messages"></div>
      </div>

      <div class="form-group row">
      <div class="col-sm-2"></div>
        <div class="col-sm-5">
          <button type="submit" class="btn btn-outline-secondary">Versenden</button>
        </div>
      </div>
				
  				<!-- ********************************************************* -->
  				
    		</div>
		</div>
    
  </div>   
 </form>
</div> <!-- end container -->





 	<!-- load javascript files -->
	 <script>
	 	//the following is using jQuery
	 	var deviceCount=0; //global var
		var deviceResult=[]; //global for adding up total price use push() to add array element and pop() to remove

		//takes a string, usually from the DB, and after each <br> it will incect a <i class=...>
		
		function injectGlyphicon (myString){
			var end=false;
			var beginning="";
			var rest=myString;
			console.log("in injectGlyphicon");
			var iStringFirst = "<i class='fa fa-check' aria-hidden='true' style='color:#868E96'></i>";
			//var iStringMiddle = "<br>"+iStringFirst;
			rest = rest.replace(/^/,iStringFirst);
			while(!end){
				if (rest.search("<br>")>0){
					beginning=beginning+rest.substring(0,(rest.indexOf("<br>")+4));
					rest=rest.substring((rest.indexOf("<br>")+4)); //substring(start,end)
					rest= rest.replace (/^/,iStringFirst);
					console.log("in if; beginning " + beginning);
					console.log("in if; rest "+ rest);
				} else {
					end=true;
				}	 
			}
			//myString = myString.replace(/^/,iString); //regexp ... replace beginning with new iString
			return beginning+rest;
		}

		function createListGlyphicon(myString){
			var end=false;
			var beginning="";
			var rest=myString;
			console.log("in createListGlyphicon");
			//var strIcon = "<i class='fa fa-check' aria-hidden='true' style='color:#868E96'></i>";
			var strIcon = "<i class='fa fa-check' style='color:#868E96'></i>";
			var strUL = "<ul id='listIcons'>";
			var strULend ="</ul>";
			var strLI = "<li id='listIcons'>";
			var strLIend = "</li>";
			//var iStringMiddle = "<br>"+iStringFirst;
			rest = rest.replace(/^/,strUL+strLI);
			
			while(!end){
				if (rest.search("<br>")>0){
					beginning=beginning+rest.substring(0,(rest.indexOf("<br>")));
					beginning = beginning + strLIend; //close list tag at end of string
					rest=rest.substring((rest.indexOf("<br>")+4)); //substring(start,end)
					rest= rest.replace (/^/,strLI);
					console.log("in if; beginning " + beginning);
					console.log("in if; rest "+ rest);
				} else {
					end=true;
				}	 
			}
			//myString = myString.replace(/^/,iString); //regexp ... replace beginning with new iString
			return beginning+rest+strULend;
			}
		
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
		        	//$("#card"+(key+1)+"anwendung").html("<i class='fa fa-check' aria-hidden='true' style='color:#868E96'></i>"+value['dev_anwendung']);
		        	$("#card"+(key+1)+"anwendung").html("<h6>Anwendung:</h6>"+createListGlyphicon(value['dev_anwendung']));
		        	//$("#card"+(key+1)+"anwendung").html(value['dev_anwendung']);
		        	$("#card"+(key+1)+"geeignet").html("<h6>Geeignet f&uuml;r:</h6>"+createListGlyphicon(value['dev_geeignet']));
		        	//$("#card"+(key+1)+"geeignet").html(value['dev_geeignet']);
		        	$("#card"+(key+1)+"device").html("<h5><b>"+value['dev_device']+"</b></h5>"+createListGlyphicon(value['dev_beschreibung']));
		        	$("#card"+(key+1)+"image").html("<img class='card-img-top' src='"+value['dev_imagepath']+"' alt='"+value['dev_device']+"'>");
		        	//$("#card"+(key+1)+"preis").html('<div class="input-group input-group-sm"> <label class="form-check-label">\n<input type="numerical" class="form-control" name="checkbox" value="1">   ' + value['dev_preis'] + ' EUR p.m.</label><span class="input-group-addon" id="basic-addon2">Stk.</span></div>');
		        	//$("#card"+(key+1)+"preis").html('<div class="input-group input-group-sm"><input type="numerical" class="form-control" name="checkbox" value="0"><span class="input-group-addon" id="basic-addon2">Stk.</span>  ' + value['dev_preis'] + ' EUR p.Stk.p.m.</div>');
		        	$("#card"+(key+1)+"preis").html('<div class="row"><div class="col-lg-5 my-auto" style="font-size:1.2rem;"> &aacute; ' + value['dev_preis'] + 'EUR</div> <div class="input-group col-lg-5"><input type="numerical" class="form-control" name="dev_amount'+(key+1)+'" value="0" id="dev_amount"><span class="input-group-addon" id="basic-addon2">Stk.</span></div></div>');
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

		//this function should scroll to the bottom of the page when any bootstrap collapse was clicked
		$(document).on('shown.bs.collapse', function(event){
			//console.log( "in angebot! print e: " +event.type);
			event.target.scrollIntoView({behavior: "smooth"});
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
 