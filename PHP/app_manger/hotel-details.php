<!DOCTYPE html>
<html>

<?php
// this post info into db 
include '../includes/verifylogin.php';
include '../includes/css_jsinclude.php';
include '../db_manager/hoteldetailsDbManager.php';
?>


<body>
<header class="header">
<h1>Hotel Name</h1>
</header>

<h2>hotel details</h2>

<form action="" method="post" enctype="multipart/form-data">
<input type="text" class="input-box" placeholder="Hotel Name" name="hotel-name">
<input type="text" class="input-box" placeholder="Address" name="address">
<div class="grid3">
<input type="text" class="input-box" placeholder="Zip code" name="zipcode">
<input type="text" class="input-box" placeholder="City" name="city">
<input type="text" class="input-box" placeholder="State" name="state">
</div>
<input type="text" class="input-box" placeholder="Country" name="country">
<input type="number" class="input-box" placeholder="Phone number" maxlength="10" name="phone-number">
File data: <input class="common-button file-uploadbutton" type="file" name="excel"/>
<input class="common-button submit-button" type="submit" name="submit" value="Submit" />
</form>

<?php 

if (isset($_POST['submit'])) {
	rsvpsubmit();

}


function rsvpsubmit() {
	
$error = false;
$file_type="application/vnd.ms-excel";
$error_details = array();
$valid_file = true;
$hotel_name = $_POST["hotel-name"];
$address = $_POST["address"];
$zipcode = $_POST["zipcode"];
$city = $_POST["city"];
$state =$_POST["state"];
$country =$_POST["country"];
$phone_number = $_POST["phone-number"];

if(empty($hotel_name)){
	array_push($error_details, "hotel name is not valid");
	$error = true;
}
if(empty($address)){
	array_push($error_details, "address name is not valid");
	$error = true;
}
if(empty($zipcode)){
	array_push($error_details, "zipcode name is not valid");
	$error = true;
}
if(empty($city)){
	array_push($error_details, "city name is not valid");
	$error = true;
}
if(empty($state)){
	array_push($error_details, "state name is not valid");
	$error = true;
}
if(empty($country)){
	array_push($error_details, "country name is not valid");
	$error = true;
}
if(empty($phone_number)){
	array_push($error_details, "phone number name is not valid");
	$error = true;
}
if($_FILES['excel']['size'] <= 0){
	array_push($error_details, "file is empty");
	$valid_file = false;
	$error = true;
}


if(!$_FILES['excel']['error'] && $valid_file == true)
{
	
	if($_FILES['excel']['type'] != $file_type)
	{

		array_push($error_details, "file is not valid file");
		$error = true;

	}
	//if there is an error..
}

// else
	// 	{
	// 		//set that to be the returned message
	// 		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['excel']['error'];
	// 		array_push($error_details, $message);
	// 		$error = true;
	// }

	if($error == true ){
		$error_details_length = count($error_details);
		for($x=0;$x<=$error_details_length;$x++){
			echo $error_details[$x];
			echo "<br>";
	 
	}
}


else if($error == false)
{
	//header( 'Location: http://localhost:8888/MAMP/hotel_app/PHP/app_manger/menu.php' ) ;
	//move it to where we want it to be
	$hotelDetailsdbManager = new  hotelDetailsdbManager();	 
	//Checking DB created successfully and Redirecting to next page
	
	if($hotelDetailsdbManager -> hotel_details () &&$hotelDetailsdbManager -> menu_details() ){
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'menu.php';
	header("Location: $extra");
exit;
};
	
	
		
}
}


?>

  



</body>

</html>