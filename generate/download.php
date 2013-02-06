<?php
/**
 * Description: This script will ZIP archive the user's temporary theme directory when the "Download" AJAX request is executed in Step #4.
 * Author: Tom Christian
 * Last Edited: 27th February 2012
 */
 

 
// #1 Get post variables
$email = $_POST["email"];

 // Features Replacements: "Social Icons"
$iframe_css = null;
$file = file_get_contents('../temp/'.$email.'/index.html');
$find = array();
	$find[0] = '/(<!--iframe_css-->)(.*?)(<!--\/iframe_css-->)/i';
$replace = array();
	$replace[0] = "$1 $iframe_css $3";
$result = preg_replace($find, $replace, $file);
file_put_contents('../temp/'.$email.'/index.html',''.$result.'');
unlink('../temp/'.$email.'/css/iframe.css');

// #2 Create ZIP object
$zip = new ZipArchive();


$exists = file_exists('../temp/' . $email . '/MobileHTMLThemes-' . $email . '.zip');
$delete = '../temp/' . $email . '/MobileHTMLThemes-' . $email . '.zip';

if($exists) {
    unlink($delete);
}

if ($zip->open('../temp/' . $email . '/MobileHTMLThemes-' . $email . '.zip', ZIPARCHIVE::CREATE) !== TRUE) {
    die("Could not open archive");
}   

$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("../temp/$email/"));

foreach ($iterator as $key => $value) {
    $_key = str_replace("../temp/'.$email.'/", "", $key);
    $zip->addFile(realpath($key), $_key) or die("ERROR: Could not add file: $key");
}

$zip->close();

echo $email;

?>