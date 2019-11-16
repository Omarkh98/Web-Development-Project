<?php
session_start();

$mysqli = new mysqli('localhost','root','','articles') or die(mysqli_error($mysqli));

if(isset($_POST['submit'])) {
    
    error_reporting(E_ERROR | E_PARSE);
    echo "<h1> Incoming Messages </h1>" . "<br><br><br><br>";
    
    $MyId = $_SESSION['id'];
        
    $Sql = "SELECT * FROM message WHERE reciever = '$MyId' ";
    
    $mysqli->query("SELECT name FROM users WHERE id = '$Receiver'") or die(mysqli_error($mysqli));
    
    $Message = mysqli_query($mysqli,$Sql) or die($mysqli->error);
    
    while($row = $Message->fetch_assoc()) {
        echo "<br><h3> User " .$row['sender'] . " Says : ". "</h3>";
        echo "<br><br><h4>". $row['message']."</h4><br>";
        echo "<br><br><br><a href='ChatForm.php'><b>Reply Now !<b></a>";
        echo "<br><br><br>";
    }
        echo "<img src='ryan-moreno-99473-unsplash.jpg'>";

}
?>

<!DOCTYPE html>
<html>
<body>
    <style>
        h1{
            position:absolute;
            color:red;
            font-size: 40px;
        }
        h1:hover{
            color:white;
        }
        body {
        }
        img{
            margin-top: -3000px;
            margin-left: -100px;
        }  
        h3{
            font-size: 30px;
            color: white;
            position:absolute;
        }
        a{
            font-size: 30px;
            color: red;
            position: absolute;
        }
        a:hover{
            color: white;
        }
        h4{
            color: aqua;
            position: absolute;
            font-size: 30px;
        }
    </style>
    </body>
</html>