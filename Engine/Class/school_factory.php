<?php
/**
 * @author Clinton Nzedimma
 * @package School
 */
class School_Factory
{
	public static $DB;
	function __construct()
	{	
		 self::$DB = new DB();
	}

	public static function add() {
		/* data to add */
		$name = sanitize_note($_REQUEST['name']);
		$acronym = sanitize_note($_REQUEST['acronym']);
		$state = sanitize_note($_REQUEST['state']);
		$keywords = sanitize_note($_REQUEST['keywords']);
		$keyphrases = sanitize_note($_REQUEST['keyphrases']);
		$hashtags = sanitize_note($_REQUEST['hashtags']);
		$date_of_add = date("Y-m-d");		
		$time_of_add = date("H:i");

		$sql = "INSERT INTO schools 
		(
			id,
			name,
			acronym,
			state,
			keywords,
			keyphrases,
			hashtags,
			date_of_add,
			time_of_add
		)
		VALUES 
		(
			NULL,
			'$name',
			'$acronym',
			'$state',
			'$keywords',
			'$keyphrases',
			'$hashtags',			
			'$date_of_add',
			'$time_of_add'
		)
		";
		return self::$DB->query($sql);
	}


	public static function listAssoc (){
		$sql = "SELECT * FROM schools";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows>0) {
			while ($row = $query->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}

	public static function assocByAcronym() {
		$sql = "SELECT * FROM schools";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		$data = array();
		if ($num_rows>0) {
			while ($row = $query->fetch_assoc()) {
				$data[$row['acronym']] = $row;
			}
			return $data;
		}		
	}

	public static function existsById($param_id){
		$param_id = sanitize_note($param_id);
		$sql = "SELECT * FROM schools WHERE id ='$param_id'";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return ($num_rows > 0) ? true : false;
	}

	public static function getById($par, $param_id){
		$par = sanitize_note($par);
		$param_id = sanitize_note($param_id); 
		$sql = "SELECT * FROM schools WHERE id = '$param_id' ";
		$query = self::$DB->query($sql);
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


}

# Static Initialization
new School_Factory();
?>