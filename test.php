<?php 
include $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'; 


$p1 = sanitize_note("fuck");
$p2 = password_hash("fuck", PASSWORD_DEFAULT);
if(password_verify($p1, $p2)) {
	/*echo "match";*/
}

$x = "07026231012";
$pw = "zxcvb";

if (User_Factory::passwordCheckByPhone($x,$pw)) {
	echo "true";
}

echo $p2 = password_hash("asdfg", PASSWORD_DEFAULT);

function test($a)
{
	return $a;
}

echo test($a="qwerty");

 ?>
