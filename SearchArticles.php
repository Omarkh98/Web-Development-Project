<html>
<title>Search In PHP</title>
    <head>
    <script>
        
        function CheckAvailability(){
            jQuery.ajax({
               url: "Check_Availability.php",
               data: 'username='+$("#Search").val(),
               type: "POST",
               success: function(data){
                   $("#msg").html(data);
               },
               error: function(){
                   $("#msg").html("No Article Found");
               }
            });
        }
        
        function GetResult(){
            jQuery.ajax({
               url: "Back_End.php",
               data: 'term='+$("#term").val(),
               type: "POST",
               success: function(data2){
                   $("#result").html(data2);
               }
            });
        }
        </script>
    </head>
    <body>
<!--  Our Search Button -->
           
    <input type="text" name="Search" id="Search" onblur="CheckAvailability()" placeholder="Search..">
    <div id = "msg"></div>
    <button class="button button3">Search</button>
    
    <input name="term" type="text" id="term" onkeyup="GetResult()" placeholder="S......">
        <div id = "result"></div>
    </body>
</html>