<?php  // Retrieve images from MySQL database and display them in an html tag.

$id = $_GET['id'];

// Need Validations Here.

$Connect = mysql_connect("localhost","root","","articles");

$Query = "SELECT img_path FROM imges WHERE id=$id";

$Result = mysql_query("$Query");

$row = mysql_fetch_assoc($Result);

mysql_close($Connect);

header("Content-type: image/jpeg");
echo $row['img_path'];

?>