<?php
/**
* @author Clinton Nzedimma 
* @controller for index.php
*/

if (User_Factory::isLoggedIn()) {
	header("Location:home.php");
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


// SEO 
$KEYWORDS = "buy, sell, campus, classified ads in campus";
$DESCRIPTION = "Flimbit is Nigeria's online campus market place for students to buy and sell stuff in school. Flimbit is a place for students to connect with other students and do business together. Get in to know what your friends are selling and get the best deals";

?>