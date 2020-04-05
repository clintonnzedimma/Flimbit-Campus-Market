<?php

/**
 * @author Clinton Nzedimma
 * First Things First (FTF).
 * This module contain all included classes and initializations
 * 
 */
ob_start();
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/');

/**
 	* Environment can be imported by including this below
 	* => $_SERVER['DOCUMENT_ROOT'].'/new_flimbit/engine/env/ftf.php'
*/

 
include ROOT.'/engine/env/db.php';
include ROOT.'/engine/procedures/init.php';
include ROOT.'/engine/procedures/errors.php';
include ROOT.'engine/network/route.php';

/*Plugins*/
include ROOT.'/engine/plugins/class/ebulksms.php';

/* Class Includes */
include ROOT.'/engine/class/admin.php';
include ROOT.'/engine/class/mail.php';
include ROOT.'/engine/class/sms.php';
include ROOT.'/engine/class/upload.php';
include ROOT.'/engine/class/abstract.pagination.php';
include ROOT.'/engine/class/school_factory.php';
include ROOT.'/engine/class/school_singleton.php';
include ROOT.'/engine/class/user_factory.php';
include ROOT.'/engine/class/user_singleton.php';
include ROOT.'/engine/class/ad_factory.php';
include ROOT.'/engine/class/ad_singleton.php';
include ROOT.'/engine/class/api.php';





/* Initialization */
if(User_Factory::isLoggedIn()){
	$u = new User_Singleton(User_Factory::getByUsername('id',$_SESSION['flimbit_username']));
}

?>