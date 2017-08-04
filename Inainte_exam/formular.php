<script src="https://code.jquery.com/jquery-1.11.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="important.css">
<script type="text/javascript">

$(document).ready(function() {
    $("#table12").hide();
    $("#divFormular").hide();
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
    
    vector_locuri = [];
    function populate_table_locuri( valoare_field){
                $("#table12").show();
                $("#divFormular").show();
                vector_locuri = [];
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
                                
                                vector_locuri.push(json[i].loc);
                            }
                            console.log(descriptions);
                            indice= 0;
                            console.log(vector_locuri);
                            for(var i=0;i<15; i++){
                                var a= "<tr>";
                                for(var j=0 ; j<15;j++){
                                    
                                    var zs = + +j + +15 * +i;
                                    
                                    if (vector_locuri.indexOf(zs.toString()) >=0)
                                        a= a+ "<td class ='ocupat'><p>" + zs + "</p></td>";
                                    else
                                        a= a+ "<td class ='freee'><p>" + zs + "</p></td>";
                                }
                                a = a + "</tr>";
                                $("#table12").append(a);
                            }
                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }   
                    });
    }
    
      $("body").on("click", "#table1 p.asd", function(){  
          $('#nume_rezervare').val($(this).text());
          populate_table_locuri($(this).text());

    });
    
    $("body").on("click", "#table12 p", function(){  
    	
        $('#loc').val(parseInt($(this).text()));

    });
    
     $("#submitFromular").click(function()
    {
        populate_table(); 
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

        <tbody>
    
        </tbody>    
    </table>
    
</body>
    

<div id = 'divFormular'>
          <form method="post" action="SendFormular.php" enctype="multipart/form-data"   >
            <p><input id ='nume_rezervare' type="text"      name="nume_rezervare" value="" placeholder="Nume specatacol" readonly  ></p>
            <p><input id = 'loc'           type="numeric"   name="loc"            value="" placeholder="loc" readonly  ></p>
            <p><input id ='nume_persoana'  type="text"      name="nume_persoana"  value="" placeholder="Nume si Prenume"></p>  
           <p ><input id ="submitFromular" type="submit" name="commit" value="Trimite"></p>
          </form>

        <br><br> 

</div>