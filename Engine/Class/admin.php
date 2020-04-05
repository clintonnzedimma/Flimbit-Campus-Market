<?php

/**
 * 
 */
class Admin
{
	public static $DB;
	function __construct()
	{
		self::$DB= new DB();
	}

	public static function login() {
		$username = sanitize_note($_REQUEST["username"]);
		$password = sanitize_note($_REQUEST["password"]);

		if ($username=="flimbit-admin" && $password == "qwerty123") {
				$_SESSION['sys_admin'] = $username;
				return true;
		}	

	}

	public static function logout() {
			session_unset($_SESSION['sys_admin']);
			header("Location:index.php");
			exit();
	}	

	public static function protectPage()
	{
		if (!isset($_SESSION['sys_admin']) ) {
			header("Location:index.php");
			exit();
		}
	}

}

#Static Initialization
new Admin();
?>