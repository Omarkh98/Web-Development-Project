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

      <title> The Society Mirror </title>
  </head>
  <?php
  $con = new mysqli("localhost", "root", "","articles");
function Medical()
{
        if (!isset($_SESSION)){
    session_start();
}

    if(!empty($_SESSION['id']))
  {
  $b=$_SESSION['id'];
  
  include 'connection.php';
  global $con; 
  global $CommentsId;
  $CommentsId="";
  $CommentsName="";  
  $MedicalID2=""; 
  $b=$_SESSION['id'];
  $sql="SELECT * FROM art_info WHERE category='Medical' ";
  $result = mysqli_query($con,$sql); 

if(mysqli_num_rows($result) > 0)
  {       $MedicalImage=" "; 
           $Medicalarticle=" ";   
     
     while($row = mysqli_fetch_array($result))
    { $MedicalID2="";    
     $Medical=" "; 
    $MedicalID=" ";
    $MedicalName=" ";
   
    $MedicalImage=" ";
          $Medical .= "<h1>".$row['articleName']."</h1>";  
          $Medical .= "<h3>".$row['category']."</h3>";
          $Medical .= "<h3>".$row['datePublished']."</h3>"; 
          $Medical .= $row['article'];
          $Medicalarticle .= $row['article'];
          $MedicalID2.=$row['User_ID'];
          $MedicalName.=$row['articleName'];
          $MedicalID .= $row['id'];
          $Medical .=  " ";

$sql13="SELECT src  FROM images inner join art_info on art_info.id=images.article_id where art_info.id=".$row['id'];
 $result13 = mysqli_query($con,$sql13); 


    while($row2 = mysqli_fetch_array($result13))
    {
$MedicalImage.=  "<img src='".$row2['src']."' width='100' height='100'>" . "      "; 

    }

 echo $MedicalImage;
         echo $Medical;
         echo '<br><br>';
         
     
if($_SESSION['id']==$MedicalID2)
          {
          
            echo"<form method=\"post\" action=\"UpdateRecord.php\">
            <tr id=\"$MedicalID\">
            <td>
                
                <a href ='UpdateRecord.php?edit=$MedicalID;' class='button button3'> Edit </a>
                
                <a href ='Process.php?delete=$MedicalID;'  class='button button1'> Delete </a>
            
                </td>
            </tr>
         </form>";

          }
          echo '<br><br>';

          $sql4="SELECT comment  FROM comment inner join art_info on art_info.id=comment.article_id where art_info.id=".$row['id'];
          $sql11="SELECT name  FROM users inner join comment on comment.User_ID=users.id where comment.User_ID=users.id";

          $sql12="SELECT articles  FROM art_info where $b=$MedicalID2";

          $result11 = mysqli_query($con,$sql11);
          $result4 = mysqli_query($con,$sql4);
          if( mysqli_num_rows($result4) > 0)
          {
            
           $Comments=" "; $CommentsName=" "; 
             while( $row3=mysqli_fetch_array($result4) )
            {
              $CommentsName.=$row3['comment']."<br>";
               while( $row1=mysqli_fetch_array($result11) )
            {
                
                $CommentsName.=$row1['name']."<br>";
            }
            } 
          }
        
        }
         echo $CommentsName;
  }
  }
}
?>
  ?>
  <body> 
      <?php
      Medical();
      ?>
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
      <form method="post" action="ViewMessages.php">
      <input type="submit" class="button button3" name="submit" value="View Messages">
      </form>
      <br><br>
      <form method="post" action="ChatForm.php">
      <input type="submit"class="button button3"  name="" value="Send Message">
      </form>
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
    <input type="submit" name="SEARCHBUTTON" class="button button3"><br><br>
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





<div>
  <?php
  session_start();
  $userId="";
  $con = mysqli_connect("localhost", "root", "","articles");
  if(!empty($_SESSION['id']))
  {
    $b=$_SESSION['id'];
    $sql="select id from art_info where USER_ID=$b";
    $result6 = mysqli_query($con,$sql);
    if(mysqli_num_rows($result6) > 0)
  {
  while($row = mysqli_fetch_array($result6))
    {
      $userId= $row['id'];
    }
  }


    

      if($_SESSION['UserType']='3')
       {
           
   echo "
  <div class=\"row\">
   
    <div class=\"column\" id=\"c1\">".$Medical.">
      <p><strong>Comments on this article</strong></p>
      <div>".$Comments."</div>
       <form method='POST' action='addComment.php'>
       <textarea type='text' id='comment' name='comment' rows='5' cols='20' placeholder='add your comment here'></textarea> 
    <input type=\"submit\" id=\"submit\" name=\"submit\">
  </form>
    </div>


    <button> <a href=\"LogOut.php\">Log out</a></button>
    <div class=\"column\" id=\"c2\">".$Sports."</div>
   <div id=\"Politics\"> ".$Politics."</div>
   </div>";


   if($_SESSION['id']=$userId)
       {
echo "xxxxxxx";
      echo"<br>";
       }


}
  
}  if(isset($_SESSION['id']) && is_null($_SESSION['id']))
{
    

   echo "
  <div class=\"row\">
    <div class=\"column\" id=\"c1\">".$Medical."></div>
<div class=\"column\" id=\"c2\">".$Sports."</div>
   <div id=\"Politics\"> ".$Politics."</div>
   </div>";
}


  ?>
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

