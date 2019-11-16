<!DOCTYPE html>
<html>
<head>
    <title>Is Deleted</title>
    </head>
<body>
    <form method="post" action="">
    <h2>Choose The User You Would Like To Delete</h2>
    <select name="Drop">
        <?php 
        $mysqli = new mysqli('localhost','root','','users') or die(mysqli_error($mysqli));

        $Result = $mysqli->query("SELECT * FROM user WHERE IsDeleted = 0") or die(mysqli_error($mysqli));
        
        while($row=mysqli_fetch_array($Result)){
        echo "<option value=".$row['id'].">" . $row['Name'] . "</option>";
        }
        ?>
        </select>
    <input type="submit" name="Delete" value="Delete!">
    </form>
    </body>
</html>

<?php 
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
$mysqli = new mysqli('localhost','root','','users') or die(mysqli_error($mysqli));

$IsDeleted = 1;

if(isset($_POST['Delete'])){
    
    $DropDown = $_POST["Drop"];
    
    $Result2 = $mysqli->query("Update user set IsDeleted ='$IsDeleted' WHERE id = '$DropDown'") or die(mysqli_error($mysqli)); 
}
?>