<!DOCTYPE html>
<html>
<?php
// this post info into db
include '../includes/css_jsinclude.php';
include '../db_manager/userLoginDbManager.php';

?>

<link type="text/css" rel="stylesheet" href="../../css/global.css" />
<link type="text/css" rel="stylesheet" href="../../css/login.css" />

<body>
<div class="wrapper row1">
  <header id="header" class="full_width clear">
    <hgroup>
      <h1></h1>
      <h2>We make foods,,,</h2>
    </hgroup>
    <div id="header-contact">
      <ul class="list none">
        <li><span class="icon-envelope"></li>
        <li><span class="icon-phone"></li>
      </ul>
    </div>
  </header>
</div>


<section class="container" id="login">

<section class="login-container">
<h2>Login</h2>
<div class="login-form-div">
<form id="login-form" class="login-form" action="" method="post" enctype="multipart/form-data">
<input placeholder="User name" type="text" class="login-box" name="username">
<input placeholder="Password" type="password" class="password-box" name="password">

<input type="submit" name="submit" value="Login" class="login-button" >
<button  value="signup"  class="login-button mrgleft10"><a href="user-signup.php">sign up</a></button>
</form>

</div>
<?php
if (isset($_POST['submit'])) {
		userloginsubmit();

	}


	function userloginsubmit() {
		$error = false;		
		$error_details = array();
		$valid_file = true;
		$user_name = $_POST["username"];
		$password = $_POST["password"];		

		if(empty($user_name)){
			array_push($error_details, "user name is not valid");
			$error = true;
		}
		if(empty($password)){
			array_push($error_details, "password is not valid");
			$error = true;
		}
				
		if($error == true ){
			$error_details_length = count($error_details);
			for($x=0;$x<=$error_details_length;$x++){
				echo $error_details[$x];
				echo "<br>";
			}
		}
		else if($error == false)
		{			
			$userLoginDbManager = new  userLoginDbManager();			
			//Checking DB created successfully and Redirecting to next page
			if( $userLoginDbManager -> verifyuser()){				
				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = 'index.php';
				header("Location: $extra");
				exit;
			}
			else {
				?>
				<br/><label style="color: red;float: left;padding-left: 30%; "> *Login Failed </label>   
				<?php 	
			}			
		}
	}

 ?>

 </section>
<!-- Login container-->
</section>
<!-- Contaninde ends here-->
</body>
</html>