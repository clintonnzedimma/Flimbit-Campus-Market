<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
Admin::protectPage();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit School</title>
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
    margin:auto;
    padding: 10px;
		}

		.form2 {
			padding-top: 20px;
		}

		.form2 input {
			width: 270px;
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
<?php if (isset($_GET['id']) && School_Factory::existsById($_GET['id'])): ?>
<?php 
$school = new School_Singleton($_GET['id']);

if (isset($_POST['edit'])) {
	$required_fields = array("acronym", "name", "state");
	/*errors*/
	if (!mandatory_fields($required_fields)) {
		$errors[] = "Please fill asterisked fields!";
	}


	if (!empty($errors)) {
		$ERROR_MESSAGES = error_msg($errors);
	} else{
		$school->modify();
		$SUCCESS_MESSAGES = "School Modified Successfully";
	}
	
}

 ?>	


<center class="form">
	<div style="color:white" align="center"><h3>EDIT SCHOOL </h3></div>
	
	<?php if (isset($_POST['edit']) && !empty($errors)): ?>
		<p style="color:red">
			<?php echo $ERROR_MESSAGES ?>
		</p>
	<?php endif ?>

	<?php if (isset($_POST['edit']) && empty($errors)): ?>
		<p style="color:green">
			<?php echo $SUCCESS_MESSAGES ?>
		</p>
	<?php endif ?>

  <form class="form2" method="POST">
	Acronym*:<br>
	<input type="text" autocomplete="off"  name="acronym" value="<?=$school->get('acronym')?>" placeholder="E.g FUPRE"><br><br>
	Name*:<br>
	<input type="text" autocomplete="off" name="name" value="<?=$school->get('name')?>"  placeholder="E.g Federal University of Petroleum Resources"><br><br>
	State*:<br>
	<input type="text" autocomplete="off" name="state" value="<?=$school->get('state')?>" placeholder="E.g Delta"><br><br>
	Keywords:<br>
	<input type="text" autocomplete="off"  name="keywords" value="<?=$school->get('keywords')?>" placeholder="E.g FUPRE"><br><br>
	Keyphrases:<br>
	<input type="text" autocomplete="off"  name="keyphrases" value="<?=$school->get('keyphrases')?>" placeholder="E.g FUPRE"><br><br>	
	Hashtags:<br>
	<input type="text" autocomplete="off"  name="hashtags" value="<?=$school->get('hashtags')?>" placeholder="E.g FUPRE"><br><br>				
	<button type="submit" name="edit">EDIT</button>
  </form>
</center>

<?php else: ?>
	<center>
		<h3 style="color: red">ERROR: INVALID ID OR SCHOOL DOES NOT EXIST </h3>
	</center>
<?php endif ?>



</body>
</html>