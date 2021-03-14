<?php
	
	include('../classes/functions.php');
	$con = new functions();
	session_start();
	
	function seo_url($vp_string){
	$vp_string = trim($vp_string);
	$vp_string = html_entity_decode($vp_string);
	$vp_string = strip_tags($vp_string);
	$vp_string = strtolower($vp_string);
	$vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);
	$vp_string = preg_replace('~ ~', '-', $vp_string);
	$vp_string = preg_replace('~-+~', '-', $vp_string);
	$vp_string .= "/";
	return $vp_string;
}
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'add_blogs'){
		//$added_by = $_SESSION['user_id'];
            $product_id = $_REQUEST['product_id'];
            $amenities_tittle = $_REQUEST['amenities_tittle'];

						
			//$title = str_replace("'","\'", $_REQUEST['title']);
			//$description = $_REQUEST['description'];			
			//$url = seo_url($title);
            $sql_insert_blogs = "INSERT INTO amenities(project_id,amenities_title) VALUES ('".$product_id."','".$amenities_tittle."')";
            
			
			$result_insert_blogs = $con->data_insert($sql_insert_blogs);
					
			if($result_insert_blogs == 1){
				echo 1;
				exit;
			}else{
				echo 0;
				exit;
			}
		}
?>