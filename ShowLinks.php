<?php 
session_start();

$mysqli = new mysqli('localhost','root','','users') or die(mysqli_error($mysqli));
   
if(isset($_POST['Submit'])) {

    $Id = $_SESSION['id'];
    $UserType = $_SESSION['UserType'];
    $Link = '';
    
    $Query = "SELECT * FROM link WHERE UserType = '$UserType' ";
    $Result = mysqli_query($mysqli,$Query);
    
    while($row = mysqli_fetch_array($Result)){
        $Link = "<h1>" .$row['link']. "</h1>";
        echo $Link;
    }
}
?>