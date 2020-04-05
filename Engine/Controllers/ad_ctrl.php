<?php
if (isset($_GET['id']) && Ad_Factory::existsById($_GET['id'])) {
	$ad = new Ad_Singleton($_GET['id']);
}


?>