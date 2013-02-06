<?php 
	require_once('generate/config.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Mobile HTML Themes | Help &amp; Support</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-Equiv="Cache-Control" Content="no-cache" />
	<meta http-Equiv="Pragma" Content="no-cache" />
	<meta http-Equiv="Expires" Content="0" />	
	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="css/reset.css" media="screen" />
	<link rel="stylesheet" href="css/styles.css" media="screen" />

	<!-- Color Picker CSS -->
	<link rel="stylesheet" href="css/generator/farbtastic.css" type="text/css" />

	<!-- Core JS -->
	<script type="text/javascript" src="js/jquery.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>

	<!-- Plugin JS -->
	<script type="text/javascript" src="js/wizard/jquery.hashchange.min.js"></script>
	<script type="text/javascript" src="js/wizard/jquery.easytabs.min.js"></script>

	<!-- Plugins -->
	<script type="text/javascript" src="plugins/tipTip/jquery.tipTip.minified.js"></script>
	<link rel="stylesheet" href="plugins/tipTip/tipTip.css" media="screen" />
	
	<script type="text/javascript">


	
	$(document).ready(function($) {

		$('#helpTabsContainer')
		.easytabs({
			transitionIn: 'fadeIn',
			transitionOut: 'fadeOut',
		});
	
		$(".toolTip").tipTip({maxWidth: "280px", edgeOffset: 10, defaultPosition: "right"});
		$(".toolTipTop").tipTip({maxWidth: "180px", edgeOffset: 5, defaultPosition: "top"});	
	

	});
	
	
	</script>
	
</head>
<body>
<div id="container" class="clearfix">
	<div class="mainWidth">
		<div id="header">
			<h1><a href="<?php echo ''.BASE_PATH.''; ?>/"><span>Mobile Website Generator</span></a></h1>
			<ul id="nav">
				<li><a href="<?php echo ''.BASE_PATH.''; ?>/">Home</a></li>
				<li><a href="<?php echo ''.BASE_PATH.''; ?>/about">About</a></li>
				<li class="active"><a href="<?php echo ''.BASE_PATH.''; ?>/help">Help & Support</a></li>
				<li><a href="<?php echo ''.BASE_PATH.''; ?>/contact">Contact</a></li>
			</ul>			
		</div><!-- /header -->	
	</div><!-- /mainWidth -->
		
		<div id="content">	

<div id="helpTabsContainer">

	<ul class="helpTabs">
		<li><a href="#step1"><span>1. Introduction</span></a></li>
		<li><a href="#step2"><span>2. Getting started</span></a></li>
		<li><a href="#step3"><span>3. Choose a theme</span></a></li>
		<li><a href="#step4"><span>4. Customising a theme</span></a></li>
		<li><a href="#step5"><span>5. Installing your theme</span></a></li>
		<li><a href="#step6"><span>6. Setup redirection</span></a></li>
		<li><a href="#step7"><span>7. Advanced customisation</span></a></li>
		<li><a href="#step8"><span>8. License & TOS</span></a></li>
	</ul>
	
	<div class='helpPanels'>
		<div id="step1" class="step step1">	
			<h3>Introduction</h3>
			<p>This is the help and support page. This is the help and support page This is the help and support page This is the help and support page This is the help and support page This is the help and support page This is the help and support page This is the help and support page This is the help and support page</p>
		</div>
		<div id="step2" class="step step2">	
			<h3>Getting Started</h3>
			- go here etc<br />
			- valid e-mail and website<br />
			- click begin<br />
		</div>
		<div id="step3" class="step step3">	
			<h3>Choose a Theme</h3>
			- Step 1 - select a theme from the list<br />
		</div>
		<div id="step4" class="step step4">	
			<h3>Customising a Theme</h3>
			- Step 2 - custommising<br />
				- title & subtitle<br />
				- font colors / font / font size<br />
				- background color + bg pattern<br /><br />
			- Step 3 - Adding Extras<br />
				- Homepage content<br />
				- social media<br />
				- Copyright<br />
				- Analytics code<br />
		</div>
		<div id="step5" class="step step5">	
			<h3>Installing your Theme</h3>
			- step 4 - download -- unzip html files etc.<br />
			- connect via FTP + upload files to new directory or sub domain<br />
			- setup redirection<br />
		</div>
		<div id="step6" class="step step6">	
			<h3>Setup Redirection</h3>
			- add code snippet to the < head > section of your website. Users will automatically be redirected to your mobile theme.<br />
			- Users can get back to your site from the "return to full view" text in footer.<br />
		</div>	
		<div id="step7" class="step step7">	
			<h3>Advanced Customisation</h3>
			- Built on jquery mobile framework so all features of that are available!<br />
			- examples of type, grids, features...<br />
		</div>	
		<div id="step8" class="step step8">	
			<h3>License & TOS</h3>
			- copyrights<br />
			- do what you like with the generated mobile themes.<br />
			- attributions	<br />
		</div>			
	</div>

</div>		



		
		
		

		</div><!-- /content -->	

</div><!-- /container -->
	
<div id="footer">
	<div class="ftrLinksLeft">
		<ul>
			<li><a href="<?php echo ''.BASE_PATH.''; ?>/">Home</a></li>
			<li><a href="<?php echo ''.BASE_PATH.''; ?>/about">About</a></li>
			<li class="active"><a href="<?php echo ''.BASE_PATH.''; ?>/help">Help &amp; Support</a></li>
			<li><a href="<?php echo ''.BASE_PATH.''; ?>/contact">Contact</a></li>
		</ul>
	</div>
	<div class="ftrBackToTop"><a href="#top" class="backToTop"></a></div>
	<div class="ftrLinksRight">
		<p><a href="http://tomchristian.co.uk">Mobile Website Generator by Tom Christian</a></p>		
	</div>
</div>
</body>
</html>