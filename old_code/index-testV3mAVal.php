<!DOCTYPE html>
<html>
 <head>
  <title>Device as a Service</title>
  <meta charset="UTF-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.11.1/validate.min.js"></script>
  <style>
    .help-block.error {
      margin-bottom: 5px;
    }
/*  draws a line 
		.row:not(:last-child) {
    border-bottom: 1px solid #ccc;
		}
		.col-xs-3:not(:last-child) {
    border-right: 1px solid #ccc;
		}*/
 </style>
 </head>
 <body>
 <div class="container">
 <form id="DaaS_main" class="form-horizontal" action="/loesung_propmAVal.php" method="post" novalidate="">
 	
	<div class='row'>
		<div class='col-md-1'>Loesung</div>
		<div class='col-md-1'>Anzahl</div>
		<div class='col-md-10'>
			<div class='row'>
				<div class='col-md-2'>Produkt</div>
				<div class='col-md-3'>Beschreibung</div>
				<div class='col-md-2'>Preis</div>	
				<div class='col-md-1'>InstVorb</div>
				<div class='col-md-1'>InstVorOrt</div>
			</div>
		</div>
	</div>
 	
 <?php
	// mysqli
	//$mysqli = new mysqli("example.com", "user", "password", "database");
	$mysqli = new mysqli('127.0.0.1', 'root', 'webdev', 'mydb');
	if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    exit;
	}

	//if (!$result = $mysqli->query("SELECT LoesungName FROM Loesungen")){
		if (!$result = $mysqli->query("SELECT * FROM Loesungen")){
		echo "<h1>there was an error</h1>" . $mysqli->error;}
	$i=0;
	$Loesung = [];
	while($row = $result->fetch_assoc()){
		$Loesung[$i] = $row['LoesungName'];
    //echo $Loesung[$i] . '<br />';
    $i++;
	}
	
	  //echo "<div class='row'>"; 
		//echo "<div class='col-md-1'>". "Loesung" ."</div>";
		//echo "<div class='col-md-1'>". "Anzahl" ."</div>";
		//echo "<div class='col-md-10'>";
		//echo "<div class='row'>";
		//echo "<div class='col-md-2'>"."Produkt"."</div>";
	  //echo "<div class='col-md-3'>". "Beschreibung" ."</div>";
	  //echo "<div class='col-md-2'>"."Preis"."</div>";	
		//echo "<div class='col-md-1'>" ."InstVorb"."</div>";
		//echo "<div class='col-md-1'>" ."InstVorOrt"."</div>";
		//echo "</div>";
		//echo "</div>";
	  //echo "</div>";
		
	$i=1; //primary key in Loesungen table, will be sent in the forms POST
	foreach($Loesung as $item){
		if (!$result = $mysqli->query("SELECT * FROM Loesungen LEFT JOIN Auswahl on Loesungen.idLoesungen = Auswahl.idLoesungen_FK WHERE LoesungName='" . $item . "'")){
			echo "<h1>there was an error</h1>" . $mysqli->error;}
		echo "<div class='form-group'>";
		echo "<div class='row'>"; 
		echo "<div class='col-md-1'>". $item ."</div>"; //Loesungsname
		echo "<div class='col-md-1'>"."<input type='numerical' class='form-control' name='amount".$i."' value='1' >"."</div>"; //Anzahl
		echo "<div class='col-md-10'>";
		$k=0;
		//echo "<fieldset class='form-group'>";
		while($row = $result->fetch_assoc()){
			echo "<div class='row'>";
			echo "<div class='col-md-2'>"."<div class='form-check'><label class='form-check-label'>"."<input type='radio' class='form-check-input' name=".$i." value=". ($k+1) ." >" . $row['AuswahlName']."</label></div></div>";
			//echo "</fieldset>";
			echo "<div class='col-md-3'>" . $row['AuswahlBeschreibung']."</div>";
			echo "<div class='col-md-2'>".$row['AuswahlPreis']." EUR" ."</div>";
			
			//Installationsanteil
			//echo "<fieldset>";
			if (!(floatval($row['AuswahlInstVorbe'])==0.00)){
				echo "<div class='col-md-1'>" ."<div class='form-check'><label class='form-check-label'>". "<input type='checkbox' class='form-check-input' name="."checkbox1".$i." value=". ($k+1) ." >" . $row['AuswahlInstVorbe']." EUR"."</label></div></div>";}
			if (!(floatval($row['AuswahlInstVorOrt'])==0.00)){
				echo "<div class='col-md-1'>" ."<div class='form-check'><label class='form-check-label'>"."<input type='checkbox' class='form-check-input' name="."checkbox2".$i." value=". ($k+1) ." >" . $row['AuswahlInstVorOrt']." EUR"."</label></div></div>";}
			//echo "</fieldset>";
			
			echo "</div>";//row
			$k++;
			}
		echo "</div>"; //div before while
		echo "</div>"; //form-group
		echo "</div>";
		$i++; //primary key in Loesungen table, will be sent in the forms POST
	}
 ?>
  
	    <div class="form-group">
        <label class="col-sm-2 control-label" for="email">Email</label>
        <div class="col-sm-5">
          <input id="email" class="form-control" type="email" placeholder="Email" name="email">
        </div>
        <div class="col-sm-5 messages"></div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label" for="password">Vorname</label>
        <div class="col-sm-5">
          <input id="firstname" class="form-control" type="text" placeholder="Vorname" name="firstname">
        </div>
        <div class="col-sm-5 messages"></div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label" for="lastname">Nachname</label>
        <div class="col-sm-5">
          <input id="lastname" class="form-control" type="text" placeholder="Nachname" name="lastname">
        </div>
        <div class="col-sm-5 messages"></div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label" for="company">Firma</label>
        <div class="col-sm-5">
          <input id="company" class="form-control" type="text" placeholder="Firma" name="company">
        </div>
        <div class="col-sm-5 messages">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label" for="telefone">Telefon</label>
        <div class="col-sm-5">
          <input id="telefone" class="form-control" type="text" placeholder="0123456789" name="telefone">
        </div>
        <div class="col-sm-5 messages"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
	</form> 
	</div> <!-- id=container -->
	
	<!-- load javascript files -->
	 <script>
    (function() {

      // These are the constraints used to validate the form
      var constraints = {
        email: {
          // Email is required
          presence: true,
          // and must be an email (duh)
          email: true
        },
        firstname: {
          // You need to pick a username too
          presence: true,
          // And it must be between 3 and 20 characters long
          length: {
            minimum: 3,
            maximum: 10
          },
          format: {
            // We don't allow anything that a-z and 0-9
            pattern: "[a-z]+",
            // but we don't care if the username is uppercase or lowercase
            flags: "i",
            message: "can only contain a-z"
          }
        },
        lastname: {
          // You need to pick a username too
          presence: true,
          // And it must be between 3 and 20 characters long
          length: {
            minimum: 3,
            maximum: 15
          },
          format: {
            // We don't allow anything that a-z and 0-9
            pattern: "[a-z]+",
            // but we don't care if the username is uppercase or lowercase
            flags: "i",
            message: "can only contain a-z"
          }
        },
        company: {
          // You need to pick a username too
          presence: true,
          // And it must be between 3 and 20 characters long
          length: {
            minimum: 3,
            maximum: 10
          },
          format: {
            // We don't allow anything that a-z and 0-9
            pattern: "[a-z0-9]+",
            // but we don't care if the username is uppercase or lowercase
            flags: "i",
            message: "can only contain a-z and 0-9"
          }
        },
        telefone: {
          // You need to pick a username too
          presence: true,
          // And it must be between 3 and 20 characters long
          length: {
            minimum: 9,
            maximum: 15
          },
          format: {
            // We don't allow anything that a-z and 0-9
            pattern: "[0-9]+",
            // but we don't care if the username is uppercase or lowercase
            message: "can only contain 0-9"
          }
        },        
        amount1: {
          presence: true,
          // Number of children has to be an integer >= 0
          numericality: {
            onlyInteger: true,
            greaterThanOrEqualTo: 0
          }
        }
      };

      // Hook up the form so we can prevent it from being posted
      var form = document.querySelector("form#DaaS_main");
      form.addEventListener("submit", function(ev) {
        ev.preventDefault();
        handleFormSubmit(form);
      });

      // Hook up the inputs to validate on the fly
      // ich denk ich brauch bloss input
      var inputs = document.querySelectorAll("input")
      for (var i = 0; i < inputs.length; ++i) {
        inputs.item(i).addEventListener("change", function(ev) {
          var errors = validate(form, constraints) || {};
          showErrorsForInput(this, errors[this.name])
        });
      }

      function handleFormSubmit(form, input) {
        // validate the form aainst the constraints
        var errors = validate(form, constraints);
        // then we update the form to reflect the results
        showErrors(form, errors || {});
        if (!errors) {
          showSuccess();
        }
      }

      // Updates the inputs with the validation errors
      function showErrors(form, errors) {
        // We loop through all the inputs and show the errors for that input
        _.each(form.querySelectorAll("input[name], select[name]"), function(input) {
          // Since the errors can be null if no errors were found we need to handle
          // that
          showErrorsForInput(input, errors && errors[input.name]);
        });
      }

      // Shows the errors for a specific input
      function showErrorsForInput(input, errors) {
        // This is the root of the input
        var formGroup = closestParent(input.parentNode, "form-group")
          // Find where the error messages will be insert into
          , messages = formGroup.querySelector(".messages");
        // First we remove any old messages and resets the classes
        resetFormGroup(formGroup);
        // If we have errors
        if (errors) {
          // we first mark the group has having errors
          formGroup.classList.add("has-error");
          // then we append all the errors
          _.each(errors, function(error) {
            addError(messages, error);
          });
        } else {
          // otherwise we simply mark it as success
          formGroup.classList.add("has-success");
        }
      }

      // Recusively finds the closest parent that has the specified class
      function closestParent(child, className) {
        if (!child || child == document) {
          return null;
        }
        if (child.classList.contains(className)) {
          return child;
        } else {
          return closestParent(child.parentNode, className);
        }
      }

      function resetFormGroup(formGroup) {
        // Remove the success and error classes
        formGroup.classList.remove("has-error");
        formGroup.classList.remove("has-success");
        // and remove any old messages
        _.each(formGroup.querySelectorAll(".help-block.error"), function(el) {
          el.parentNode.removeChild(el);
        });
      }

      // Adds the specified error with the following markup
      // <p class="help-block error">[message]</p>
      function addError(messages, error) {
        var block = document.createElement("p");
        block.classList.add("help-block");
        block.classList.add("error");
        block.innerText = error;
        messages.appendChild(block);
      }

      function showSuccess() {
        // We made it \:D/
        alert("Success!");
      }
    })();
  </script>
 </body>
</html>