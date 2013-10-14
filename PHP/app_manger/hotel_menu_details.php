<?php

include '../db_manager/dbdetails.php';
class Hotel_menu_details {
	public $hotel_details_table_name;
	public $host_name;
	public $username;
	public $password;

	function __construct(){
		$dbdetails = new Dbdetails();

		$this->hotel_details_table_name = Dbdetails::$hotel_details_table_name;
		$this->host_name=  Dbdetails :: $host_name;
		$this->username = Dbdetails :: $username;
		$this->password = Dbdetails :: $password;
		$this->dbname = Dbdetails :: $dbname;
	}

	function hotel_details(){
			
		//echo "jhgh".$this->host_name;
		$con=mysqli_connect($this->host_name,$this->username,$this->password,$this->dbname);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else{
			$table_select_query = "SELECT * FROM ".$this->hotel_details_table_name;
			$result = mysqli_query($con,$table_select_query);
			if (!$result) {
				die('Could not connect: ' . mysql_error($con));
			}
			while($row = mysqli_fetch_array($result))
			{
				return $row;
			}

		}
		mysql_close($con);
	}
	
	
	

}
?>