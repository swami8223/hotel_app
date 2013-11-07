<!DOCTYPE html>
<html>
<head>

<?php 
		// menu html page
		include '../includes/verifylogin.php';
		
		include '../includes/header.php';
		//include 'menubar.php';
		//include '../db_manager/hoteldetailsDbManager.php';
		?>
<link rel="stylesheet" type="text/css" href="../../css/custom.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/demo-only.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/elements.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/filereader.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/global.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/layout.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/login.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/main.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/mediaqueries.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../../css/pages.css" media="screen" />   
<link href="../../css/responsiveslides.js-v1.53/responsiveslides.css" rel="stylesheet" type="text/css" media="all">		
	
</head>


<body>
	<!--Menu Starts!-->
	<div class="wrapper row2">
<nav id="topnav">
<ul class="menu clear">
<li  ><a id="home-page" href="#" title="Homepage">Homepage</a></li>
<li class="active"><a id="menu"  class="" href="#/menu" title="Online order">Online order</a>
<!-- <ul>
<li><a href="full-width-content.html" title="Full Width Content">Full Width Content</a></li>

</ul>  -->
</li>
<li><a id="about-us" class="" href="#/aboutUs" title="About Us">About Us</a>
<!-- 
<ul>
<li><a href="../elements/buttons.html" title="Buttons">Buttons</a></li>

</ul>
-->
</li>
<!-- 
<li><a class="drop" href="#" title="Portfolio Layouts">Portfolio Layouts</a>

<ul>
<li><a href="../portfolio-layouts/portfolio-overview-full-width-content.html" title="Full Width Portfolio">Full Width Portfolio</a></li>

</ul> 
</li>-->
<li><a class="drop" href="#/ourServices" title="Our Services">Our Services</a>
  
<ul>
<li><a href="#/ourServices1" href="../gallery-layouts/gallery-full-width-content.html" title="Birth day parties">Birth day parties</a></li>
<li><a href="#/ourServices2" href="../gallery-layouts/gallery-2columns.html" title="Hall Booking">Hall Booking</a></li>
<li><a href="#/ourServices3" href="../gallery-layouts/gallery-2columns-leftsidebar.html" title="Room Booking">Room Booking</a></li>
</ul> 
</li>
<li><a href="#/feedBack" title="FeedBack">FeedBack</a></li>
<li   class="last-child"><a href="#/contactUs" title="Contact Us">Contact Us</a></li>
</ul>
</nav>
</div>
	<!--Menu ends !-->
	<div id= "content" >

	</div>

<?php 
//include '../includes/css_jsinclude.php';
include '../includes/footer.php';
?>

<script data-main="../../javascript/main" src="../../javascript/libs/require/require.js"></script>

<script>window.jQuery || document.write('<script src="http://localhost:8888/MAMP/hotel_app/javascript/libs/jQuery/jquery-min.js"><\/script>\
<script src="http://localhost:8888/MAMP/hotel_app/javascript/libs/jQuery/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>





</body>
</html>
