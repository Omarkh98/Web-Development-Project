<!DOCTYPE html>
<html>
    <head>
    <title> PHP Search CODE </title>
    <meta charset="UTF-8">
    </head>
<body>
    
    <style>
        h1{
            color:white;
            position: absolute;
        }
        h1:hover{
            color:red;
            text-decoration: underline;
        }
        h2{
            color:white;
            position: absolute;
        }
        h2:hover{
            color:red;
            text-decoration: underline;
        }
        h3{
            font-size: 20px;
            color:white;
            position: absolute;
        }
        h3:hover{
            color:red;
            text-decoration: underline;
        }
        h4{
            font-size: 30px;
            color:red;
            position: absolute;
        }
        p{
            color: white;
            font-size: 30px;
            font-family: monospace;
            position: absolute;
        }
        img{
            margin-top: -450px;
            margin-left: -100px;
        }
    </style>
    
<?php 
//error_reporting(E_ERROR | E_PARSE);
    
$Connect = mysqli_connect("localhost", "root","","articles");


 if(isset($_POST["SEARCHBUTTON"])) {
     
 $search = $_POST['Search'];

$FindArticle = "SELECT * FROM `art_info` WHERE `articleName` LIKE '%$search%' ";
    
$FindArticleByCategory = "SELECT * FROM `art_info` WHERE `category` = '$search' ";
    
$Result = mysqli_query($Connect,$FindArticle);
$Result2 = mysqli_query($Connect,$FindArticleByCategory);
    
    if(empty($_POST['Search'])){
        header("location: NoSearchPage.php");
    }
    if(mysqli_num_rows($Result) > 0){   
      while ($row = mysqli_fetch_assoc($Result)) {
          $Name = $row['articleName'];
          $Article = $row['article'];
          $Category = $row['category'];
          $Author = $row['Author'];
          echo "<h1> The Article Name is : ( $Name ) </h1><br><br><br><br><br><br><br>";
          echo "<h2> Author : ( $Author ) </h2><br><br><br><br><br><br><br>";
          echo "<h3> Category : ( $Category ) </h3><br><br><br><br>";
          echo "<h4> The Article : </h4><br><br><br><br>";
          echo "<p> - $Article </p>";
          echo "<img src='ryan-moreno-99473-unsplash.jpg'>";
      }
    }
    else if(! mysqli_num_rows($Result) > 0 && mysqli_num_rows($Result2) > 0){   
        while ($row = mysqli_fetch_assoc($Result2)) { 
          $Name = $row['articleName'];
          $Article = $row['article'];
          $Category = $row['category'];
          $Author = $row['Author'];
          echo "<h1> The Article Name is : ( $Name ) </h1><br><br><br><br><br><br><br>";
          echo "<h2> Author : ( $Author ) </h2><br><br><br><br><br><br><br>";
          echo "<h3> Category : ( $Category ) </h3><br><br><br><br>";
          echo "<h4> The Article : </h4><br><br><br><br>";
          echo "<p> - $Article </p>";
          echo "<img src='ryan-moreno-99473-unsplash.jpg'>";
      }
    }
    else if(! mysqli_num_rows($Result) > 0){   
        header("location: NoSearchPage.php");
    }
    if(mysqli_num_rows($Result2)>0){
      while ($row = mysqli_fetch_assoc($Result2)) { 
          $Name = $row['articleName'];
          $Article = $row['article'];
          $Category = $row['category'];
          $Author = $row['Author'];
          echo "<h1> The Article Name is : ( $Name ) </h1><br><br><br><br><br><br><br>";
          echo "<h2> Author : ( $Author ) </h2><br><br><br><br><br><br><br>";
          echo "<h3> Category : ( $Category ) </h3><br><br><br><br>";
          echo "<h4> The Article : </h4><br><br><br><br>";
          echo "<p> - $Article </p>";
          echo "<img src='ryan-moreno-99473-unsplash.jpg'>";
      }
    }
    }
?>
    </body>
</html>