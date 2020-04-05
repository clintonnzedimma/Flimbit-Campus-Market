<?php
/**
*	@author Clinton Nzedimma
*	@package Paging
*   @static @abstract  This is an abstract class used for pagination
*/



 abstract class Pagination
 {		
			
	public static $get_page_num; // url get value
	public static $get_num_result_per_page;  //  result per page
	public static  $get_search_num_pages; // number of pages
	public static $div_container_id;	
	public static $file_name_of_page;
 	public static $number_of_pages;

 	function __construct()
 	{
 		self::$div_container_id="#";
 	}

	protected static function display_pagination_links($number_of_pages) {
		/**
		* @param $number_of_pages is the number of pages
		*/
			echo "<br>
			<div class='pagination' align='center'>";
				if(self::$get_page_num>1) {
						// if the page number is greater than 1, it displays a link used to go to a page by a step back
						$previous_page_num=self::$get_page_num-1;
						echo 
	"	<a href='".self::$file_name_of_page."p=".$previous_page_num. "#".self::$div_container_id."' name='".self::$div_container_id."'> &#9001; </a> 
	 ";

	}
				
					for ($page=1; $page<=$number_of_pages; $page++) { 
						// page number links here
						echo 
	"	<a href='".self::$file_name_of_page."p=".$page. "#".self::$div_container_id."' ".activeLinkSelectorPaginate('p', $page, 'active-page') ."> $page </a> 
	";	
	}	

					if($number_of_pages >self::$get_page_num) {
						// number of pages is greater than current page number 
						$next_page_num=self::$get_page_num+1;
						echo 
	"	<a href='".self::$file_name_of_page."p=".$next_page_num. "#".self::$div_container_id."'> &#9002; </a> 
	 ";


	 	echo "</div>";
				}	
	}



	protected static function pagesAssoc($number_of_total_data) {
		self::$number_of_pages = ceil($number_of_total_data/self::$get_num_result_per_page);

		if (self::$get_page_num>1) {
			$previous_page_num=self::$get_page_num - 1;
		}
		if(self::$number_of_pages >self::$get_page_num) { 
			$next_page_num=self::$get_page_num + 1;
		}

		$data = array();
		$data[0] = "<a href='".self::$file_name_of_page."?p=0#".self::$div_container_id."' ".activeLinkSelectorPaginate('p',0, 'active') ."> 0 </a>";

		for ($page = 1; $page <= self::$number_of_pages ; $page++) { 
			$data[$page] = "<a href='".self::$file_name_of_page."?p=".$page. "#".self::$div_container_id."' ".activeLinkSelectorPaginate('p', $page, 'active') ."> $page </a>";
		}
			return $data;

	}
	 	
}



?>