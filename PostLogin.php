<?php 
include_once 'ConnectionClass.php';
$DB = new Database();
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Spectral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
    
    <script type="text/javascript">
        function buttonclick()
        {
            document.getElementById('Select1').click();
        }
    </script>
    
	<body class="landing is-preload">
		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.html">Human Acts</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.html">Home</a></li>
											<li><a href="../FirstVisitMVC/foundationAdminView.php">Foundations</a></li>
											<li><a href="../WareHouseMVC/WarehouseManagement.php">Ware Houses</a></li>
											<li><a href="elements.html">Donations</a></li>
											<li><a href="../Email/Email.php">Contact Users</a></li>
											<li><a href="#">Log Out</a></li>
                                            <?php // Foundation Categories List
                                            $DB = Database::GetInstance();
            
                                            $Query = "SELECT * FROM foundation_category WHERE Is_Deleted = 0";
                                            $Result = mysqli_query($DB->GetConnection(),$Query);
                                            ?>
                                            <li class="active">
                                            <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">7 Main Acts</a>
                                            <ul class="collapse list-unstyled" id="homeSubmenu2">
                                            <form method="post" action="ViewCategoryFoundations.php"> <!-- View Category Foundations -->
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
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2>Human Acts</h2>
							<p>Another fine responsive<br />
							site template freebie<br />
							crafted by <a href="http://html5up.net">HTML5 UP</a>.</p>
							<ul class="actions special">
								<li><a href="#" class="button primary">Activate</a></li>
							</ul>
						</div>
						<a href="#one" class="more scrolly">Learn More</a>
					</section>


				<!-- Two -->
					<section id="two" class="wrapper alt style2">
						<section class="spotlight">
							<div class="image"><img src="images/pic01.jpg" alt="" /></div><div class="content">
								<h2>Magna primis lobortis<br />
								sed ullamcorper</h2>
								<p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
							</div>
						</section>
						<section class="spotlight">
							<div class="image"><img src="images/pic02.jpg" alt="" /></div><div class="content">
								<h2>Tortor dolore feugiat<br />
								elementum magna</h2>
								<p>Aliquam ut ex ut augue consectetur interdum. Donec hendrerit imperdiet. Mauris eleifend fringilla nullam aenean mi ligula.</p>
							</div>
						</section>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>