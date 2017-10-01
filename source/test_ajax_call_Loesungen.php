<html> 

<head> 

   <title>jQuery AJAX Example</title> 

</head>  

<body>

 <p><strong>Click on button to view users</strong></p> 

 <div id = "container" > 
 
<div id="records"></div> 

<p>
    <input type="submit" id = "getusers" value = "Get Users" >
</p>

</div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<script> 

    //$(function(){ $("#getusers").on(‘click’, function(){
    $(document).ready(function(){
    $("input[id=getusers]").click(function(){ 
      $.ajax({ 
          	method: "POST", 
          	url: "queryserviceLoesungen.php", 
         })
        .done(function( data ) { 
        	console.dir(data);      // for debug
        	var result = JSON.parse(data); 

          	var string = '<table> <tr> <th>#</th> <th>Loesung</th> <tr>';
 
       		/* from result create a string of data and append to the div */
      
        	$.each( result, function( key, value ) { 
            	string += '<tr> <td>'+value['idLoesungen'] + '</td> <td> '+ value['LoesungName']+'</td> </tr>'; }); 
             	string += '</table>'; 
             	$("#records").html(string); 
       }); 
    }); 
});

</script> 

</body>

</html>
