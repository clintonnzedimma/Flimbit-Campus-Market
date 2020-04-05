<?php
/**
* @author Clinton Nzedimma
* Controller for signup.php
*/

if (User_Factory::isLoggedIn()) {
	/* redirect somewhere safe */
	header("Location:welcome.php");
	exit();	
}

if (isset($_POST['login'])) {
	# required fields
	$req_fields = array('phone', 'password');

	# Actual data for user login
	$phone = sanitize_note(strip_whitespace($_POST['phone']));;
	$password = sanitize_note($_POST['password']);


	/* Handling errors */
	if (!mandatory_fields($req_fields)) {
		$errors[] = "Please fill all fields !";
	}
	if (!User_Factory::phoneNumberExists($phone) && strlen($phone) == 11) {
		$errors[] = "This phone number <b> $phone </b> does not exist !";
	}
	if (strlen($phone) != 11) {
		$errors[] = "Invalid Phone Number !";
	}
	if (User_Factory::phoneNumberExists($phone) && !User_Factory::passwordCheckByPhone($phone, $password)) {
		$errors[] = "Wrong password !";
	}


	/* Server login messages */
	if (!empty($errors)) {
			$ERROR_MESSAGES = error_msg($errors);
		} else {
			$username = User_Factory::getByPhoneNumber('username', $phone);
			$user_id = User_Factory::getByPhoneNumber('id', $phone);
			User_Factory::authenticate($username); //authenticating user
			User_Factory::recordUserLog($user_id); //recording user log
			$success[] = "Login Successful!";
			$SUCCESS_MESSAGES = success_msg($success);
			header("Location:welcome.php");
			exit();
		}
}

?>