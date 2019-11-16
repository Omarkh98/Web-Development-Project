<?php 
$q = $_GET['q'];

$Connect = mysqli_connect("localhost", "root","","articles");

$FetchData = "SELECT `articleName` FROM art_info WHERE `articleName` LIKE '%$q%' ";

$Result = mysqli_query($Connect,$FetchData);


if(mysqli_num_rows($Result) > 0) {
    
    while($row = mysqli_fetch_assoc($Result)) {
        echo ( "Article " . " ( ". $row['articleName'] ." ) ". " Is Available <br><br>" );
    }
}
else {
    echo ("No Such Article Exists!");
}
?>
