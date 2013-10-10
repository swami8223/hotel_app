
<?php
// User Login dbManager class to verify the user login information from  DB
include 'dbdetails.php';

 class userLoginDbManager{
 
 	public $host_name="";
 	public $dbUsername="";
 	public $dbPassword="";
 	public $dbname="";
 	public $users_table_name="";
 	public $user_name;
 	public $password;

 	// intialize above variables
 	function __construct(){
 		$dbdetails = new Dbdetails();
 		$this->host_name =  Dbdetails :: $host_name;
    	$this->dbUsername = Dbdetails :: $username;
  		$this->dbPassword = Dbdetails :: $password;
  		$this->dbname = Dbdetails :: $dbname;  		
  		$this->users_table_name = Dbdetails::$users_table_name;
 		$this->user_name = mysql_real_escape_string($_POST["username"]);
 		$this->password = mysql_real_escape_string($_POST["password"]); 		
 	} 
 	
 	function verifyuser(){
 		$con=mysqli_connect($this->host_name,$this->dbUsername,$this->dbPassword,$this->dbname);
 		if (mysqli_connect_errno())
 		{
 			echo "Failed to connect to MySQL: " . mysqli_connect_error();
 		}		
 		else
 		{
 			$sql="SELECT * FROM $this->users_table_name WHERE username='$this->user_name' and password='$this->password'";
 			$userDetails =   mysqli_query($con,$sql); //Execute the query 			
 			$count = mysqli_num_rows($userDetails); //Check if user is avilable in DB
 			if ($count == 1)
 			{
 				session_start(); 				 				
 				$_SESSION["username"] = $this->user_name;
 				return  true;
 			}
 			else
 			{
 				//echo "Error creating table: " . mysqli_error($con)."<br>";
 				session_start();
 				if (isset($_SESSION['username']))
 					unset($_SESSION['username']);
 				return false;
 			}
 		}
 	}
 }
 
?>