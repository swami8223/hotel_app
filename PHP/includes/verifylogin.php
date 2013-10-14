<?php
session_start();
if ($_SESSION['timeout'] + 1 * 60 < time()) //session time out is 1 minute.
{
    $host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'user-login.php';
	header("Location: $extra");
}
else // if session is valid verifying the user name
{
if(isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
	$_SESSION['timeout'] = time();
}
else 
{
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'user-login.php';
	header("Location: $extra");
}
}

?>