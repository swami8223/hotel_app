$hotel_details_table="CREATE TABLE  hotel_details(
 					HotelName CHAR(100) NOT NULL,
 					Address CHAR(100) NOT NULL,
 					Phonenumber INT NOT NULL,
 					City CHAR(100) NOT NULL,
 					State Char(100) NOT NULL,
 					Country Char(100) NOT NULL,
 					Zipcode INT NOT NULL,
                    Hotel_id INT NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY (Hotel_id) 
                   
)";

// this has to be modified
$menu_details_tabel = "CREATE TABLE  menu_details(
 					item_name CHAR(100) NOT NULL,
 					item_image CHAR(100) NOT NULL,
 					item_video CHAR(100) NOT NULL,
 					stock_status CHAR(100) NOT NULL,
 					stock_count INT NOT NULL,
 					price INT NOT NULL,
 					item_details CHAR(100) NOT NULL,
 					todays_special CHAR(100) NOT NULL,
                    menu_id INT NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY (menu_id) 
                   
)";


menu_category = CREATE TABLE  menu_category(
                               category_name CHAR(100) NOT NULL, 
                              category_id INT NOT NULL AUTO_INCREMENT,
                             PRIMARY KEY (category_id));
                    
item_category_group = CREATE TABLE  item_category_group(
                              item_id INT NOT NULL, 
                              category_id INT NOT NULL,
                              group_id INT NOT NULL AUTO_INCREMENT,
                             PRIMARY KEY (group_id));
 
 Users_Table = CREATE TABLE IF NOT EXISTS users (
  				userID int(4) NOT NULL auto_increment,
  				username varchar(100) NOT NULL default '',
  				password varchar(65) NOT NULL default '',
  				usertype int(4) NOT NULL default 3,
  				PRIMARY KEY  (userID)
);
INSERT INTO users VALUES (1,'admin', '12345', 1);
 		