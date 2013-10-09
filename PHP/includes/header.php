<header class="header">
<?php 

include 'hotel_menu_details.php';
$hotel_menu_details = new Hotel_menu_details(); // hotel name,address,phonenumber are in araay
$hotel_details= $hotel_menu_details ->hotel_details();
?>
<h1><?php echo $hotel_details['HotelName'];?></h1>

</header>