<?php
/**
* @author Clinton Nzedimma 
* @contoller for category.php
*/

/* Categories the user can pass over URL */
$allowed_categories = array(
	"electronics" => "electronics",
	"fashion" => "fashion",
	"services" => "services",
	"phones" => "phones",
	"food" => "food",
	"books & school items" => "books-school-items",
	"sport, hobbies & art" => "sport-hobbies-art"		
); 



if (!User_Factory::isLoggedIn()) {
	if (isset($_GET['k']) && in_array(strtolower($_GET['k']), $allowed_categories)) {
		// Category Database Key to pass into Ad Factory Method
		$category = sanitize_note(strtolower($_GET['k'])); 

		// Getting Category Name
		$category_name = array_keys($allowed_categories, $category);
		$category_name = ucwords($category_name[0]);

		// Page Title & SEO
		$_PAGE_TITLE = "$category_name | Flimbit | Classified Ads on Campus";
		$KEYWORDS = "buy, sell, campus, classified ads in campus, $category_name";
		$DESCRIPTION = "Flimbit is Nigeria's online campus market place for students to buy and sell stuff in school. Flimbit is a place for students to connect with other students and do business together. Get in to know what your friends are selling and get the best deals";		

		// Pagination
		$num_result_per_page = 10;
		$page_num = (isset($_GET['p'])) ? $_GET['p'] : 1;

		// Category Data
		$assoc_by_category  = Ad_Factory::assocByCategory ("DESC",$category, $num_result_per_page, $page_num);
		$ads = $assoc_by_category["data"];
		$page_links = $assoc_by_category['page_links'];
		$page_links = $assoc_by_category["page_links"];
		$num_of_pages = $assoc_by_category["num_of_pages"];		


	}
}





if (User_Factory::isLoggedIn()) {
	if (isset($_GET['k']) && in_array(strtolower($_GET['k']), $allowed_categories)) {
		// Category Database Key to pass into Ad Factory Method
		$category = sanitize_note(strtolower($_GET['k'])); 

		// Getting Category Name
		$category_name = array_keys($allowed_categories, $category);
		$category_name = ucwords($category_name[0]);

		// Page Title & SEO
		$_PAGE_TITLE = "$category_name | Flimbit | Classified Ads on Campus";

		// Pagination
		$num_result_per_page = 10;
		$page_num = (isset($_GET['p'])) ? $_GET['p'] : 1;


		// Category Data
		if (isset($_GET['sch']) && $_GET['sch'] == 'user-school' ) {
			// Category by user school
			$assoc_by_category = Ad_Factory::assocByCategoryAndUserSchool ("DESC", $category, $u->school->get('id'), $num_result_per_page, $page_num);

			// Defining URL GET $sch parameter for the school category to be displayed
			$sch = $_GET['sch']; 
		} else if (isset($_GET['sch']) && $_GET['sch'] == 'others') {
			// Category by NOT user school
			$assoc_by_category = Ad_Factory::assocByCategoryAndNotUserSchool ("DESC", $category, $u->school->get('id'), $num_result_per_page, $page_num);

			// Defining URL GET $sch parameter for the school category to be displayed
			$sch = $_GET['sch'];
		} else {
			// Category by all schools
			$assoc_by_category  = Ad_Factory::assocByCategory ("DESC", $category, $num_result_per_page, $page_num);

			// Defining URL GET $sch parameter for the school category to be displayed
			$sch = "all";
		}

		$ads = $assoc_by_category["data"];
		$page_links = $assoc_by_category['page_links'];
		$page_links = $assoc_by_category["page_links"];
		$num_of_pages = $assoc_by_category["num_of_pages"];	

		
		

	}
}


// REDIRECTING SOMEWHERE SAFE

if (!isset($_GET['k']) && User_Factory::isLoggedIn()) {
	header("Location:home.php");
	exit();
}

if (!isset($_GET['k']) && !User_Factory::isLoggedIn()) {
	header("Location:index.php");
	exit();
}

?>