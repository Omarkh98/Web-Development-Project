<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
$mysqli = new mysqli('localhost','root','','articles') or die(mysqli_error($mysqli));
} catch (mysqli_sql_exception $ex) {
    throw new Exception("Can't connect to the database! \n" . $ex);
}

$ERRName = $ERRPassword = $ERREmail = "";
$Name = $Password = $Email = $ImageError =  "";
$Echo = "";
$Echo2 = "";

if(isset($_POST["Submit"])) {
    
    $Name = $_POST["Name"];
    $Password = $_POST["Password"];
    $Email = $_POST["Email"];
    
   $Sql = "SELECT * FROM form WHERE email = '$Email' ";
   $Result = mysqli_query($mysqli,$Sql);
   $Count = mysqli_num_rows($Result);
    
   $Sql2 = "SELECT * FROM form WHERE name = '$Name' ";
   $Result2 = mysqli_query($mysqli,$Sql2);
   $Count2 = mysqli_num_rows($Result2);
    
if(empty($_POST["Name"]) || empty($_POST["Password"]) || empty($_POST["Email"]) || empty($_POST["File"])) {
    
    if (empty($_POST["Name"])) {
        $ERRName = "Name is Missing";
    }
    else {
    $Name = $_POST["Name"];
    if (!preg_match("/^[a-zA-Z ]*$/",$Name)) {
      $ERRName = "Only letters and white space allowed";
    }
    }
    if (empty($_POST["Password"])) {
        $ERRPassword = "Password is Missing";
    }
    else {
    $Password = $_POST["Password"];
    }
    
    if (empty($_POST["Email"])) {
        $ERREmail = "Missing Email";
    }
    else {
    $Email = $_POST["Email"];
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $ERREmail = "Invalid email format"; 
    }
}
}
  else  if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      $ERREmail = "Invalid email format"; 
    }
    
   else if (preg_match('#[0-9]#',$Name)) {
      $ERRName = "Only letters and white space allowed";
    }
   else if($Count > 0) {
       $Echo =  '<div style="color:red;"><b>'.$Email .'</b> Already Exists , Try another Email</div>';
   }
   else if($Count2 > 0) {
       $Echo2 =  '<div style="color:red;">Article Already Exists</div>';
   }
    if(empty($_POST["File"])){
        $ImageError = '<div style="color:red;"><b> Image </b> is Missing , Please Choose an Image First </div>';
    }
    
else {
    $Name = $_POST["Name"];
    $Password = $_POST["Password"];
    $Email = $_POST["Email"];

$mysqli->query("INSERT INTO form(name,password,email) VALUES ('$Name', '$Password', '$Email')") or die($mysqli->error);
}
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body style="background-color:DarkCyan;">
    <div class="jumbotron text-center">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-goup">
    <?php echo $Echo2; ?>
    <input type="text" name="Name" placeholder="Name Here" value="<?php echo $Name;?>"><span class="error">*<?php echo $ERRName;?></span><br><br>
        </div>
    <div class="form-goup">
    <input type="password" name="Password" placeholder="Password Here" value="<?php echo $Password;?>"><span class="error">*<?php echo $ERRPassword;?></span><br><br>
        </div>
    <div class="form-goup">
    <input type="email" name="Email" id="Email" placeholder="Email Here" value="<?php echo $Email;?>"><span class="error">*<?php echo $ERREmail;?></span><br><br>
    <span id="Result"></span>
    <?php echo $Echo; ?>
        </div>
    <div class="form-goup">
    <input type="file" name="File" id="File"><span class="error">*<?php echo $ImageError;?></span><br><br>
    <span id="Result"></span>
    <?php echo $Echo; ?>
        </div>
    <input type="submit" name="Submit" value="Submit Form" class="btn btn-success">
    </form>
    </div>
    </body>
</html>