<?php
/**
 * @author Clinton Nzedimma
 * @package Users 
 */
class User_Singleton
{	
	public $DB;
	public $id;
	public $school;
	public $public_data = array();
	function __construct($id)
	{	
		 $this->DB = new DB();
		 $this->id = sanitize_note($id);
		 $this->school = new School_Singleton($this->get('school_id'));
		 $this->storeUserDataInArray();
	}

	public function get($par) {
		$par = sanitize_note($par);
		$sql = "SELECT * FROM users WHERE id = '$this->id' ";
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

		public function modifyProfile($_DATA) {
			$full_name = sanitize_note($_DATA['full_name']);
			$email = sanitize_note($_DATA['email']);
			$sex = sanitize_note($_DATA['sex']); 
			$sql = "UPDATE users SET
				full_name = '$full_name',
				email='$email',
				sex = '$sex' 
				WHERE id = '$this->id' 
			";
			return $this->DB->query($sql);
		}

		public function changePassword($param_password){
			$param_password = sanitize_note($param_password);
			$new_password= sanitize_note(password_hash($param_password, PASSWORD_DEFAULT));
			$sql = "UPDATE users SET  password = '$new_password' WHERE id = '$this->id' ";
			return $this->DB->query($sql);	
		}


		public function changeDpData ($par) {
			try {
				/* delete old profile picture*/
				unlink(ROOT."/avatars/".$this->get('profile_pic')); 
			} catch (Exception $e) { }
			
			$par = sanitize_note($par);
			$sql = "UPDATE users SET profile_pic = '$par' WHERE id = '$this->id' ";
			return $this->DB->query($sql);
		}	

		public function hasDP() {
			return ($this->get('profile_pic') != null && $this->get("profile_pic") != "") ? true : false;
		}
		private function storeUserDataInArray () {
			$query =  $this->DB->query("SELECT * FROM users WHERE id = '$this->id' ");
			$tmp_data = [];
			if ($query->num_rows > 0) {
				while ($row = $query->fetch_assoc()) {
					$tmp_data = $row;
				}
			}

			$disallowed_keys = array('password', 'token');

			foreach ($tmp_data as $key => $value) {
				if (!in_array($key, $disallowed_keys)) {
					$this->public_data[$key] = $value;
				}
			}
		}

}


?>