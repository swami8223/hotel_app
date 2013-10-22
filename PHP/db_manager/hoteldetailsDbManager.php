
<?php
// hotelDetailsdbManager class updates DB
include 'dbdetails.php';
include '../Classes/PHPExcel/IOFactory.php';

 class hotelDetailsdbManager{
 
 	public $host_name="";
 	public $username="";
 	public $password="";
 	public $dbname="";
 	public $hotel_details_table_name="";
 	public $hotel_details_array = array();
 	public $hotel_name;
 	public $address;
 	public $phone_number;
 	public $city;
 	public $state;
 	public $country;
 	public $zipcode;
 	public $file_error = TRUE;
 	public $rowData = array();
 	public $mandatory_field_count ;
 	public  $category= array();
 	public $temp_item_details = array();
 	public  $group_category_array = array();
 	public $excel_sheet ;
 	public $highestColumn;
 	public $highestRow ;
 	public $colLength;
 	// intialize above variables
 	function __construct(){
 		$dbdetails = new Dbdetails();
 		$this->host_name=  Dbdetails :: $host_name;
    	$this->username = Dbdetails :: $username;
  		$this->password = Dbdetails :: $password;
  		$this->dbname = Dbdetails :: $dbname;
  		$this -> mandatory_field_count  = Dbdetails::$mandatory_fields_count;
  		$this->hotel_details_table_name = mysql_real_escape_string(Dbdetails::$hotel_details_table_name);
 		$this->hotel_name = mysql_real_escape_string($_POST["hotel-name"]);
 		$this->address = mysql_real_escape_string($_POST["address"]);
 		$this->phone_number = mysql_real_escape_string($_POST["phone-number"]);
 	
 		$this->city = mysql_real_escape_string($_POST["city"]);
 		$this->state =mysql_real_escape_string($_POST["state"]);
 		$this->country =mysql_real_escape_string($_POST["country"]);
 		$this->zipcode = mysql_real_escape_string($_POST["zipcode"]);
 		$this->file_reader();
 		
 	}
 	
 	
 	public function file_reader(){
 		$now = time();
 		$file_path =getcwd() ."/menu_file/".$now.$_FILES["excel"]["name"];
 		if (file_exists("upload/" . $_FILES["excel"]["name"]))
 		{
 			echo $_FILES["excel"]["name"] . " already exists. ";
 		}
 		if(move_uploaded_file($_FILES["excel"]["tmp_name"],$file_path)){
 			try {
 		
 				$inputFileType  = PHPExcel_IOFactory::identify($file_path );
 				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
 				$objPHPExcel = $objReader->load($file_path );
 				$this->excel_sheet = $objPHPExcel->getSheet(0);
 				$this->highestRow = $this->excel_sheet ->getHighestRow();
 				$this->highestColumn = $this->excel_sheet ->getHighestColumn();
 				$this->colLength = PHPExcel_Cell::columnIndexFromString($this->highestColumn );
 					
 				return $this->excel_sheet;
 			}catch (xception $e){
 				
 			
 			     }
 		
 		
 		}
 	}
 	
 
 	

 	/* CREATE HOTEL DETAILS TABEL HERE*/
 	function hotel_details(){
 		$con=mysqli_connect($this->host_name,$this->username,$this->password,$this->dbname);
 		if (mysqli_connect_errno())
 		{
 			//echo "Failed to connect to MySQL: " . mysqli_connect_error();
 		}
 		else{
 			/*TRUNCATE TABEL HOTEL DETAIL*/
 			$truncate_hotel_details='TRUNCATE TABLE  hotel_details';
 			if (mysqli_query($con, $truncate_hotel_details))
 			{
 	
 			}else{
 				echo "DELTING HOTEL DETAILS FAILED". mysqli_error($con)."<br>";
 				return false;
 			}
 			/*TRUNCATE TABEL HOTEL DETAIL ENDS HERE*/
 			
 			/*INSERT TO TABEL HOTEL DETAIL  HERE*/
 			$hotel_details_table = "INSERT INTO  hotel_details (HotelName, Address, Phonenumber,City,State,Country,Zipcode)
 			VALUES ('$this->hotel_name','$this->address','$this->phone_number','$this->city','$this->state','$this->country','$this->zipcode')";
 			if (mysqli_query($con,$hotel_details_table))
 			{
 					
 				return  true;
 			}
 			else
 			{
 				//echo "Error creating table: " . mysqli_error($con)."<br>";
 					
 				return false;
 			}
 	
 			/*INSERT TO TABEL HOTEL DETAIL ENDS HERE*/
 	
 		}
 	}
 	/* CREATE HOTEL DETAILS TABEL ENDS  HERE*/
 	
 	
/*Create menu details in database*/
 public function  menu_details(){
 			/*EXCEL TO DB CONVERSION PROCESS*/
 			
 	     $sheet = $this->excel_sheet;
 		 $con=mysqli_connect($this->host_name,$this->username,$this->password,$this->dbname);/*CONNECTION TO DB*/		
         
/*DB CONNECTION IF DB CONNECTION FAILED*/
 		  if (mysqli_connect_errno())
 		    {
 			
 		    echo "Failed to connect to MySQL: " . mysqli_connect_error();
 			return false;
 		    
 		    }
/*DB CONNECTION IF DB CONNECTION PASSED*/
 		 else{
 		 	
 		 	
 		 	for ($row = 1; $row <= $this->highestRow; $row++){ 
                  $this->rowData = $sheet->rangeToArray('A' . $row . ':' .$this->highestColumn  . $row,NULL,TRUE,FALSE);
                
/*COLUMN NAMES*/
                if($row ==1){
/*MANDATORY FIELDS USED IN ITEM DETAILS TABLE*/	 
   	              for ($column = 0;$column < $this->mandatory_field_count; $column++)
   	                  {
                          $category[$column]=$this->rowData[0][$column];
                          
   	                  }
/*MANDATORY FIELDS USED IN ITEM DETAILS TABLE*/
   	

 
 /*DELETE ALREADY EXISTING TABEL*/

   	  $truncate_menu_details='TRUNCATE TABLE  menu_details';
   	  $truncate_menu_category='TRUNCATE TABLE  menu_category';
   	  if (mysqli_query($con, $truncate_menu_details))
   	  {
   	  
   	  }else{
   	  	echo "DELTING FAILED". mysqli_error($con)."<br>";
   	    return false;
   	  }
   	  if(mysqli_query($con,$truncate_menu_category)){
   	  	
   	  }else{
   	  	echo "DELTING FAILED". mysqli_error($con)."<br>";
   	     return false;
   	  }
   	  
/*DELETE ALREADY EXISTING TABEL ENDS HERE*/
   	  
   	  
/*CREATE CATEGORY TABLE COLUMN  HERE  	*/
   	for ($column = $this->mandatory_field_count;$column < $this->colLength; $column++){
   		//echo $this->mandatory_field_count."ROW < 1 ".$this->rowData[0][$column]."<br>";
   		$group_category_array[$column] =$this->rowData[0][$column];
   		$group_category=$this->rowData[0][$column];
   		$menu_category = "INSERT INTO  menu_category (category_name) VALUES ('$group_category')";
   		 
   		if (mysqli_query($con,$menu_category ))
   		{

   		}
   		else
   		{
   			echo "Error insert table   CATEGORY: " . mysqli_error($con)."<br>";
   
   			return false;
   		}
   		//mysql_close($con);
   		 
   	}
   }
/*CATEGORY TABLE COLUMN NAMEES ENDS HERE  	*/   
/*COLUMN NAMES  ENDS HERE */

/*ITEM DETAILS TABLE COLUMN NAMEES HERE  	*/
     if($row > 1){
    	
     	for ($column =0;$column < $this->mandatory_field_count; $column++){
    		$temp_item_details[$column]= $this->rowData[0][$column];
    		//echo "Category name ".$category[$column]." item decription ".$temp_item_details[$column]."<br>";
    		
    		
    	}
    	
/*IMPOLDE CONVERTS STRING TO ARRAY*/
    	$impolde_category = implode(",",$category);
    	$impolde_item= implode(",",$temp_item_details);
/*REPLACING COMA  WITH BRACKECTS TO FORM SQL QUERY item_details_query */    	
    	$items_list = str_replace(",","','",$impolde_item);
    	$item_details_query = "INSERT INTO menu_details (".$impolde_category.")VALUES ('".$items_list."')";
    	if (mysqli_query($con,$item_details_query))
    	{
    		
    		
           //echo "Table  ITEM DETAILS created successfully 2<br>";
    		//return  true;
    	}
    	else
    	{
    		echo "Error insert table  ITEM DETAILS: " . mysqli_error($con)."<br>";
    	
    		return false;
    	}
/*ITEM DETAILS TABLE COLUMN NAMEES ENDS HERE  	*/
    	//mysql_close($con);
      }
}
/*GROUPING TABEL*/
	if($this->grouping_tabel()){
		echo "ALL TABEL CREATED SUCCESSFULLY<br>";
		return true;
	}
 					
 	}
 	return false;
 	
 	}
/*MENU DETAILS ENDS HERE*/
 	
 	
function grouping_tabel(){
 		
 		$group_sheet = $this->excel_sheet;
 		$con=mysqli_connect($this->host_name,$this->username,$this->password,$this->dbname);
 		$category_id_array = array();
 		if (mysqli_connect_errno())
 		{
 			echo "Failed to connect to MySQL: " . mysqli_connect_error();
 		}
 		else{
 			$truncate_item_group_category='TRUNCATE TABLE  item_category_group';
 			if (mysqli_query($con, $truncate_item_group_category))
 			{
 			
 			}else{
 				echo "DELTING FAILED". mysqli_error($con)."<br>";
 				return false;
 			}
 			$table_select_query = "SELECT * FROM menu_category";
 			$result = mysqli_query($con,$table_select_query);
 			if (!$result) {
 				die('Could not connect: ' . mysql_error($con));
 			}
 			while($category_row = mysqli_fetch_array($result))
 			{
 				//echo "MENU NAME ".$category_row['category_name'] ." MENU ID ".$category_row['category_id']."<br>" ;
 				$category_id_array[] = $category_row['category_id'];
 				$category_name_array[] = $category_row['category_name'];
 			}
 			echo "CATEGORY ROW0".$category_id_array[0]."<br>";
 			/*GROUP CATEGORY truncation*/
 			
//  			$truncate_menu_category='TRUNCATE TABLE  item_category_group';
//  			if (mysqli_query($con, $truncate_menu_details))
//  			{
 			
//  			}else{
//  				echo "DELTING FAILED". mysqli_error($con)."<br>";
//  				return false;
//  			}
 			/*GROUP CATEGORY truncation*/
 			
 			for ($row = 1; $row <= $this->highestRow; $row++){
 				if($row > 1){
 					$this->rowData = $group_sheet->rangeToArray('A' . $row . ':' .$this->highestColumn  . $row,NULL,TRUE,FALSE);	
 					$dbcolumn_number=0;
 					$item_id= $row-1;
 					
 					for ($column =$this->mandatory_field_count;$column < $this->colLength; $column++){
 					
 						
 						$temp_item_details[$column]= $this->rowData[0][$column];
 						//echo "Category name ".$category[$column]." item decription ".$temp_item_details[$column]."<br>";
 						//echo "TEMP DETAILS".$temp_item_details[$column]."<br>";
 						
 						if($temp_item_details[$column] == "yes"){
               echo "ROW ID".$item_id."Column".$column .
               "Name".$temp_item_details[$column]."CATEGORY".$category_name_array[$dbcolumn_number]."CAtegoryID".$category_id_array[$dbcolumn_number]."<br>";
 							
               $item_details_query = "INSERT INTO item_category_group (item_id,category_id )VALUES ('$item_id','$category_id_array[$dbcolumn_number]')";
               if (mysqli_query($con,$item_details_query))
               {
               
               
               	//echo "Table  ITEM DETAILS created successfully 2<br>";
               	//return  true;
               }
               else
               {
               	echo "Error insert table  ITEM DETAILS: " . mysqli_error($con)."<br>";
               	 
               	return false;
               }
 							
 						}
 						$dbcolumn_number ++;
 					}	
 				}
 				
 			}
 			
 			
 		return true;
 		}
 	}
 	
 	/*GROUPING TABEL ENDS HERE*/

 	

 	
 } 


?>