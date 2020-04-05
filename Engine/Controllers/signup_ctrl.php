<?php
/**
* @author Clinton Nzedimma
* Controller for signup.php
*/

/* Passing schools data as array */
$schools = School_Factory::listAssoc();

if (User_Factory::isLoggedIn()) {
	/* redirect somewhere safe */
	header("Location:welcome.php");
	exit();	
}

if (isset($_POST['sign-up'])) {
	# required fields
	$req_fields = array('username', 'full_name', 'password', 'confirm_password', 'phone', 'email', 'sex', 'school_id');

	# Actual data for user sign up
	$username = sanitize_note($_POST['username']);
	$full_name = sanitize_note($_POST['full_name']);
	$password = sanitize_note($_POST['password']);
	$confirm_password = sanitize_note($_POST['confirm_password']);
	$phone = sanitize_note(strip_whitespace($_POST['phone']));
	$email = sanitize_note($_POST['email']);
	$sex = sanitize_note($_POST['sex']);
	$school_id = sanitize_note($_POST['school_id']);

	/* Handling errors */
	if (!mandatory_fields($req_fields)) {
		$errors[] = "Please fill all fields !";
	}
	if (strlen($username) < 3) {
		$errors[] = "Your username should not be less than 3 characters ! ";
	}
	if (!sanitize_username($username)) {
		$errors[] = "Username should not contain space or special characters !";
	}	
	if (check_for_whitespace($username)) {
		$errors[] = "Your username should not contain any space ! ";
	}
	if (!strHasLettersOnly($full_name)) {
		$errors[] = "Your Full name should contain only letters [A-Za-z] !";
	}
	if (strlen($full_name)<3) {
		$errors[] = " Your full name should not be less than 3 characters !";
	}
	if (strlen($password) < 5) {
		$errors[] = " Your password should not be less than 5 characters !";
	}
	if (strlen($password) >= 5 && $password != $confirm_password) {
		$errors[] = "Your passwords do not match !";
	}
	if (!is_phone_number($phone)) {
		$errors[] = "Invalid phone number!";
	}
	if (strlen($phone) != 11 && is_phone_number($phone)) {
		$errors[] = "Your phone number should contain 11 digits !";
	}
	if (User_Factory::usernameExists($username)) {
		$errors[] = "Username <b> $username </b> already taken, choose another username !";
	}
	if (User_Factory::emailExists($email)) {
		$errors[] = "Email <b> $email </b> has aleady been used !";
	}
	if (!sanitize_email($email)) {
		$errors[] = "Invalid Email";
	}
	if (User_Factory::phoneNumberExists($phone)) {
		$errors[] = "This phone  <b> $phone </b> has already been used !";
	}
	if (!School_Factory::existsById($school_id)) {
		$errors[] = "Invalid input for school !";
	}
	if($sex != "male" && $sex != "female" && $sex!=null) {
		$errors[] = "Invalid Sex !";
	}
	if ($sex == null || $sex =="") {
		$errors[] = "Please select sex";	
	}

	/* Server sign up messages */
	if (!empty($errors)) {
			$ERROR_MESSAGES = error_msg($errors);
		} else {
			User_Factory::signUp($_POST);
			User_Factory::authenticate($username);
			$success[] = "You have signed up successfully !";
			$SUCCESS_MESSAGES = success_msg($success);
			header("Location:welcome.php");
			exit();
		}	
}

?>