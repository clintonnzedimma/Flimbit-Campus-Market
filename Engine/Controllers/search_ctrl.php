<?php

/*Non logged user*/
if (!User_Factory::isLoggedIn() && isset($_GET['q'])) {
	// Search query
	$q = sanitize_note($_GET['q']);

	// Number of result per page
	$num_result_per_page = 10;

	// Page Title & SEO
	$_PAGE_TITLE = "$q - Search  | Flimbit | Classified Ads on Campus";	

	// Pagination
	$page_num = $page_num = (isset($_GET['p'])) ? $_GET['p'] : 1;

	// Search Results
	$search_all_assoc = Ad_Factory::searchAllAssoc($q, "DESC", $num_result_per_page, $page_num);
	$ads = $search_all_assoc["data"];
	$page_links = $search_all_assoc['page_links'];
	$page_links = $search_all_assoc["page_links"];
	$num_of_pages = $search_all_assoc["num_of_pages"];	
	
}


/*Logged user*/
if (User_Factory::isLoggedIn() && isset($_GET['q'])) {
	// Search query
	$q = sanitize_note($_GET['q']);

	// Number of result per page
	$num_result_per_page = 10;

	// Page Title & SEO
	$_PAGE_TITLE = "$q - Search  | Flimbit | Classified Ads on Campus";	

	// Pagination
	$page_num = $page_num = (isset($_GET['p'])) ? $_GET['p'] : 1;


	// Category Data
	if (isset($_GET['sch']) && $_GET['sch'] == 'user-school' ) {
		// Search by user school
		$search_all_assoc = Ad_Factory::searchAllFromUserSchool($q, $u->get('school_id'), "DESC", $num_result_per_page, $page_num);

		// Defining URL GET $sch parameter for the school category to be displayed
		$sch = $_GET['sch']; 
	} else if (isset($_GET['sch']) && $_GET['sch'] == 'others') {
		// Search by NOT user school
		$search_all_assoc = Ad_Factory::searchAllNotUserSchool($q, $u->get('school_id'), "DESC", $num_result_per_page, $page_num);

		// Defining URL GET $sch parameter for the school category to be displayed
		$sch = $_GET['sch'];
	} else {
		// Search by all schools
		$search_all_assoc = Ad_Factory::searchAllAssoc($q, "DESC", $num_result_per_page, $page_num);

		// Defining URL GET $sch parameter for the school category to be displayed
		$sch = "all";
	}
	

	// Search Results
	$ads = $search_all_assoc["data"];
	$page_links = $search_all_assoc['page_links'];
	$page_links = $search_all_assoc["page_links"];
	$num_of_pages = $search_all_assoc["num_of_pages"];	
}



/*The blocks below is a safe redirection if there is no search query*/
if (!isset($_GET['q']) && User_Factory::isLoggedIn())  {
	header("Location:home.php");
	exit();
}
if (!isset($_GET['q']) && !User_Factory::isLoggedIn())  {
	header("Location:index.php");
	exit();
}




?>