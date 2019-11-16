<!DOCTYPE html>
<html>
    <head>
    <title> PHP Search </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
    function showHint(str) {
        if(str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        else {
            var Xml = new XMLHttpRequest();
            Xml.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200){  // 4 = Fetch Operation Complete. , 200 = OK !.
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            Xml.open("GET","gethint.php?q=" +str, true);
            Xml.send();
        }
    }    
    </script>
    </head>
<body>
    <form action="Search.php" method="post">
    <input type="text" name="Search" placeholder="Search..." onkeyup="showHint(this.value)"><br><br> 
    <input type="submit" name="SEARCHBUTTON"><br><br>
    <p style="color:red">Suggestions: <span id="txtHint" style="color:blue" ></span></p>
    </form>
    </body>
</html>