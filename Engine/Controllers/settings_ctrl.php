<?php
/**
* @author Clinton Nzedimma 
* @controller for settings.php
*/
User_Factory::protectPage();


if (isset($_POST['edit-profile'])) {
	$req_fields = array('full_name', 'email', 'sex');

	$full_name = sanitize_note($_POST['full_name']);
	$email = sanitize_note($_POST['email']);
	$sex = sanitize_note($_POST['sex']);

	/*errors*/
	if (!mandatory_fields($req_fields)) {
		$errors[] = "Please fill all fields !";
	}
	if (!strHasLettersOnly($full_name)) {
		$errors[] = "Your Full name should contain only letters [A-Za-z] !";
	}
	if (strlen($full_name)<3) {
		$errors[] = " Your full name should not be less than 3 characters !";
	}
	if (User_Factory::emailExists($email) && $email != $u->get('email')) {
		$errors[] = "Email <b> $email </b> has aleady been used !";
	}	
	if (!sanitize_email($email)) {
		$errors[] = "Invalid Email";
	}	
	if($sex != 'male' && $sex != 'female') {
		$errors[] = "Invalid Gender !";
	}


	/*modify profile*/
	if (!empty($errors)) {
		$ERROR_MESSAGES = error_msg($errors);
	} else {
		$SUCCESS_MESSAGES = "Changes Saved Successfully !";
		$u->modifyProfile($_POST);
	}
}


if (isset($_POST['upload-image'])) {
	$upload = new Upload('image', 'profilePicInput', 2.0);

	if ($upload->sizeIsLarge() && !$upload->hasError()) {
		$errors[] = "Please upload image below 2.0MB !";
	}
	if ($upload->hasError()) {
		$errors[] = "There is an error in the photo you uploaded !";
	}
	if (!$upload->isImage() && !$upload->isEmpty()) {
		$errors[] = "The file you uploaded is not an image !";
	}
	if ($upload->isEmpty()) {
		$errors[] = "No Image !";
	}

	/*upload image*/
	if (!empty($errors)) {
		$ERROR_MESSAGES = error_msg($errors);
	} else {
			$upload->pushImageTo("avatars");
			$u->changeDpData($upload->data['new_file_name']);
			$success[] = " Your profile photo changed successfully !";
			$SUCCESS_MESSAGES = success_msg($success);				
	}
	
}


if (isset($_POST['edit-password'])) {
	$req_fields = array('old_password','new_password', 'confirm_password');

	$old_password = sanitize_note($_REQUEST['old_password']);
	$new_password = sanitize_note($_REQUEST['new_password']);
	$confirm_password =  sanitize_note($_REQUEST['confirm_password']);

	if (!password_verify($old_password, $u->get('password'))) {
		$errors[] = "Wrong Password !";
	}
	if ($new_password == $old_password && password_verify($old_password, $u->get('password'))) {
		$errors[] = "You cannot use old password !";
	}
	if (strlen($new_password) >= 5 && $new_password != $confirm_password && password_verify($old_password, $u->get('password'))) {
		$errors[] = "Your passwords do not match !";
	}
	if (strlen($new_password)<5) {
		$errors[] = "Password must be 4 characters";
	}


	/* modify password */
	if (!empty($errors)) {
			$ERROR_MESSAGES = error_msg($errors);
		} else {
			$u->changePassword($new_password);
			$success[] = "Password changed Successfully !";
			$SUCCESS_MESSAGES = success_msg($success);		
		}	

}




?>