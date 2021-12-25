<?php 
include('connection.php');
session_start();
 ?>
<html>
	<head>
		<title> Chatbot system</title>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		<link rel="icon" type="image/png" href="images/icon.png">
		<link rel="stylesheet"  href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/style2.css">
		<!--<link rel="stylesheet"  href="css/flexboxgrid.css">-->
		<script src="js/jquery_library.js"></script>
<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
			<nav class="navbar navbar-default navbar-fixed-top" style="background:#000">
  <div class="container">
  
  <ul class="nav navbar-nav navbar-left">
    <li><a href="index.php"><strong>Meru University Chatbot</strong></a></li>
      
	  
	  <li><a href="index.php?option=updates"><span class="glyphicon glyphicon-user"></span> Updates</a></li>
   
   
	
	<li><a href="index.php?option=contact"><span class="glyphicon glyphicon-phone"></span>Contact</a></li>
	
	</ul>


<ul class="nav navbar-nav navbar-right">
      <li><a href="index.php?option=registration"><span class="glyphicon glyphicon-user"></span> Register</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
      	<ul class="drop">
      		<li><a href="index.php?option=slogin">Student</a></li>
      			<!--<li><a href="index.php?option=parent">Admin</a></li>
      	<li><a href="index.php?option=visslip">Visitor</a></li> -->
      		<li><a href="admin/login.php">Admin</a></li>
      	</ul>
      </li>
    </ul>



</div>
</nav>	

<div class="container-fluid">
	<!-- slider -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/chatbot8.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
   
    <div class="item">
      <img src="images/meru9.jpg" alt="..." style="width:100%;height:80%;">
      <div class="carousel-caption">
        ...
      </div>
    </div>
         <div class="item">
      <img src="images/chatbot14.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
     ...
  </div>


  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- slider end-->
</div>


<div class="container">
	<?php 
		@$opt=$_GET['option'];

		//include ('header.php');
	?>
	<!--content--->
	<?php
		if(!isset($_GET['option'])){
			include('home.php');
		} else{
			$opt =$_GET['option'];
			include("$opt.php");
		}
		?>
	
</div>

<!-- footer-->

<nav class="navbar navbar-default navbar-bottom" style="background:black">
  <div class="container">
  
  <ul class="nav navbar-nav navbar-left">
    <li><a href="http://www.phptpoint.com/"> Copyright &copy; 2019 | mikecheruiyotk@gmail.com</a></li>
      
  </ul>




</div>
</nav>


	
<!-- footer-->

	</body>
</html>