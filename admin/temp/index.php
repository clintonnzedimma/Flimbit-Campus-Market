<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
if (isset($_POST['login'])) {
	if (Admin::login()) {
		header("Location:home.php");
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN Login</title>
</head>
<body>
	<div class="admin-login">
		<form method="post">
			<label>Username</label>
			<input type="text" name="username" autocomplete="off">
			<br>
			<br>
			<label>Password</label>
			<input type="text" name="password">
			<br>
			<button type="submit" name="login">Login</button>
		</form>
	</div>

</body>
</html>