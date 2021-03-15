<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'reegraaj');
class fetch_data
	{
 		function __construct()
 		{
			$mysqli = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
			$this->dbh=$mysqli;
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 			}
 		}
 		public function get_features($get_id)
 		{
 			$result=mysqli_query($this->dbh,"SELECT * FROM features WHERE project_id = '$get_id'");
 			return $result;
 		}
 		public function get_location($get_id){
 			$result=mysqli_query($this->dbh,"SELECT * FROM location WHERE project_id = '$get_id'");
 			return $result;
 		}
 		public function get_images($get_id){
 			$result=mysqli_query($this->dbh,"SELECT * FROM images WHERE project_id = '$get_id'");
 			return $result;
		 }
 		public function get_amenities($get_id){
			$result=mysqli_query($this->dbh,"SELECT * FROM amenities WHERE project_id = '$get_id'");
			return $result;
		}
		public function get_architects($get_id){
			$result=mysqli_query($this->dbh,"SELECT * FROM architects WHERE project_id = '$get_id'");
			return $result;
		}
		public function get_review(){
			$result=mysqli_query($this->dbh,"SELECT * FROM reviews ORDER BY review_id DESC");
			return $result;
		}
	   
	}
?>
