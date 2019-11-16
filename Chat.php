<?php 
session_start();

$mysqli = new mysqli('localhost','root','','articles') or die(mysqli_error($mysqli));

if(isset($_POST['Send'])) {
        
    error_reporting(E_ERROR | E_PARSE);
    
    if(empty($_POST["MessageField"])) {
      header("location:ChatForm.php");
    }
    $MyId = $_SESSION['id'];
    
    $Msg = $_POST['MessageField'];
    
    $Rec = $_POST['Receiver'];
    
    $Receiver = preg_replace("/[^0-9,.]/", "", $Rec);
    
    $mysqli->query("INSERT INTO message(message, reciever, sender) VALUES ('$Msg','$Receiver','$MyId')") or die($mysqli->error);
    
    header("location: ChatForm.php");
    
}

if(isset($_POST['View'])) {
    $Receiver = $_POST['Receiver'];
    $mysqli->query("SELECT * FROM message WHERE reciever = '$Receiver'") or die($mysqli->error);
}
?>