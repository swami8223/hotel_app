<!DOCTYPE html>
<html>
<?php 
session_start();
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
include 'hotel_menu_details.php';
$hotel_menu_details = new Hotel_menu_details(); // hotel name,address,phonenumber are in araay
$hotel_details= $hotel_menu_details ->hotel_details();
?>
<link type="text/css" rel="stylesheet" href="../includes/global.css"/>
<body>
<header class="header">
<h1><?php echo $hotel_details['HotelName'];?>
<label class="right" for="username">Welcome <u><?php echo $username?> </u></label>
</h1>
</header>
</body>
</html>