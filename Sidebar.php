<?php 
include_once 'ConnectionClass.php';
$DB = new Database();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar</title>

    <!-- Bootstrap Include & Css StyleSheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="Sidebar.css">

    <!-- Javascript Font Awesone 5 -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Bootstrap & JQuery Includes -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    <div id="content">  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button style="margin-left: 28px; font-size: 20px;" type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fas fa-align-center"></i><!-- Button to Open the Sidebar -->
                <span>My Options</span>
            </button>
        </div>
    </nav>
</div>
    
    <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>The Society Mirror</h3>
        </div>
        <ul class="list-unstyled components">
            <p>Your Options :</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Add</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Add User </a>
                    </li>
                    <li>
                        <a href="#">Add Article</a>
                    </li>
                    <li>
                        <a href="#">Add Category</a>
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <a href="#">Advertise</a>
            </li>
            <br>
            <li>
                <a href="#">Message</a>
            </li>
            <br>
            <?php 
            $DB = Database::GetInstance();
            
            $Query = "SELECT * FROM foundation_category WHERE Is_Deleted = 0";
            $Result = mysqli_query($DB->GetConnection(),$Query);
            ?>
            <li class="active">
            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">7 Main Acts</a>
            <ul class="collapse list-unstyled" id="homeSubmenu2">
            <form method="post" action="ViewCategoryFoundations.php">
             <select name="FoundationCategory">
              <?php 
                while($row = mysqli_fetch_array($Result)) {
                  echo "<option value=".$row['id'].">" . $row['name']. "</option>";  
                }
              ?>
            </select>
            <input type = 'submit' name='Go' value="Go!" class="btn btn-primary">
            </form>
             </ul>
            </li>
        </ul>
        <button style="margin-left: 60px; color:white; background: #AA0000; font-size: 20px;" type="button" id="Logout" style=""class="btn btn-default">
        <i class="fas fa-angle-double-left"></i><!-- Button to Logout-->
        <span>Logout</span>
        </button>
    </nav>
</div>
    <script>
    $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});
    </script>
    

    
</body>

</html>