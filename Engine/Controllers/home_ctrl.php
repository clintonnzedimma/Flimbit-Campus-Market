<?php
/**
* @author Clinton Nzedimma 
* @contoller for home.php
*/

// SAFE REDIRECTION
if (!User_Factory::isLoggedIn()) {
	header("Location:index.php");
	exit();
}

// The number of result per page
$num_result_per_page = 20;

// Page number
$page_num = (isset($_GET['p'])) ? sanitize_note($_GET['p']) : 1;

//	Creating variable for ads to be displayed
$all_ads_assoc = Ad_Factory::allAssoc("DESC",$num_result_per_page, $page_num);

// Pagination links 
$page_links = $all_ads_assoc["page_links"];

// Number of pages with result depending on thw number of result per page
$num_of_pages = $all_ads_assoc["num_of_pages"];

// Passing all the data from database to the $ads variable
$ads = $all_ads_assoc["data"];


?>