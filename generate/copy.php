<?php
/**
 * Description: This script will copy the necessary theme files from the theme store into the user's unique temp directory upon each theme selection during Step #1.
 * Author: Tom Christian
 * Last Edited: 27th February 2012
 */
 
// #1 Get post variables
$email = $_POST["email"];
$theme = $_POST["theme"];
$fullSite = $_POST["viewFullSite"];

$source = "../themes/$theme/";
$destination = "../temp/$email/";

copy_directory($source, $destination);

function copy_directory( $source, $destination ) {
	if ( is_dir( $source ) ) {
		@mkdir( $destination );
		$directory = dir( $source );
		while ( FALSE !== ( $readdirectory = $directory->read() ) ) {
			if ( $readdirectory == '.' || $readdirectory == '..' ) {
				continue;
			}
			$PathDir = $source . '/' . $readdirectory; 
			if ( is_dir( $PathDir ) ) {
				copy_directory( $PathDir, $destination . '/' . $readdirectory );
				continue;
			}
			copy( $PathDir, $destination . '/' . $readdirectory );
		}
 
		$directory->close();
	} else {
		copy( $source, $destination );
	}
}

$viewFullSite = '<p class="full_v"><a href=" ' . $fullSite . ' ">View Full Site &rarr;</a></p>';
$contactEmail = '$recipient = "'.$email.'"';

$file = file_get_contents('../temp/'.$email.'/index.html');
$find = array();
	$find[0] = '/(<!--viewFullSite-->)(.*?)(<!--\/viewFullSite-->)/i';
$replace = array();
	$replace[0] = "$1 $viewFullSite $3";
$result = preg_replace($find, $replace, $file);
file_put_contents('../temp/'.$email.'/index.html',''.$result.'');

$pageAbout = preg_replace('/(<!--viewFullSite-->)(.*?)(<!--\/viewFullSite-->)/i', "$1 $viewFullSite $3", file_get_contents('../temp/'.$email.'/about.html'));
file_put_contents('../temp/'.$email.'/about.html',''.$pageAbout.'');

$pageContact = preg_replace('/(<!--viewFullSite-->)(.*?)(<!--\/viewFullSite-->)/i', "$1 $viewFullSite $3", file_get_contents('../temp/'.$email.'/contact.html'));
file_put_contents('../temp/'.$email.'/contact.html',''.$pageContact.'');

$pageGallery = preg_replace('/(<!--viewFullSite-->)(.*?)(<!--\/viewFullSite-->)/i', "$1 $viewFullSite $3", file_get_contents('../temp/'.$email.'/gallery.html'));
file_put_contents('../temp/'.$email.'/gallery.html',''.$pageGallery.'');

$scriptContact = preg_replace("/(\/\*contactEmail\*\/).*?(\/\*\/contactEmail\*\/)/i", "\\1 $contactEmail; \\2", file_get_contents('../temp/'.$email.'/contact_php.php'));
file_put_contents('../temp/'.$email.'/contact_php.php',''.$scriptContact.'');


// Send back the unique user directory name in the AJAX success callback
echo $email;

?>