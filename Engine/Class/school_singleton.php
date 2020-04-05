<?php
/**
 * @author Clinton Nzedimma
 * @package  School 
 */
class School_Singleton
{	
	public $DB;
	public $id;
	function __construct($id)
	{	
		 $this->DB = new DB();
		 $this->id = sanitize_note($id);
	}

	public function get($par) {
		$par = sanitize_note($par);
		$sql = "SELECT * FROM schools WHERE id = '$this->id' ";
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

	public function modify()
	{
		$name = sanitize_note($_REQUEST['name']);
		$acronym = sanitize_note($_REQUEST['acronym']);
		$state = sanitize_note($_REQUEST['state']);
		$keywords = sanitize_note($_REQUEST['keywords']);
		$keyphrases = sanitize_note($_REQUEST['keyphrases']);
		$hashtags = sanitize_note($_REQUEST['hashtags']);		

		$sql = "UPDATE schools SET 
			name = '$name',
			acronym = '$acronym',
			state = '$state',
			keywords = '$keywords',
			keyphrases = '$keyphrases',
			hashtags = '$hashtags'			
			WHERE id = '$this->id' 
		";
		$query = $this->DB->query($sql);
	}
}


?>