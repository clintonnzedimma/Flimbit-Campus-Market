<?php
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php';
User_Factory::logout();
header("Location:index.php?log_out");
exit();
?>