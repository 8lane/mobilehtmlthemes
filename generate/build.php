<?php
/**
 * Description: This script will build the user's unique directory with folder structure when requested.
 * Author: Tom Christian
 * Last Edited: 27th February 2012
 */
 
require_once('functions.php');
 
// #1 Get post variable
$email = $_POST["email"];
$website = $_POST["website"];

if ($_SERVER['SERVER_NAME'] == 'localhost') {

	$exists = file_exists('../temp/' . $email . '');
	if($exists) {
		header("HTTP/1.0 403 Forbidden");
	}
	
	if (!$exists) {
		createUserDirectory($email, $website);
	}
	
} else {

	// #2 Test to make sure the E-Mail is valid
	if (validate_email($email) == false) {
		header("HTTP/1.0 400 Bad Request");
	}

	// #3 Test to make sure the website URL is valid
	if(validate_website($website) === false) {
		header("HTTP/1.0 401 Unauthorized");
	}

	// #4 Test to make sure the directory doesn't already exist
	$exists = file_exists('../temp/' . $email . '');
	if($exists) {
		header("HTTP/1.0 403 Forbidden");
	}

	// #5 Checks all done! Let's go:
	if (validate_email($email) !== false && validate_website($website) !== false && !$exists) {
		createUserDirectory($email, $website);
	}
	
}

function createUserDirectory($email, $website) {
	define('TEMP_DIR', '../temp/');
	$subdirs = array('css','js','images','images/photoswipe','images/patterns');
	$version = '';
	
	/*if (file_exists(TEMP_DIR . $email)) {
		//$version = 0;
		//while (file_exists(TEMP_DIR . $email . (++$version))); // add an incremented value to the unique folder each time (keeping it here for reference).	
	}*/

	if (!file_exists(TEMP_DIR . $email)) { // If the folder structure doesn't exist already, create it.
		foreach ($subdirs as $dir) {
			mkdir(TEMP_DIR . $email . '/' . $dir, 0777, true);
		}
	}
	
	// Send back the unique user directory name in the AJAX success callback
	echo $email, $website;
}
?>