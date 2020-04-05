<?php
/**
* @author Clinton Nzedimma
* @controller for profile.php	
*/


if (isset($_GET['u']) && User_Factory::usernameExists($_GET['u'])) {
	// Creating user singleton object by getting username of the respective id 
	$user = new User_Singleton(User_Factory::getByUsername('id', $_GET['u']));

	// The number of result per page
	$num_result_per_page = 10;

	// Page number
	$page_num = (isset($_GET['p'])) ? sanitize_note($_GET['p']) : 1;

	//	Creating variable for user ads to be displayed
	$user_ads_assoc = Ad_Factory::assocByUserId("DESC",$user->get('id'), $num_result_per_page, $page_num);

	// Pagination links 
	$page_links = $user_ads_assoc["page_links"];

	// Number of pages with result depending on thw number of result per page
	$num_of_pages = $user_ads_assoc["num_of_pages"];

	// Passing all the data from database to the $ads variable
	$ads = $user_ads_assoc["data"];

}

?>