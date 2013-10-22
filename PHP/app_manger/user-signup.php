<!DOCTYPE html>
<html>
<?php
// this post info into db
include '../db_manager/hoteldetailsDbManager.php';
?>
<link type="text/css" rel="stylesheet" href="../../css/global.css" />
<link type="text/css" rel="stylesheet" href="../../css/login.css" />

<body>
<div class="wrapper row1">
  <header id="header" class="full_width clear">
    <hgroup>
      <h1><?php echo $hotel_details['HotelName'];?>
<a class="fltrt" for="username">Welcome <?php echo $username?></a>
</h1>
      <h2>We make foods,,,</h2>
    </hgroup>
    <div id="header-contact">
      <ul class="list none">
        <li><span class="icon-envelope"></span> <a href="#">info@domain.com</a></li>
        <li><span class="icon-phone"></span><?php echo $hotel_details['Phonenumber'];?></li>
      </ul>
    </div>
  </header>
</div>
<section class="container" id="sinup">

<section class="login-container">
<h2>Sign up</h2>
<div class="login-form-div">
<form id="login-form" class="login-form">
<input placeholder="username" type="text" class="login-box">
<input placeholder="email id" type="text" class="login-box">
<input placeholder="phonenumber" type="text" class="login-box">
<input placeholder="password" type="password" class="login-box">
<input placeholder="confirm password" type="password" class="login-box">

<button  value="submit"  class="login-button">sign up</button>
</form>
</div>
</section>
<?php 

?>

</section>
</body>
</html>