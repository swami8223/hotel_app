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
						$item_info = array();
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
						
						
						$item_details_select_query = "SELECT * FROM menu_details WHERE menu_id =".$item_row['item_id'];
						$item_details_result = mysqli_query($con,$item_details_select_query);
						while($item_details_row = mysqli_fetch_array($item_details_result)){
							$item_array["item_id"] = $item_row['item_id'];
							$item_array['item_name'] = $item_details_row['item_name'];
							$item_array['item_image'] = $item_row['item_image'];
							$item_array['iitem_video'] = $item_details_row['item_video'];
							$item_array['stock_status'] = $item_details_row['stock_status'];
							$item_array['stock_count'] = $item_details_row['stock_count'];
							$item_array['price'] = $item_details_row['price'];
							$item_array['item_details'] = $item_details_row['item_details'];
							$item_array['todays_special'] = $item_details_row['todays_special'];
							$item_array['online_order'] = $item_details_row['online_order'];
							$item_info[] = $item_array;
							$menu_arr['item_info'] = $item_info;
							
						}
						
						
						
					}
					
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