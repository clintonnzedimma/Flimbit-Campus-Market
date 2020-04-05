<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
Admin::protectPage();

if (isset($_POST['add'])) {
	$required_fields = array("acronym", "name", "state");
	/*errors*/
	if (!mandatory_fields($required_fields)) {
		$errors[] = "Please fill asterisked fields!";
	}


	if (!empty($errors)) {
		$ERROR_MESSAGES = error_msg($errors);
	} else{
		School_Factory::add();
		$SUCCESS_MESSAGES = "School added";
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Add Schools</title>
	<style>
	     body {
	     	margin: 0;
	     	padding: 0;
	     	background-color: lightblue;
	     }

		.form {
    margin-top: 10% !important;
    background-color: rgba(0, 0, 0, 0.7);
    width: 40%;
    height: 550px;
    border-radius: 4px;
    padding: 10px;
    margin:auto;
		}

		.form2 {
			padding-top: 20px;
		}

		.form2 input {
			width: 350px;
			height: 25px;
			border-radius: 2px;
			border: none;
			padding: 3px;
		}

		.form2 button {
			width: 55px;
		}
	</style>
</head>
<body>
<center class="form">
	<div style="color:white" align="center"><h3>ADD SCHOOL </h3></div>
	
	<?php if (isset($_POST['add']) && !empty($errors)): ?>
		<p style="color:red">
			<?php echo $ERROR_MESSAGES ?>
		</p>
	<?php endif ?>

	<?php if (isset($_POST['add']) && empty($errors)): ?>
		<p style="color:green">
			<?php echo $SUCCESS_MESSAGES ?>
		</p>
	<?php endif ?>

  <form class="form2" method="POST">
	Acronym*:<br>
	<input type="text" autocomplete="off"  name="acronym" placeholder="E.g FUPRE"><br><br>
	Name*:<br>
	<input type="text" autocomplete="off" name="name" placeholder="E.g Federal University of Petroleum Resources"><br><br>
	State*:<br>
	<input type="text" autocomplete="off" name="state" placeholder="E.g Delta"><br><br>
	Keywords:<br>
	<input type="text" autocomplete="off"  name="keywords" placeholder="E.g FUPRE"><br><br>
	Keyphrases:<br>
	<input type="text" autocomplete="off"  name="keyphrases" placeholder="E.g FUPRE"><br><br>	
	Hashtags:<br>
	<input type="text" autocomplete="off"  name="hashtags" placeholder="E.g FUPRE"><br><br>				
	<button type="submit" name="add">ADD</button>
  </form>
</center>
</body>
</html>