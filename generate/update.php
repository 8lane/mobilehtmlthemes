<?php	
/**
 * Description: This script is called during the customisation step in order to dynamically edit the HTML & CSS within the user's unique temp folder.
 * Author: Tom Christian
 * Last Edited: 27th February 2012
 */
 
include('../plugins/simplehtmldom/simple_html_dom.php');

$user 			= 	$_POST["user"];

$title 			= 	$_POST["title"];
$titleColor 	= 	$_POST["titleColor"];

$subTitle 		= 	$_POST["subTitle"];
$subTitleColor	= 	$_POST["subTitleColor"];

$font 			= 	$_POST["font"];
$fontSize		= 	$_POST["fontSize"];

$bgColor 		= 	$_POST["bg"];
$patternTitle 	= 	$_POST["patternTitle"];
$bgOpacity 		= 	$_POST["bgOpacity"];

if (!empty($patternTitle)) {
	$patternPath = 'background-image:  url(../images/patterns/'.$patternTitle.'.png);';	
} else {
	$patternPath = '';	
}



/////////////// HTML REPLACEMENTS ///////////////
$html = file_get_html('../temp/'.$user.'/index.html');
	$html->find('h1[id=jqm-logo]', 0)->innertext = $title;
	$html->find('p[class=copy]', 0)->innertext = '&copy; '.$title.'';
	$html->find('title', 0)->innertext = ''.$title.' - '.$subTitle.'';
	$html->find('p[class=t1Desc]', 0)->innertext = $subTitle;
file_put_contents('../temp/'.$user.'/index.html',''.$html.'');

$html = file_get_html('../temp/'.$user.'/about.html');
	$html->find('p[class=copy]', 0)->innertext = '&copy; '.$title.'';
file_put_contents('../temp/'.$user.'/about.html',''.$html.'');

$html = file_get_html('../temp/'.$user.'/contact.html');
	$html->find('p[class=copy]', 0)->innertext = '&copy; '.$title.'';
file_put_contents('../temp/'.$user.'/contact.html',''.$html.'');

$html = file_get_html('../temp/'.$user.'/gallery.html');
	$html->find('p[class=copy]', 0)->innertext = '&copy; '.$title.'';
file_put_contents('../temp/'.$user.'/gallery.html',''.$html.'');


/////////////// CSS REPLACEMENTS ///////////////
$stylesheet = file_get_contents('../temp/'.$user.'/css/mobile.css');
$find = array();
	$find[0] = "/(\/\*bgColor\*\/).*?(\/\*\/bgColor\*\/)/i";
	$find[1] = "/(\/\*titleColor\*\/).*?(\/\*\/titleColor\*\/)/i";
	$find[2] = "/(\/\*subTitleColor\*\/).*?(\/\*\/subTitleColor\*\/)/i";
	$find[3] = "/(\/\*font\*\/).*?(\/\*\/font\*\/)/i";
	$find[4] = "/(\/\*fontSize\*\/).*?(\/\*\/fontSize\*\/)/i";
	$find[5] = "/(\/\*patternTitle\*\/).*?(\/\*\/patternTitle\*\/)/i";
	$find[6] = "/(\/\*bgOpacity\*\/).*?(\/\*\/bgOpacity\*\/)/i";
$replace = array();
	$replace[0] = "\\1 background-color: $bgColor; \\2";
	$replace[1] = "\\1 color: $titleColor; \\2";
	$replace[2] = "\\1 color: $subTitleColor; \\2";
	$replace[3] = "\\1 font-family: $font; \\2";
	$replace[4] = "\\1 font-size: $fontSize; \\2";
	$replace[5] = "\\1 $patternPath \\2";
	$replace[6] = "\\1 $bgOpacity \\2";
$result = preg_replace($find, $replace, $stylesheet);
file_put_contents('../temp/'.$user.'/css/mobile.css',''.$result.'');

?>