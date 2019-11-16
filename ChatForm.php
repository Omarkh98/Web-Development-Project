<!DOCTYPE html>
<html>
<head>
<title>
    Chat Form
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:DarkCyan;">
    <?php require_once 'Chat.php'; ?>
        
    <div class="container">
    <?php 
     // session_start();
    error_reporting(E_ERROR | E_PARSE);
      $Names = "id";
      $mysqli = new mysqli('localhost','root','','articles') or die(mysqli_error($mysqli));
        
    $Receiver = $_POST['Receiver'];
    $Result = $mysqli->query("SELECT * FROM message WHERE reciever = '$Receiver'") or die(mysqli_error($mysqli));
        
    if(isset($_POST['Send'])) {
    $Msg = $_POST['MessageField'];
    
    $Receiver = $_POST['Receiver'];
    
    header("location: ChatForm.php");
}
?>
    <div class="text-center">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>Type Message Here</h1><br>
    <textarea cols="50" rows="30" id="Field" name="Field" value=""readonly>
    <?php while($row = $Result->fetch_assoc()): ?>
    <?php echo $row['message']; ?>
    <?php endwhile;?> 
    </textarea><br><br><br>
<?php 
    $Names = "id";
    $RealName = "name";
    $Result2 = $mysqli->query("SELECT * FROM users WHERE UserType = '1' ") or die(mysqli_error($mysqli));
    $Result3 = $mysqli->query("SELECT * FROM users WHERE UserType = '2' ") or die(mysqli_error($mysqli));
?>
        <input type="submit" name="View" class="btn btn-primary" value="View">
        <select name="Receiver">
        <option>
         Select Recipient
        </option>
        <?php 
            if($Result2){
                while($row= mysqli_fetch_array($Result2)){
                    $Recipients = $row["$Names"];
                    $NAME = $row["$RealName"];
                    echo "<option>" . $Recipients . " - " . $NAME . "<br>" . "</option>";
                }
            }
            if($Result3){
                while($row= mysqli_fetch_array($Result3)){
                    $Recipients = $row["$Names"];
                    echo "<option>$Recipients<br></option>";
                }
            }
            ?>
        </select>
    <input type="text" name="MessageField" style="font-size:16pt;">
    <input type="submit" name="Send" class="btn btn-warning" value="Send">
    </form>
    </div>
    </div>
    </body>
</html>