<?php

include '../db_manager/dbdetails.php';

$webservicess = new webservices();
$webservicess ->category_services();


class webservices {
	function __construct(){
		//echo "jjjjj";
		
		//$arr = array( 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
		
		//echo json_encode($arr);
		$dbdetails = new Dbdetails();
		$this->host_name=  Dbdetails :: $host_name;
	
		$this->username = Dbdetails :: $username;
		$this->password = Dbdetails :: $password;
		$this->dbname = Dbdetails :: $dbname;
		header('Content-Type: application/json');
		
		//category_services();
	}
	
	function category_services(){
		

		header('Content-Type: application/json');
		$category_arr = array();
		$menu_number =1 ;
		$con=mysqli_connect($this->host_name,$this->username,$this->password,$this->dbname);
		
		
		$menu_json_array = array();
		if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			else{
			//echo "jjjjj";
				$table_select_query = "SELECT * FROM menu_category";
				$category_result = mysqli_query($con,$table_select_query);
				if (!$category_result) {
					die('Could not connect: ' . mysql_error($con));
				}
				while($category_row = mysqli_fetch_array($category_result))
					{
						$item_array = array();
						$category_id_array = array();
						$category_name_array = array();
						$menu_arr = array();
					//echo "MENU NAME ".$category_row['category_name'] ." MENU ID ".$category_row['category_id'];
					//$category_id_array[] = $category_row['category_id'];
					//$category_name_array[] = $category_row['category_name'];
					//$category_arr[$category_row['category_id']] = $category_row['category_name'];

						$menu_arr['category_id'] =  $category_row['category_id'];
						$menu_arr['category_name']  =  $category_row['category_name'];
						
					$item_tabel_select_query = "SELECT * FROM item_category_group WHERE category_id =".$category_row['category_id'];
					$item_result = mysqli_query($con,$item_tabel_select_query);
					
					while($item_row = mysqli_fetch_array($item_result)){
						
						//$menu_arr[$category_arr[$menu_number]]=$item_row['item_id'];  
						//array_push($menu_arr[$item_row['category_id']],$item_row['item_id']);
						//echo $item_row['item_id'];
						$item_array[] = $item_row['item_id'];
					}
					$menu_arr['item_ids'] = $item_array;
					$menu_json_array[] = $menu_arr;
					//echo $category_row['category_name'].",".$category_row['category_id'].",".$item_array[0].">>>";
					
					//echo	"MENU ARRAY::".$menu_arr[0]."love";
					
					//$arr.p;
					$menu_number ++;
			}
	}   
	header('Content-Type: application/json');
	

	echo json_encode($menu_json_array);
	
}


// $dbdetails = new Dbdetails();

// $this->host_name=  Dbdetails :: $host_name;
// echo "jjjjj";
// $this->username = Dbdetails :: $username;
// $this->password = Dbdetails :: $password;
// $this->dbname = Dbdetails :: $dbname;

// header('Content-Type: application/json');
// $con=mysqli_connect($this->host_name,$this->username,$this->password,$this->dbname);
// $category_id_array = array();

// if (mysqli_connect_errno())
// {
// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
// else{
// echo "jjjjj";
// 	$table_select_query = "SELECT * FROM menu_category";
// 	$result = mysqli_query($con,$table_select_query);
// 	if (!$result) {
// 		die('Could not connect: ' . mysql_error($con));
// 	}
// 	while($category_row = mysqli_fetch_array($result))
// 	{
// 		echo "MENU NAME ".$category_row['category_name'] ." MENU ID ".$category_row['category_id']."<br>" ;
// 		$category_id_array[] = $category_row['category_id'];
// 		$category_name_array[] = $category_row['category_name'];
// 	}
	
//}

}

?>