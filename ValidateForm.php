<?php 

$ERRName = $ERRPassword = $ERREmail = "";
$Name = $Password = $Email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Name"])) {
        $ERRName = "Missing Name";
    }
    else {
        $Name = $_POST["Name"];
    }

    if (empty($_POST["Password"])) {
        $ERRPassword = "Missing Password";
    }
    else {
        $Password = $_POST["Password"];
    }
    
    if (empty($_POST["Email"])) {
        $ERREmail = "Missing Email";
    }
    else {
        $Email = $_POST["Email"];
    }
}
?>