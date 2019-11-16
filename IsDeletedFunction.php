<?php 
$mysqli = new mysqli('localhost','root','','users') or die(mysqli_error($mysqli));

$Result = $mysqli->query("SELECT * FROM user WHERE IsDeleted = 0") or die(mysqli_error($mysqli));

$IsDeleted = 1;

$Check = $_GET['Selected'];
$Delete = $_GET['Delete'];
$Name = $_GET['Name'];

echo "<h2>" . "Choose The User You Would Like To Delete" . "</h2>";
echo "<br>";

while($row=mysqli_fetch_array($Result)){
    ?>

<html>
<head>
    <title> </title>
    </head>
<body>
    <form method="post" action="">
    </form>
    </body>
</html>

<?php
    echo "Name is : " . $row['Name'] . "<br>" . "Password is : " . $row['Password']; 
    echo "<br><br><br>";

if(isset($_POST['Delete'])){
    
    if(empty($Check)) {
        
        echo "<h3>" . "You Have Selected the Following Users" . "</h3>";
            foreach($Check as $Checked) 
            {
                echo "<p>" .$Checked. "</p>";
            }
    }
    
   // $Result2 = $mysqli->query("INESRT INTO user(IsDeleted) VALUES('$IsDeleted')") or die(mysqli_error($mysqli)); 
}
}
?>