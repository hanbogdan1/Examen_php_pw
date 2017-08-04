<script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function() {
    var number = +0 ;
    $("#dab").hide();
    function populate_table_locuri( valoare_field){
                descriptions = [];
                
                var indice= 0 ;
                $.ajax({
                        url: "get_produse.php",
                        dataType: "JSON",
                        type: "GET",
                        data: {numar: valoare_field }, 
                        success: function(json){
                            console.log(json);
                            $('#table1 tbody').empty();
                            for(var i=0;i<json.length; i++){
                                descriptions[indice++] = json[i].nume;
                                descriptions[indice++] = json[i].descriere; 
                                descriptions[indice++] = json[i].pret; 
                                descriptions[indice++] = json[i].posesor; 
                                
                            }
                                indice =0;
                               for(var i=0;i<json.length; i++){
                                $("#table1").append("<tr>" +
                                                    "<td><p class ='nume'>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p class ='descriere'>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p class ='pret'>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p class ='asd'>" + descriptions[indice++] + " <--- Cumpara </p></td>"
                                      +  "</tr>");
                            }
                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }   
                    });
    }
    
     $("#produse").click(function()
    {
         $("#dab").show();
         number = +number + +3 ;
         populate_table_locuri(number);  
    });
    
    $("body").on("click", "#table1 p.asd", function(){  
        
        var valoare_field1 = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".nume")     // Gets a descendent with class="nr"
                       .text();
        
        var valoare_field2 = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".descriere")     // Gets a descendent with class="nr"
                       .text();
        
        var valoare_field3 = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find(".pret")     // Gets a descendent with class="nr"
                       .text();
        
    	$.ajax({
                        url: "Delete_produs.php",
                        dataType: "JSON",
                        type: "DELETE",
                        data: {nume: valoare_field1 ,descriere: valoare_field2 , pret: valoare_field3 }, 
                        success: function(){
                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }   
                    });
    

    });
    populate_table_locuri(number); 
    
});
   
        
</script>  


    <br><br> 
    
      <div id ='dab'>
    <table id = 'table1' >
        <thead>
            <tr>
                  <td>Nume</td> <td>Descriere</td> <td>Pret</td> <td>Posesor</td> 
            </tr>
        </thead>
        <tbody>
    
        </tbody>
    </table>
    
    </div>
    
    <button id ='produse' type="button">load more</button>

    <div id="afis_prod">
    
    </div>







<div id = 'divFormular'>
          <form method="post" action="SendFormular.php" enctype="multipart/form-data"   >
            <p><input id ='nume'                type="text"      name="nume" value="" placeholder="nume"   ></p>
            <p><input id ='descriere'           type="text"         name="descriere"            value="" placeholder="descriere"   ></p>
            <p><input id ='pret'                type="text"      name="pret"  value="" placeholder="pret"></p>  
           <p ><input id ="submitFromular" type="submit" name="commit" value="Trimite"></p>
          </form>
        <br><br> 
</div>

<form method="post" action="logout.php">

        <p class='submit'><input type='submit' name='commit' value='Logout'></p>
</form>