<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'gautam15_reegraa');//
define('DB_PASSWORD', 'reegraaj');//
define('DB_NAME', 'gautam15_reegraaj');//
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
		public function get_project($get_id) 
		 {
			 $result=mysqli_query($this->dbh,"SELECT * FROM projects WHERE id = '$get_id' AND status=1");
			 return $result;
		}
		 public function get_all() 
		{
			$result=mysqli_query($this->dbh,"SELECT * FROM projects ORDER BY id ASC");
			return $result;
	   }
 		public function get_features($url)
 		{
 			$result=mysqli_query($this->dbh,"SELECT * FROM projects,features WHERE projects.id = features.project_id AND projects.url = '$url'");
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
 		public function get_amenities($url){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects,amenities WHERE projects.id = amenities.project_id AND projects.url = '$url'");
 			return $result;
		}
		public function get_architects($get_id){
			$result=mysqli_query($this->dbh,"SELECT * FROM architects WHERE project_id = '$get_id'");
			return $result;
		}
		public function get_completed(){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects WHERE project_category = 'Completed Projects' AND approvel = 1 ORDER BY id DESC");
			return $result;
		}
		public function get_ongoing(){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects WHERE project_category = 'Ongoing Projects' AND approvel = 1 ORDER BY id DESC");
			return $result;
		}
		public function get_upcomming(){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects, location WHERE projects.id = location.project_id AND projects.project_category = 'Upcoming Projects' AND projects.approvel = 1 ORDER BY projects.id DESC");
			return $result;
		}
		public function get_upcomming_lim(){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects, location WHERE projects.id = location.project_id AND projects.project_category = 'Upcoming Projects' AND projects.approvel = 1 ORDER BY projects.id DESC LIMIT 4");
			return $result;
		}
		public function get_completed_lim(){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects WHERE project_category = 'Completed Projects' AND approvel = 1 ORDER BY id DESC LIMIT 4");
			return $result;
		}
		public function get_project_data($url) 
		 {
			 $result=mysqli_query($this->dbh,"SELECT * FROM projects WHERE url = '$url'");
			 return $result;
		}
		public function get_single_project_images($url){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects,images where projects.id = images.project_id and projects.url = '$url'");
			return $result;
		}
		public function get_architects1($url){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects,architects WHERE projects.id = architects.project_id AND projects.url = '$url'");
			return $result;
		}
		public function get_location1($url){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects,location WHERE projects.id = location.project_id AND projects.url = '$url' LIMIT 1");
			return $result;
		}
		public function get_latest_project(){
			$result=mysqli_query($this->dbh,"SELECT * FROM projects WHERE project_category = 'Ongoing Projects' AND approvel = 1 ORDER BY id ASC LIMIT 1");
			return $result;
		}
	}
?>