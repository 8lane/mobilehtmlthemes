<?php	
/**
 * Description: This script is called during the customisation step in order to dynamically edit the HTML & CSS within the user's unique temp folder.
 * Author: Tom Christian
 * Last Edited: 27th February 2012
 */

$user 				= 	$_POST["user"];

$addSocialIcons 	=   $_POST["addSocialIcons"];
$facebookUrl 		= 	$_POST["facebookUrl"];
$twitterUrl 		= 	$_POST["twitterUrl"];
$googleUrl 			= 	$_POST["googleUrl"];

$removeCopy 		= 	$_POST["removeCopy"];

$homepageContent 	= 	$_POST["homepageContent"];
$theContent 		= 	$_POST["theContent"];

$addTracking 		= 	$_POST["addTracking"];
$addTrackingPaste 	= 	$_POST["addTrackingPaste"];



if ($addSocialIcons == 'yes' && !empty($facebookUrl)) {
	if (preg_match("/https?/", $facebookUrl) == 0) { $facebookUrl = 'http://'.$facebookUrl; } // Check to see if http:// is present. If not, add it!
	$facebookNavItem = '<li data-icon="star"><a rel="external" href="' . $facebookUrl . '">Facebook</a></li>';
} else {
	$facebookNavItem = '';
}

if ($addSocialIcons == 'yes' && !empty($twitterUrl)) {
	if (preg_match("/https?/", $twitterUrl) == 0) { $twitterUrl = 'http://'.$twitterUrl; } // Check to see if http:// is present. If not, add it!
	$twitterNavItem = '<li data-icon="star"><a rel="external" href="' . $twitterUrl . '">Twitter</a></li>';
} else {
	$twitterNavItem = '';
}

if ($addSocialIcons == 'yes' && !empty($googleUrl)) {
	if (preg_match("/https?/", $googleUrl) == 0) { $googleUrl = 'http://'.$googleUrl; } // Check to see if http:// is present. If not, add it!
	$googleNavItem = '<li data-icon="star"><a rel="external" href="' . $googleUrl . '">Google +</a></li>';
} else {
	$googleNavItem = '';
}

if ($removeCopy == 'yes') {
	$copyrightMht = '';
} else {
	$copyrightMht = '<p class="copy_mht"><a href="http://www.mobilehtmlthemes.com">Built by mobilehtmlthemes.com</a></p>';
}

if ($homepageContent == 'yes' && !empty($theContent)) {
	$userContent = '<section id="content" class="contentHomePage">' . $theContent . '</section>';
} else {
	$userContent = '<!-- -->';
}


if ($addTracking == 'yes' && !empty($addTrackingPaste)) {
	$tracking = '<script type="text/javascript">' . $addTrackingPaste . '</script>';
} else {
	$tracking = '';
}


	
// Features Replacements: "Social Icons"
$file = file_get_contents('../temp/'.$user.'/index.html');
$find = array();
	$find[0] = '/(<!--facebookUrl-->)(.*?)(<!--\/facebookUrl-->)/i';
	$find[1] = '/(<!--twitterUrl-->)(.*?)(<!--\/twitterUrl-->)/i';
	$find[2] = '/(<!--googleUrl-->)(.*?)(<!--\/googleUrl-->)/i';
	$find[3] = '/(<!--copyrightMht-->)(.*?)(<!--\/copyrightMht-->)/i';
	$find[4] = '/(<!--homepageContent-->)(.*?)(<!--\/homepageContent-->)/i';
	$find[5] = '/(<!--addTracking-->)(.*?)(<!--\/addTracking-->)/i';
$replace = array();
	$replace[0] = "$1 $facebookNavItem $3";
	$replace[1] = "$1 $twitterNavItem $3";
	$replace[2] = "$1 $googleNavItem $3";
	$replace[3] = "$1 $copyrightMht $3";
	$replace[4] = "$1 $userContent $3";
	$replace[5] = "$1 $tracking $3";
$result = preg_replace($find, $replace, $file);
file_put_contents('../temp/'.$user.'/index.html',''.$result.'');



$pageAbout = preg_replace('/(<!--copyrightMht-->)(.*?)(<!--\/copyrightMht-->)/i', "$1 $copyrightMht $3", file_get_contents('../temp/'.$user.'/about.html'));
file_put_contents('../temp/'.$user.'/about.html',''.$pageAbout.'');

$pageContact = preg_replace('/(<!--copyrightMht-->)(.*?)(<!--\/copyrightMht-->)/i', "$1 $copyrightMht $3", file_get_contents('../temp/'.$user.'/contact.html'));
file_put_contents('../temp/'.$user.'/contact.html',''.$pageContact.'');

$pageGallery = preg_replace('/(<!--copyrightMht-->)(.*?)(<!--\/copyrightMht-->)/i', "$1 $copyrightMht $3", file_get_contents('../temp/'.$user.'/gallery.html'));
file_put_contents('../temp/'.$user.'/gallery.html',''.$pageGallery.'');


?>