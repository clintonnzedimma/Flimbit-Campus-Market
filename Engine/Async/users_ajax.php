<?php
/**
* @author Clinton Nzedimma
* AJAX script for users 
*/
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';


/* checking data */
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'check' ) {
	$ajax_response = false;

	if (isset($_REQUEST['username'])) {
		$username =  sanitize_note($_REQUEST['username']);

		/* If username exists*/
		if (User_Factory::usernameExists($username)) {
			$ajax_response = true;
		}
	}


	if (isset($_REQUEST['email'])) {
		$email = sanitize_note($_REQUEST['email']);

		/* If email exists */
		if (User_Factory::emailExists($email)) {
			$ajax_response = true;
		}
	}

	if (isset($_REQUEST['phone'])) {
		$phone = sanitize_note($_REQUEST['phone']);

		/* If phone number exists */
		if (User_Factory::phoneNumberExists($phone)) {
			$ajax_response = true;
		}
	}
	echo $ajax_response;
}


?>