<?php
/**
 * @author Clinton Nzedimma
 * @package  Ad
 */
class Ad_Singleton
{	
	public $DB;
	public $id;
	public $school;
	public $creator;
	public $data = array();
	public $date_of_post = array();
	function __construct($id)
	{	
		 $this->DB = new DB();
		 $this->id = sanitize_note($id);
		 $this->creator = new User_Singleton($this->get('user_id')); // Creating user object of the user that posted the ad
		 $this->school = new School_Singleton($this->get('school_id')); // Creating school object of school the ad was posted to

		 $this->storeAdDataInArray(); // Storing the data array

		 /*ad data*/
		  $date_of_post_create = date_create($this->get("date_of_post")); //constructor data for date of post
		  $this->date_of_post = array(
		  	"d/m/Y" => date_format($date_of_post_create, "d/m/Y"),
		  	"d/M/Y" => date_format($date_of_post_create, "d/M/Y"),
	  		"d-m-Y" => date_format($date_of_post_create, "d-m-Y"),
		  	"d-M-Y" => date_format($date_of_post_create, "d-M-Y")		 
		  );


	}

	public function get($par) {
		$par = sanitize_note($par);
		$sql = "SELECT * FROM ads WHERE id = '$this->id' ";
		$query = $this->DB->query($sql);
		$num_rows = $query->num_rows;

		if ($num_rows>0) {
			while ($row = $query->fetch_assoc()) {
				switch ($par) {
					case $par:
						$value = $row[$par];
						break;

					default:
						$value = null;
						break;
				}
			}
			return $value;
		}
	}

	public function isNegotiable() {
		return ($this->get('negotiable') == 1) ? true : false;
	}

	public function hasImage() {
		return ($this->get('main_img') || $this->get('main_img') !='') ? true : false;
	}

	private function storeAdDataInArray () {
		$query =  $this->DB->query("SELECT * FROM ads WHERE id = '$this->id' ");
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$this->data = $row;
			}
		}
	}



}
?>