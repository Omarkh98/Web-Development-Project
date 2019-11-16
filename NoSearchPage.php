  <!DOCTYPE html>
  <html>
  <link href="TheSocietyMirror.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles1.css">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function showHint(str) {
        if(str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        else {
            var Xml = new XMLHttpRequest();
            Xml.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200){  // 4 = Fetch Operation Complete. , 200 = OK !.
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            Xml.open("GET","gethint.php?q=" +str, true);
            Xml.send();
        }
    }    
    </script>

      <title> The Society Mirror - Not Found </title>
  </head>
  <?php
  $con = new mysqli("localhost", "root", "","articles");
  $sql="SELECT * FROM art_info WHERE category='Medical' ORDER BY id DESC LIMIT 1";
  $sql2="SELECT * FROM art_info WHERE category='Sports'ORDER BY id DESC LIMIT 1";
  $sql3="SELECT * FROM art_info WHERE category='Politics'ORDER BY id DESC LIMIT 1";
$sql4="SELECT * FROM comment";

  $Medical='';
  $Sports='';
  $Politics='';
  $Comments='';

  $result = mysqli_query($con,$sql); 
  $result2 = mysqli_query($con,$sql2);
  $result3 = mysqli_query($con,$sql3);
  $result4 = mysqli_query($con,$sql4);

  if(mysqli_num_rows($result) > 0)
  {
  while($row = mysqli_fetch_array($result))
    {
  $Medical .= "<h1>".$row['articleName']."</h1>";  
  $Medical .= "<img src='".$row['img_path']."' width='10' height='10'>"; 
  $Medical .= "<h3>".$row['category']."</h3>";
  $Medical .= "<h3>".$row['datePublished']."</h3>";
  $Medical .= $row['article'];
  $Medical .=  " ";
    }
  }


  if(mysqli_num_rows($result3) > 0)
  {
  while($row = mysqli_fetch_array($result3))
    {
  $Politics .= "<h1>".$row['articleName']."</h1>";  
  $Politics .="<img src='".$row['img_path']."'>"; 
  $Politics .= "<h3>".$row['category']."</h3>";
  $Politics .= "<h3>".$row['datePublished']."</h3>";
  $Politics .= $row['article'];
  $Politics .=  " ";
    }
  }


  if(mysqli_num_rows($result2) > 0)
  {
  while($row = mysqli_fetch_array($result2))
    {
  $Sports .= "<h1>".$row['articleName']."</h1>";  
  $Sports .= "<img src='".$row['img_path']."' width='10' height='10'>"; 
  $Sports .= "<h3>".$row['category']."</h3>";
  $Sports .= "<h3>".$row['datePublished']."</h3>";
  $Sports .= $row['article'];    
  $Sports .=  " ";
    }
  }
  
  if(mysqli_num_rows($result4) > 0)
  {
  while($row = mysqli_fetch_array($result4))
    {
$Comments.=$row['comment']."<br>";
$Comments.=" ";
}
}
  ?>
  <body> 

      
      <div class="TopBar1"> 
      <a class="AboutUs" href="AboutUs.php">About Us</a>
       <script type="text/javascript">
        function AboutUs(){
        window.open('AboutUs.php','_self');
    }
     </script>
    <a class="Contact Us" href="ContactUs.php">Contact Us</a>
     <script type="text/javascript">
     function  ContactUs(){
     window.open('ContactUs.php','_self');
    }
     </script>
      <a class="Subscribe" href="Subscribe.php">Subscribe</a>
      <script type="text/javascript">
     function  Subscribe(){
      window.open('Subscribe.php','_self');
    }
     </script>
      <a class="Advertise" href="Advertise.php">Advertise</a>
       <script type="text/javascript">
       function  Advertise(){
        window.open('Advertise.php','_self');
    }
    </script>
      </div>
      <div class="TopBar2">
      <a href="www.facebook.com"><img src="https://i.postimg.cc/4yPNzt9H/Facebook-Home-logo-old-svg.png" title="Facebook"></a>
      <a href="www.youtube.com"><img src="https://i.postimg.cc/MKZGzsC7/youtube-icon-logo-05-A29977-FC-seeklogo-com.png" title="Youtube"></a>
      <a href="www.twitter.com"><img src="https://i.postimg.cc/fWfLn4rW/Twitterbird.png" title="Twitter"></a>
     <a href="LogIn.php"> <button class="button button1" onclick="document.getElementById('id01').style.display='block'" >Log In</button></a> 
      <button type="button" onclick="document.getElementById('id02').style.display='block'" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Sign Up</button>
     <div>

        
        </div>
 </div>
   
      <div id="ads1">
    <img src="ads1.jpg" id="x" width="200px" height="350px">
    
  </div>

         <div class="Container">
             <div class="Logo">
             <img src="SocietyMirror.png">
             </div>
             <div class="SearchBar">
             <form action="Search.php" method="post">
    <input type="text" name="Search" placeholder="Search..." onkeyup="showHint(this.value)"><br><br>
    <input type="submit" name="SEARCHBUTTON"><br><br>
    <p style="color:red">Suggestions: <span id="txtHint" style="color:blue" ></span></p>
    </form>
             </div>
             <div class="ToolBar">
             <button class="TabLinks" onclick="" title="News">News</button>
             <button class="TabLinks" onclick="" title="Community">Sports</button>
             <button class="TabLinks" onclick="" title="History">Medical</button>
             <button class="TabLinks" onclick="" title="Sports">Weather</button>
             <button class="TabLinks" onclick="" title="Opinion">Politics</button>
             <button class="TabLinks" onclick="" title="Calender">Opinion</button>
             <button class="TabLinks" onclick="" title="Marketplace">Economy</button>
             </div>
             <style>
                 .NoSearch h1{
                     font-size: 100px;
                     color: red;
                     margin-left: -100px;
                     font-family:inherit;
                 }
                 .NoSearch h2{
                     margin-left: -95px;
                     margin-top: -30px;
                     font-family: monospace;
                 }
                .NoSearch h3{
                 margin-left: -95px;
                 margin-top: 40px;
                 font-family: monospace;
                 font-size: 20px;
                 }
                .NoSearch h3:hover{
                    color:red;
                    text-decoration: underline;
                 }
                 #Image{
                     margin-top: -70px;
                     margin-left: 350px;
                 }
             </style>
             <div class="NoSearch">
             <h1>Oops ! </h1>
             <h2>We can't Seem to find the<br>article you are looking for.</h2>
             <h3>Try searching a "Suggested" article</h3>
             <div id="Image">
             <img src="OO.jpg">    
             </div>
             </div>
            
 <style type="text/css">
            .column {

    float: left;
   width: 49%;

  }

  #c1{
    margin-left: -180px;
    padding-right: 180px;
    border-right: solid 5px #d1e0e0;
    border-left: solid 5px #d1e0e0;
  }
  /* Clear floats after the columns */
  .row:after {
    content: "";
    clear: both;
  }
  .row{
    padding-right:10px;
    width: 800px;
  }

  .row #Politics{
    border-top: solid 5px #d1e0e0;
  }
   </style> 


     </div>
   <script type="text/javascript" src="jquery-2.1.4.js"></script>
   

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
      </body> 
  </html>
