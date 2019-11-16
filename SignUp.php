<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
$mysqli = new mysqli('localhost','root','','articles') or die(mysqli_error($mysqli));
    
} catch (mysqli_sql_exception $ex) {
    throw new Exception("Can't connect to the database! \n" . $ex);
}

$ERRName = $ERRPassword = $ERREmail = "";
$Name = $LName = $Password = $Email = "";
$Echo = "";
$Echo2 = "";

if(isset($_POST["Submit"])) {
    
    $Name = $_POST["Name"];
    $Password = $_POST["Password"];
    $Email = $_POST["Email"];
    $LName = $_POST["LName"];
    
   $Sql = "SELECT * FROM users WHERE email = '$Email' ";
   $Result = mysqli_query($mysqli,$Sql);
   $Count = mysqli_num_rows($Result);
    
    if(empty($_POST["Name"]) || empty($_POST["Password"]) || empty($_POST["Email"]) || empty($_POST["LName"])) {
    
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
       
else {
    echo "Eshta Shaghaaalll" ; 
}
}

?>

<!DOCTYPE html>
<html>
<link href="TheSocietyMirror.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles1.css">
  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <title> The Society Mirror </title>
</head>
<?php
$con = new mysqli("localhost", "root", "","articles");
$sql="select * from art_info";
$x='';
$result = mysqli_query($con,$sql); 
$counter=0; 
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
  {
$x .= "<h1>".$row['articleName']."</h1>";  
$x .= $row['article'];  
$x .= $row['category'];  
$x .=  " ";
  }
}

?>
<body> 

    
    
    <div class="TopBar1"> 
    <a class="AboutUs" href="">About Us</a>
    <a class="Contact Us" href="">Contact Us</a>
    <a class="Subscribe" href="">Subscribe</a>
    <a class="Advertise" href="">Advertise</a>
    <a class="Contribute" href="">Contribute</a>  
    </div>
    <div class="TopBar2">
    <a href="www.facebook.com"><img src="https://i.postimg.cc/4yPNzt9H/Facebook-Home-logo-old-svg.png" title="Facebook"></a>
    <a href="www.youtube.com"><img src="https://i.postimg.cc/MKZGzsC7/youtube-icon-logo-05-A29977-FC-seeklogo-com.png" title="Youtube"></a>
    <a href="www.twitter.com"><img src="https://i.postimg.cc/fWfLn4rW/Twitterbird.png" title="Twitter"></a>
  <button class="button button1" onclick="document.getElementById('id01').style.display='block'" >Log In</button></a> 
  <button type="button" onclick="document.getElementById('id02').style.display='block'" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Sign Up</button>
    </div>

    
    <div id="ads1">
  <img src="ads1.jpg" id="x" width="200px" height="350px">
  
</div>

       <div class="Container">
           <div class="Logo">
           <img src="SocietyMirror.png">
           </div>
           <div class="SearchBar">
           <form name = "MyForm" method="get">
           <input type="text" name="search" placeholder="Search..">
           </form>
           </div>
           <div id="SearchButton"class="SearchButton">
           <button class="button button3">Search</button>
           </div>
           <div class="ToolBar">
           <button class="TabLinks" onclick="" title="News">News</button>
           <button class="TabLinks" onclick="" title="Community">Community</button>
           <button class="TabLinks" onclick="" title="History">History</button>
           <button class="TabLinks" onclick="" title="Sports">Sports</button>
           <button class="TabLinks" onclick="" title="Opinion">Opinion</button>
           <button class="TabLinks" onclick="" title="Calender">Calender</button>
           <button class="TabLinks" onclick="" title="Marketplace">Marketplace</button>
           <button class="TabLinks" onclick="" title="E-Edition">E-Edition</button>
           </div>


           <div id="mydiv"><?php echo $x; ?></div>
           
           
<script type="text/javascript" src="jquery-2.1.4.js"></script>

</div>
    

    <div id="nono">

<section class="firstC">
  <a href="#"><h1>BlowingRocket.com</h1></a>
<strong>BlowingRocket.com</strong><br>
<p>474 Industrial Park Dr.</p>
<p>Boone, NC 28607</p>
<p><strong>Phone:</strong>828-264-6397</p>
<p><strong>Email:</strong><a href="web@mountaintimes.com">web@mountaintimes.com</a></p>

  <h3>Mountain Times Publications</h3>
<nav>
    <a href="#">Watauga Democrat</a><br>
    <a href="#">Blowing Rocket</a><br>
    <a href="#">Mountain Times</a><br>
    <a href="#">Avery Journal</a><br>
    <a href="#">Ashe Post & Times</a><br>
    <a href="#">High Country NC</a>
</nav>
</section>



<section class="secondC">
  <a href="https://www.facebook.com/"><img src="facebook.png" width="36" height="36"></a>
  <h3>Sections</h3>
  <nav>
    <a href="#">Home</a><br>
    <a href="#">News</a><br>
    <a href="#">Community</a><br>
    <a href="#">Sports</a><br>
    <a href="#">Obituaries</a><br>
    <a href="#">Archives</a>
  </nav>
</section>

<section class="thirdC">
  <h3>Services</h3>
<nav>
  
    <a href="#">About Us</a><br>
    <a href="#">Contact Us</a><br>
    <a href="#">Subscription Services</a><br>
    <a href="#">Submission Forms</a>
</nav>
</section>
</div>
<!-- Registration form -->
  <div class="Container2">

<div id="id02" class="modal2"> 
  <form class="modal-content2 animate" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <h1 align ="center"> Registeration Form </h1> 

	<div class="form-group">
    <label for="FirstName"> First Name: </label>
    <input type="text2" class="form-control" id="FirstName" name="Name" placeholder="Enter First Name" value="<?php echo $Name;?>" required="required" data-error="Please Enter Your First Name"><span class="error">*<?php echo $ERRName;?></span><br><br>
              <div class="help-block with-errors"></div>
		
			  </div>
			  <div class="form-group">
    <label for="LastName"> Last Name: </label>
    <input type="text2" class="form-control" id="LastName" name="LName" placeholder="Enter Last Name" value="<?php echo $LName;?>" required="required" data-error="Please Enter Your Last Name"><span class="error">*<?php echo $ERRName;?></span><br><br>
              <div class="help-block with-errors"></div>
</div>
	
	
	<div class="form-group">
    <label for="Password"> Password: </label>
    <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter Password" value="<?php echo $Password;?>" required="required" data-error="Please Enter Your Password"><span class="error">*<?php echo $ERRPassword;?></span><br><br>
              <div class="help-block with-errors"></div>
			  </div>


	<div class="form-group">
    <label for="email">Email Address: </label>
              <input name="Email"  class="form-control" id="Email" name="Email" placeholder="Email Address" type="email" value="<?php echo $Email;?>" required="required" data-error="Please enter a valid email."><span class="error">*<?php echo $ERREmail;?></span><br><br>
              <div class="help-block with-errors"></div>
              <?php echo $Echo; ?>
            </div>
	<br>
	<div class="form-group">
              <label for="selectGender" >Gender: </label>
              <select name="selectGender" required>
              <option value="">Select Gender -- </option>
              <option value="Men">Men</option>
              <option value="Web Women">Women</option>
              <option value="Others">Others</option>
           
              </select>
            </div>
	 <div>
      <input type="submit" name="Submit" class="btn btn-success" value="Sign Up">
	   <button type="button" onclick="document.getElementById('id02').style.display='none'" class="btn btn-danger">Cancel</button>

	  </div>
	  </div>
  </form>
</div>






<!-- Login form -->
       <div class="Container2">

<div id="id01" class="modal"> 
  <form class="modal-content animate" action="/action_page.php">
  <h1 align ="center"> Login</h1> 

	<div class="form-group">
	    <label for="email">Email Address: </label>
   <input name="Email"  class="form-control" id="Email" placeholder="Email Address" type="email" value="" required>
	  </div>
      <div class="form-group">
      <label for="uname"><b>Password :</b></label>
      <input type="password"  class="form-control" placeholder="Enter Password" name="uname" required>
	  </div>
	 
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
 <div>
      <button type="submit" class="btn btn-success">Login</button>
	        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Cancel</button>
      <span class="psw"> <a href="#">Forgot password?</a></span>

	  </div>
  </form>
</div>
</div>
    </body>
    
</html>


