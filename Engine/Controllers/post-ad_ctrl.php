<?php
/**
* @author Clinton Nzedimma 
* @controller for post-ad.php
*/
User_Factory::protectPage();

$categories = array(
	"electronics" => "electronics",
	"fashion" => "fashion",
	"services" => "services",
	"phones" => "phones", 
	"food" => "food",
	"books & school items" => "books-school-items",
	"sport, hobbies & art" => "sport-hobbies-art"		
); 

if (isset($_POST['post-ad'])) {
	$req_fields = array('category', 'title', 'description', 'price', 'placement_img');
	$category = sanitize_note($_POST['category']);
	$title =  sanitize_note($_POST['title']);
	$description =  sanitize_note($_POST['description']);
	$price = intval($_POST['price']);
	$negotiable = sanitize_note($_POST['negotiable']);
	$upload = new Upload("image","placement_img", 2);

	/*errors*/
	if (!mandatory_fields($req_fields)) {
		$errors[] = "Please fill all required fields";
	}
	if (strlen($title) > 50) {
		$errors[]='The title should not exceed 50 characters !';
	}
	if (strlen($title) < 10) {
		$errors[]='The title should not be less than 10 characters !';
	}
	if (strlen($description) > 160){
		$errors[]='The description should not exceed 160 characters';
	}	
	if (strlen($description) < 10){
		$errors[]='The description should not be less than 10 characters !';
	}	
	if (!in_array($category, $categories)) {
		$errors[] = 'Invalid category !';
	}
	if(!is_int($price)){
		$errors[]='Your price should be a number !';
	}						
	if ($price < 10 && is_int($price)){
		$errors[]='The miniumum price allowed is  &#8358;10  !';
	}	
	if ($price > 10000000){
		$errors[]='The maximum price allowed is &#8358;10,000,000 !';
	}
	if ($upload->sizeIsLarge() && !$upload->hasError()) {
		$errors[] = "Please upload image below 4.0MB !";
	}
	if ($upload->hasError() && !$upload->isEmpty()) {
		$errors[] = "There is an error in the photo you uploaded !";
	}
	if (!$upload->isImage() && !$upload->isEmpty()) {
		$errors[] = "The file you uploaded is not an image !";
	}
	if ($upload->isEmpty()) {
		$errors[] = "No Image !";
	}


	/*post ad*/
	if (!empty($errors)) {
			$ERROR_MESSAGES = error_msg($errors);
		} else {
			Ad_Factory::createNew($_POST,$u->get('id'), $u->get('school_id'),$upload);
			$success[] = "AD Posted Successfully !";
			$SUCCESS_MESSAGES = success_msg($success);		
		}



}



?>