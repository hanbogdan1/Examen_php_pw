<script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="important.css">
<script type="text/javascript" src="timepicker/jquery.timepicker.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<!-- Updated stylesheet url -->
<link rel="stylesheet" href="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.css">

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

<!-- Updated JavaScript url -->
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>

<script type="text/javascript">

    
    
  $(function() {
   $("#datepicker").datepicker();
 });

 $(function() {
   $('#timepicker').timepicker();
 });   
    
$(document).ready(function() {
     $("#divFormular").hide();
    $("#formAdc").hide();
    $("#table12").hide();
    function populate_table(){
                
                descriptions = [];
                var indice= 0 ;
                $.ajax({
                        url: "get_spectacole.php",
                        dataType: "JSON",
                        success: function(json){
                            console.log("dada");
                            console.log(json);
                            $('#table tbody').empty();
                            for(var i=0;i<json.length; i++){
                                descriptions[indice++] = json[i].nume;
                                descriptions[indice++] = json[i].time; 
                                descriptions[indice++] = json[i].data; 
                            }
                            console.log(descriptions);
                            indice= 0;
                            for(var i=0;i<json.length; i++){
                                $("#table1").append("<tr>" +
                                                    "<td><p class = 'asd'>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p>" + descriptions[indice++] + "</p></td>"
                                      +  "</tr>");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }   
                    });
    }
    
    function populate_table_locuri( valoare_field){
                $("#table12").show();
                descriptions = [];
                var indice= 0 ;
                $.ajax({
                        url: "get_rezervare.php",
                        dataType: "JSON",
                        type: "GET",
                        data: {nume: valoare_field }, 
                        success: function(json){
                            console.log("populate_table_locuri");
                            console.log(json);
                            $('#table12 tbody').empty();
                            for(var i=0;i<json.length; i++){
                                descriptions[indice++] = json[i].nume_rezervare;
                                descriptions[indice++] = json[i].loc; 
                                descriptions[indice++] = json[i].nume_persoana; 
                            }
                            console.log(descriptions);
                            indice= 0;
                            for(var i=0;i<json.length; i++){
                                $("#table12").append("<tr>" +
                                                    "<td><p>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p>" + descriptions[indice++] + "</p></td>"
                                      +  "</tr>");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }   
                    });
    }
    
		  $("body").on("click", "#table1 p.asd", function(){  
			populate_table_locuri($(this).text());
	
		});
    
     $("#buttonAdd").click(function()
    {
         $("#divFormular").show();
         
         $("#formAdc").show();
         $("#buttonAdd      ").hide();
         
    });
    
    
    populate_table();  
});
   
        
</script>  

<body>
    
    <table id = 'table1' >
        <thead>
            <tr>
                  <td>Nume</td> <td>Time</td> <td>Date</td> 
            </tr>
        </thead>
        <tbody>
    
        </tbody>
    </table>
    
    <br><br><br><br><br>    
    
    <table id = 'table12' >
        <thead>
            <tr>
                  <td>nume spectacol</td> <td>loc</td> <td>nume     persoana</td> 
            </tr>
        </thead>
        <tbody>
    
        </tbody>
    </table>
    
    <button id ="buttonAdd" type="button">Adaugare formular nou !</button>   
    <form method="post" action="logout.php">

        <p class='submit'><input type='submit' name='commit' value='Logout'></p>
</form>
    <div id = 'divFormular'>
          <form method="post" action="adaugare_event.php">
              <table>
            <tr>
           <td> <p><input type="text" name="nume_rezervare" value="" placeholder="Nume specatacol"></p></td>
        
           <td>   <input type="text" name="time"  id="timepicker"/><br></td>
         <td>   <input type="text" name="data" id="datepicker" /><br> </td>   
              </tr>
              <tr>
              
            </tr>  
                  </table>
              <p class="submit"><input type="submit" name="commit" value="Trimite"></p>
        </form>

        <br><br> 

</div>
    
</body>

