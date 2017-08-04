
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
                                                    "<td><p class = 'asd'>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p>" + descriptions[indice++] + "</p></td>"+
                                                    "<td><p>" + descriptions[indice++] + "</p></td>" + 
                                                    "<td><p>" + descriptions[indice++] + "</p></td>"
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
    
});
   
        
</script>  


<body>
      <h1>Login</h1>
      <form method="post" action="login.php">
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>

          <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
        
    <br><br> 
    
     <h1>Register</h1>
      <form method="post" action="register.php">
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p><input type="password" name="password2" value="" placeholder="Password"></p>

          <p class="submit"><input type="submit" name="commit" value="Register"></p>
      </form>
        
    <br><br> 
    
      <div id ='dab'>
    <table id = 'table1' >
        <thead>
            <tr>
                  <td>Nume</td> <td>Time</td> <td>Date</td> <td>Date</td> 
            </tr>
        </thead>
        <tbody>
    
        </tbody>
    </table>
    
    </div>
    
    <button id ='produse' type="button">load more</button>

    <div id="afis_prod">
    
    </div>
</body>
