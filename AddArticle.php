<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
$mysqli = new mysqli('localhost','root','','articles') or die(mysqli_error($mysqli));
    
} catch (mysqli_sql_exception $ex) {
    throw new Exception("Can't connect to the database! \n" . $ex);
}
$Name = "";
$Article = "";
$Echo2 = "";
$Echo3 = "";
$Echo4 = "";
$Echo5 = "";

if(isset($_POST["Submit"])) {
    
   $Name = $_POST["Name"];
   $Article = $_POST["Article"];
   $CountString = strlen($Article);  
    
   $Sql2 = "SELECT * FROM art_info WHERE articleName = '$Name' ";
   $Result2 = mysqli_query($mysqli,$Sql2);
   $Count2 = mysqli_num_rows($Result2);

if($Count2 > 0) {
       $Echo2 =  '<div style="color:yellow;">Article Already <b>Exists.</b></div>';
   }
    else {
       $Echo5 = '<div style="color:lime;">Article Name is <b>Valid.</b></div>';
    }
if($CountString < 100){
       $Echo3 = '<div style="color:yellow;">Article Must Be More than<b> 100 Characters.</b> , Please Type some more</div><br>';
       $Echo4 = '<div style="color:blue;">Your Article was : </div>'. $Article;
}
    
else {
    echo "Eshta Shaghaaalll"; 
}
}

?>

<!DOCTYPE html>
<html>
<link href="AddArticle.css" type="text/css" rel="stylesheet">
<head>
  <title>Add Article Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
</head>
    
<form name="contentForm" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" data-toggle="validator" novalidate="true">

<body>

<div class="container">
<h1> Add Article </h1>
<div class="form-group">
    <label for="Title">Title : </label>
    <?php echo $Echo2; ?>
    <?php echo $Echo5; ?>
    <input type="text" class="form-control" id="Title" name="Name" placeholder="Enter Article Title" value="<?php echo $Name;?>" required="required" data-error="Please Enter Your Article's Name">
              <div class="help-block with-errors"></div>

	</div>
     <br>
	<br>
	 <div class="form-group">
      <label for="Article">Article:</label>
      <?php echo $Echo3; ?>
      <?php echo $Echo4; ?>
      <textarea class="form-control" rows="15" id="article" name="Article" placeholder="Type Your Article" value="" required="required" data-error="Please Type Your Article"></textarea>
      <div class="help-block with-errors"></div>

    <label for="Choose Article Image">Choose Article Image : </label>
     <input type="file" name="pic" accept="image/*">
</div>
<br>
<button type="button" class="btn btn-danger">Cancel </button>

	<input type="submit" name="Submit" class="btn btn-success" value="Publish Article">
	
	<button type="button" class="btn btn-info">Schedule Article</button>
	</div>
</body>
</form>