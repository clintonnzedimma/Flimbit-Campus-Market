<?php
/**
 * @author Clinton Nzedimma
 * @package Ads
 */

class Ad_Factory extends Pagination
{
	public static $DB;
	function __construct()
	{
		self::$DB = new DB();
		self::$file_name_of_page=basename($_SERVER['PHP_SELF'], '.php').".php"; 
	}

	public static function createNew($_DATA, $user_id, $school_id, Upload $upload)
	{	
		/**
		* @param User id, School id of user
		* @method creates new ad
		* @return boolean
		*/
		$user_id = sanitize_note($user_id);
		$school_id = sanitize_note($school_id);

		$category = sanitize_note($_DATA['category']);
		$title =  sanitize_note($_DATA['title']);
		$description =  sanitize_note($_DATA['description']);
		$price = intval($_DATA['price']);
		$negotiable = isset($_DATA['negotiable']) ? 	true : false;
		$date_of_post = date("Y-m-d");	
		$time_of_post = date("H:i"); 

		/*upload image to folder*/

		//If upload is not base64
		if ($upload->base64_init_val == null) {
			$upload->pushImageTo("placement-img");
		}else {
			$upload->pushBase64ImageTo(ROOT."/placement-img");
		}
		
		$main_img = $upload->data["new_file_name"];

		$sql = "INSERT INTO ads (	
					id,
					category,
					title,
					description,
					price,
					negotiable,
					main_img,
					user_id,
					school_id,
					date_of_post,
					time_of_post
				) 
				VALUES (
					NULL,
					'$category',
					'$title',
					'$description',
					'$price',
					'$negotiable',
					'$main_img',
					'$user_id',
					'$school_id',
					'$date_of_post',
					'$time_of_post'					
				)
		";
		return self::$DB->query($sql);
	}


	public static function existsById($param_id){
		$param_id = sanitize_note($param_id);
		$sql = "SELECT * FROM ads WHERE id = '$param_id' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return($num_rows > 0) ? true : false;
	}


	public static function allAssoc ($order, $num_result_per_page, $page_num) {
		/**
		* @param order=>*ASC or DESC by id*,num_result_per_page => *number of result to return*, page_num => *page number*
		* @method returns all ads
		*/
		$order = sanitize_note($order);
		self::$get_num_result_per_page = $num_result_per_page ;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;

		$sql = "SELECT * FROM ads ORDER BY id $order LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM ads")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}
	}

	
	public static function assocByUserId ($order,$user_id , $num_result_per_page, $page_num) {
		/**
		* @param order=>*ASC or DESC by id*, user_id => *id of a user*, num_result_per_page => *number of result to return*, page_num => 	*page number*
		* @method returns ads of a partcular user
		*/
		$order = sanitize_note($order);
		$user_id = sanitize_note($user_id);
		self::$get_num_result_per_page = $num_result_per_page ;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;

		$sql = "SELECT * FROM ads WHERE user_id = '$user_id' ORDER BY id $order LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM ads WHERE user_id = '$user_id' ")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}
	}



	public static function assocByCategoryAndUserSchool ($order, $param_category, $school_id, $num_result_per_page, $page_num) {
		/**
		* @param order=>*ASC or DESC by id*, param_category => *category key*, user_id => *id of a user*
		* @param  num_result_per_page => *number of result to return*, page_num => 	*page number*
		* @method returns ads based on user schools and chosen category 
		*/
		$order = sanitize_note($order);
		$param_category = sanitize_note($param_category);
		$school_id = sanitize_note($school_id);
		self::$get_num_result_per_page = $num_result_per_page;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;

		$sql = "SELECT * FROM ads WHERE category = '$param_category' AND school_id = '$school_id' ORDER BY id $order LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM ads WHERE category = '$param_category' AND school_id = '$school_id' ")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}
	}


	public static function assocByCategoryAndNotUserSchool ($order, $param_category, $school_id, $num_result_per_page, $page_num) {
		/**
		* @param order=>*ASC or DESC by id*, param_category => *category key*, user_id => *id of a user*
		* @param  num_result_per_page => *number of result to return*, page_num => 	*page number*
		* @method returns ads based onschool user schools and chosen category 
		*/
		$order = sanitize_note($order);
		$param_category = sanitize_note($param_category);
		$school_id = sanitize_note($school_id);
		self::$get_num_result_per_page = $num_result_per_page;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;

		$sql = "SELECT * FROM ads WHERE category = '$param_category' AND school_id != '$school_id' ORDER BY id $order LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM ads WHERE category = '$param_category' AND user_id != '$school_id' ")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}
	}



	public static function assocByCategory($order, $param_category, $num_result_per_page, $page_num) {
		/**
		* @param  order=>*ASC or DESC by id*, param_category => *category key*, num_result_per_page => *number of result to return*, page_num => *page number*
		* @method returns ads based on category
		*/
		$order = sanitize_note($order);
		$param_category = sanitize_note(strtolower($param_category));
		self::$get_num_result_per_page = $num_result_per_page;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;

		$sql = "SELECT * FROM ads WHERE category = '$param_category' ORDER BY id $order  LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM ads WHERE category = '$param_category' ")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}
	}


	public static function searchAllAssoc($search_query, $order, $num_result_per_page, $page_num) {
		/**
		* @param search_query=>*the value to be searched* ,order=>*ASC or DESC by id*, param_category => *category key*, num_result_per_page => *number of result to return*, page_num => *page number*
		* @method returns searched ads
		*/
		$search_query = sanitize_note($search_query);
		$order = sanitize_note($order);
		self::$get_num_result_per_page = $num_result_per_page;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;


		$sql = "SELECT * FROM ads WHERE title LIKE '%$search_query%' OR description LIKE '%$search_query%' OR category LIKE '%$search_query%' ORDER BY id $order  LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM ads WHERE title LIKE '%$search_query%' OR description LIKE '%$search_query%'  OR category LIKE '%$search_query%'")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}		

	}

	public static function searchAllNotUserSchool($search_query, $school_id, $order, $num_result_per_page, $page_num) {
		/**
		* @param user_id =>*user id* ,search_query=>*the value to be searched* ,order=>*ASC or DESC by id*, param_category => *category key*, num_result_per_page => *number of result to return*, page_num => *page number*
		* @method returns ads based on category
		*/
		$school_id = sanitize_note($school_id);
		$search_query = sanitize_note($search_query);
		$order = sanitize_note($order);
		self::$get_num_result_per_page = $num_result_per_page;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;


		$sql = "SELECT * FROM ads WHERE  school_id != '$school_id' AND title  LIKE '%$search_query%' OR description LIKE '%$search_query%' AND school_id != '$school_id' OR  category LIKE '%$search_query%' AND school_id != '$school_id' ORDER BY id $order  LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM ads WHERE  school_id != '$school_id' AND title  LIKE '%$search_query%' OR description LIKE '%$search_query%' AND school_id != '$school_id' OR  category LIKE '%$search_query%' AND school_id != '$school_id' ")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}		

	}


	public static function searchAllFromUserSchool($search_query, $school_id, $order, $num_result_per_page, $page_num) {
		/**
		* @param user_id =>*user id* ,search_query=>*the value to be searched* ,order=>*ASC or DESC by id*, param_category => *category key*, num_result_per_page => *number of result to return*, page_num => *page number*
		* @method returns ads based on category
		*/
		$school_id = sanitize_note($school_id);
		$search_query = sanitize_note($search_query);
		$order = sanitize_note($order);
		self::$get_num_result_per_page = $num_result_per_page;
		self::$get_page_num = $page_num;
		$starting_limit_number = (self::$get_page_num-1) * self::$get_num_result_per_page;


		$sql = "SELECT * FROM ads WHERE  school_id = '$school_id' AND title  LIKE '%$search_query%' OR description LIKE '%$search_query%' AND school_id = '$school_id' OR  category LIKE '%$search_query%' AND school_id = '$school_id' ORDER BY id $order  LIMIT $starting_limit_number, $num_result_per_page";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row; 
			}
			$retval = array(
				"data" => $data,
				"page_links" => self::pagesAssoc(self::$DB->query("SELECT * FROM ads WHERE  school_id = '$school_id' AND title  LIKE '%$search_query%' OR description LIKE '%$search_query%' AND school_id = '$school_id' OR  category LIKE '%$search_query%' AND school_id = '$school_id' ")->num_rows),
				"num_of_pages" =>self::$number_of_pages
			);

			return $retval;
		}		

	}




}

#Static Initialization
new Ad_Factory();
?>