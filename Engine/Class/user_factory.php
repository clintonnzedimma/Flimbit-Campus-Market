<?php
/**
 * @author Clinton Nzedimma
 * @package Users 
 */
class User_Factory
{
	public static $DB;
	function __construct()
	{	
		 self::$DB = new DB();
	}

	public static function signUp($_DATA) {

		/* user inputs */
		$username = sanitize_note($_DATA['username']);
		$full_name = sanitize_note($_DATA['full_name']);
		$password = sanitize_note(password_hash($_DATA['password'], PASSWORD_DEFAULT));
		$phone = sanitize_note(strip_whitespace($_DATA['phone']));
		$email = sanitize_note($_DATA['email']);
		$sex = sanitize_note($_DATA['sex']);
		$school_id = sanitize_note($_DATA['school_id']);
		$date_of_reg = date("Y-m-d");		
		$time_of_reg = date("H:i");


		$sql = "
			INSERT INTO users 
			(
				id,
				username,
				full_name,
				password,
				phone,
				email,
				sex,
				school_id,
				date_of_reg,
				time_of_reg
			)
			VALUES(
				NULL,
				'$username',	
				'$full_name',
				'$password',
				'$phone',
				'$email',
				'$sex',
				'$school_id',
				'$date_of_reg',
				'$time_of_reg'
			)
		";	

		return self::$DB->query($sql);
	}


	public static function usernameExists($param_username) {
		$param_username = sanitize_note($param_username);
		$sql = "SELECT * FROM users WHERE username = '$param_username' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return($num_rows > 0) ? true : false;
	}

	public static function emailExists($param_email) {
		$param_email= sanitize_note($param_email);
		$sql = "SELECT * FROM users WHERE email = '$param_email' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return($num_rows > 0) ? true : false;
	}

	public static function phoneNumberExists($param_phone) {
		$param_phone = sanitize_note($param_phone);
		$sql = "SELECT * FROM users WHERE phone = '$param_phone' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return($num_rows > 0) ? true : false;
	}


	public static function existsById($param_id){
		$param_id = sanitize_note($param_id);
		$sql = "SELECT * FROM users WHERE id = '$param_id' ";
		$query = self::$DB->query($sql);
		$num_rows = $query->num_rows;
		return($num_rows > 0) ? true : false;
	}


	public static function getByPhoneNumber($par, $param_phone){
		$par = sanitize_note($par);
		$param_phone = sanitize_note($param_phone); 
		$sql = "SELECT * FROM users WHERE phone = '$param_phone' ";
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

	public static function getByUsername($par, $param_username){
		$par = sanitize_note($par);
		$param_username = sanitize_note($param_username); 
		$sql = "SELECT * FROM users WHERE username = '$param_username' ";
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


	public static function getByEmail($par, $param_email){
		$par = sanitize_note($par);
		$param_email= sanitize_note($param_email); 
		$sql = "SELECT * FROM users WHERE email = '$param_email' ";
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

	public static function passwordCheckByPhone($param_phone, $param_password) {
			$param_phone = sanitize_note(strip_whitespace($param_phone));
			$param_password = sanitize_note($param_password);
			$sql = "SELECT * FROM users WHERE phone = '$param_phone' ";
			$query = self::$DB->query($sql);
			$num_rows = $query->num_rows;

			$count_check = null;
			if($num_rows > 0) {
				while ($row = $query->fetch_assoc()){
					if (password_verify($param_password, $row['password'])) {
						$count_check ++;
					}
				}
				return ($count_check>0) ? true :false;
			}
		}	

		public static function authenticate ($param) {
			$param = sanitize_note($param);
			$_SESSION['flimbit_username'] = $param;
		}	

		public static function logOut() {
			session_unset($_SESSION['flimbit_username']);
		}		

		public static function isLoggedIn() {
			return (isset($_SESSION['flimbit_username'])) ? true : false;
		}

		public static function protectPage() {
			if (!self::isLoggedIn()) {
				header("Location:login.php");
				exit();
			}
		}

		public static function recordUserLog($user_id) {
			$user_id = sanitize_note($user_id);
			$phpsessid = $_COOKIE['PHPSESSID'];
			$date_log = date("Y-m-d");		
			$time_log= date("H:i");
			$sql = "INSERT INTO user_logs (
					id,
					user_id,
					phpsessid,
					date_log,
					time_log
				)
				VALUES (
					'id',
					'$user_id',
					'$phpsessid',
					'$date_log',
					'$time_log'					
				)
			";
			return self::$DB->query($sql);
		}


	public static function tokenExists ($tkn) {
		$tkn = sanitize_note($tkn);
		return (self::$DB->query("SELECT * FROM users WHERE token = '$tkn' ")->num_rows > 0) ? true : false;
	}	
	public static function createToken($user_id) {
		$user_id = sanitize_note($user_id);
		$tkn = md5(rand(1e1, 2e6));
		if (self::tokenExists($tkn)) {
			$tkn = md5(rand(2e6, 5e9));
		}
		return self::$DB->query("UPDATE users SET token = '$tkn' WHERE id = '$user_id' ");
	}

	public static function authenticateByToken ($tkn, $user_id) {
		$user = new User_Singleton($user_id);
		return ($tkn == $user->get('token')) ? true : false;
	}

	public static function getByToken ($par, $tkn) {
		$par = sanitize_note($par);
		$tkn = sanitize_note($tkn);
		
		$query = self::$DB->query("SELECT * FROM users WHERE token = '$tkn' ");
		if ($query->num_rows>0) {
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

# Static Initializations
new User_Factory();

?>