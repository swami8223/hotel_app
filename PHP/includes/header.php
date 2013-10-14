<!DOCTYPE html>
<html>
<?php
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
include 'hotel_menu_details.php';
$hotel_menu_details = new Hotel_menu_details(); // hotel name,address,phonenumber are in araay
$hotel_details= $hotel_menu_details ->hotel_details();
?>
<body>
<header class="header">
<h1><?php echo $hotel_details['HotelName'];?>
<label class="fltrt" for="username">Welcome <?php echo $username?></label>
</h1>
</header>
</body>
</html>