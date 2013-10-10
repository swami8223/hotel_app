<!DOCTYPE html>
<html>
<?php
// this post info into db
include '../includes/css_jsinclude.php';
include '../db_manager/hoteldetailsDbManager.php';
?>
<link type="text/css" rel="stylesheet" href="../includes/global.css"/>
<link type="text/css" rel="stylesheet" href="../includes/login.css" />

<body>

<header class="header"><h1>target</h1></header>
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