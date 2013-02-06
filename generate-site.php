<?php 
	require_once('generate/config.php');
	
	// Make sure nobody trys to access generate-site.php without the correct GET parameters
	if (!$_GET) { header('Location: '.BASE_PATH.'/index.php'); }
	if (empty($_GET['user']) || empty($_GET['website'])) { header('Location: '.BASE_PATH.'/index.php'); }

	// Grab GET variables
	$user = $_GET["user"];
	$website = $_GET["website"];

	// Strip the website var of http:// and www.
	$toSearch = array("www.","http://");
	$websiteClean = str_replace($toSearch, "", $website);
  
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Mobile HTML Themes</title>
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
	<script type="text/javascript" src="js/generator/ajax.js"></script>

	<!-- Plugin JS -->
	<script type="text/javascript" src="js/wizard/jquery.hashchange.min.js"></script>
	<script type="text/javascript" src="js/wizard/jquery.easytabs.min.js"></script>
	<script type="text/javascript" src="js/generator/plugins/farbtastic.js"></script>
	<script type="text/javascript" src="js/generator/farbtastic.js"></script>
    <script type="text/javascript" src="plugins/cleditor/jquery.cleditor.js"></script>
    <link rel="Stylesheet" type="text/css" href="plugins/cleditor/jquery.cleditor.css" />

	<!-- Plugins -->
	<script type="text/javascript" src="js/random/jquery.qrcode.min.js"></script>
	<script type="text/javascript" src="plugins/tipTip/jquery.tipTip.minified.js"></script>
	<link rel="stylesheet" href="plugins/tipTip/tipTip.css" media="screen" />
	
	<script type="text/javascript">


	
	jQuery(document).ready(function($) {

		$('#tab-buttons-container')
		.easytabs({
			transitionIn: 'fadeIn',
			transitionOut: 'fadeOut',
		});
	
		$(".toolTip").tipTip({maxWidth: "280px", edgeOffset: 10, defaultPosition: "right"});
		$(".toolTipTop").tipTip({maxWidth: "180px", edgeOffset: 5, defaultPosition: "top"});	
	
		$('#qrcode').qrcode({width: 88,height: 88,text: "<?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?>"});
		
	});
	
	
	</script>
	
</head>
<body>
<div id="container" class="clearfix">
	<div class="mainWidth">
		<div id="header">
			<h1><a href="<?php echo ''.BASE_PATH.''; ?>/"><span>Mobile Website Generator</span></a></h1>
			<ul id="nav">
				<li class="active"><a href="<?php echo ''.BASE_PATH.''; ?>/">Home</a></li>
				<li><a href="#" class="popAbout">About</a></li>
				<!--<li><a href="<?php //echo ''.BASE_PATH.''; ?>/help">Help & Support</a></li>
				<li><a href="<?php //echo ''.BASE_PATH.''; ?>/contact">Contact</a></li>-->
			</ul>
		</div>		
		<div id="content">			
			<form id="generate" method="post" class="bbq clearfix">
				<div id="tab-buttons-container" class='tab-container'>
					<ul id="secondaryNav" class='etabs breadcrumb'>
						<li class='tab'><a href="#step1"><span>1. Choose a Theme</span></a></li>
						<li class='tab'><a href="#step2"><span>2. Customise Theme</span></a></li>
						<li class='tab'><a href="#step3"><span>3. Add Extras</span></a></li>
						<li class='tab'><a href="#step4"><span>4. Review &amp; Download</span></a></li>
					</ul>

					<div class="liveDemoHandInside">
						<div class="liveDemoFrame">	
						<?php
						$exists = file_exists('temp/' .$user. '/index.html');
						if(!$exists) {
							echo '<p id="loading">Please select a theme...</p>';
						} else {
							echo '<iframe id="previewFrame" src="temp/' . $user . '/" width="100%" height="373" scrolling="yes"><p>Your browser does not support iframes.</p></iframe>';
						}
						?>	
						</div>
					</div>		

					<div class='panel-container'>
						<div id="step1" class="step step1">
							<h3 class="title">Choose theme</h3>
							<p class="desc">Browse our selection of pre-made themes below. Choose one that you like and then continue to the customisation step!</p>
							<div class="row clearfix">
								<div class="theme postThumb" id="0" title="theme1">
									<div class="cover">
										<div class="livePreview"><span>Select Theme &rarr;</span></div>
									</div>
									<a href="#"><img src="images/themes/theme-overlay.jpg" alt="theme" width="164" height="98" /></a>
									<label for="theme1">Theme #1</label><input class="themeRadio" name="theme" value="theme1" id="theme1" type="radio" checked />
								</div>				
							</div>
							<div class="nextStep clearfix">
								<div class="button">
									<a href="#step2" class="next navigation_button"><span class="generate">Next Step</span><span class="desc">Step 2 - Customise Theme</span></a>
								</div>
							</div>				
							<span class="backToHome"><a href="index.php">&larr; Back to homepage</a></span>
						</div><!-- /step1 -->

						<div id="step2" class="step step2">
							<h3 class="title">Customise theme</h3>
							<p class="desc">Personalise your theme by changing the logo, text colours, fonts, background colour and image.</p>

							<div class="innerItems clearfix">
								<div class="item clearfix">
									<label for="title">Title:</label>
									<span class="editColor input-class mgTitleColor toolTip" title="Choose Text Colour"><img src="images/colorPickerBrush.png" alt="change color" /></span>
									<span class="picker toolTip" title="Tip: Click and drag with your mouse!" id="picker-mgTitleColor"></span>
									<input class="input-class hide mgTitleColor focus" type="text" id="titleColor" name="titleColor" value="" />
									<input type="text" class="focus" id="title" name="title" value="My Site" />
								</div>
								<div class="item seperator clearfix">
									<label for="subTitle">Subtitle:</label>
									<span class="editColor input-class mgSubTitleColor focus toolTip" title="Choose Text Colour"><img src="images/colorPickerBrush.png" alt="change color" /></span>
									<span class="picker toolTip" title="Tip: Click and drag with your mouse!" id="picker-mgSubTitleColor"></span>
									<input class="input-class hide mgSubTitleColor" type="text" id="subTitleColor" name="subTitleColor" value="" />
									<input type="text" class="focus" id="subTitle" name="subTitle" value="My Awesome Slogan" />
								</div>
								<div class="item seperator clearfix">
									<label>Font:</label>	
									<div class="selectContainer">
										<div class="menuWrap font">
											<div id="mgFont" class="currentPage toolTipTop" title="Choose Font">Trebuchet MS<span class="dd-arrow"></span></div>
											<div class="currentMenu">
												<ul>
													<li class="arial">Arial</li>
													<li class="helvetica">Helvetica</li>
													<li class="droid_sans">Droid Sans</li>
													<li class="trebuchet_ms">Trebuchet MS</li>
													<li class="georgia">Georgia</li>
													<li class="droid_serif">Droid Serif</li>
												</ul>
											</div>
										</div>
										<div class="menuWrap fontSize">
											<div id="mgFontSize" class="currentPage toolTipTop" title="Choose Font Size">12pt<span class="dd-arrow"></span></div>
											<div class="currentMenu">
												<ul>
													<li class="nine">9pt</li>
													<li class="ten">10pt</li>
													<li class="eleven">11pt</li>
													<li class="twelve">12pt</li>
													<li class="thirteen">13pt</li>
												</ul>
											</div>
										</div>	
									</div>
								</div><!-- /item -->					
								<div class="item clearfix relative bgColor">
									<label for="mgBgColor">Background Color:</label>									
									<input class="mgPatternTitle hide focus" type="text" id="patternTitle" name="patternTitle" value="pattern1" />
									<span class="editColor patternTitle toolTip" title="Choose Background Image"><img src="images/patternChooserImg.png" alt="change color" /></span>
									<div class="patternMenu">
										<ul>
											<li><a rel="" class="sprites" id="pattern0"></a></li>
											<li><a rel="pattern3" class="sprites" id="pattern3_png"></a></li>
											<li><a rel="pattern4" class="sprites" id="pattern4_png"></a></li>
											<li><a rel="pattern5" class="sprites" id="pattern5_png"></a></li>
											<li><a rel="pattern6" class="sprites" id="pattern6_png"></a></li>
											<li><a rel="pattern7" class="sprites" id="pattern7_png"></a></li>
											<li><a rel="pattern8" class="sprites" id="pattern8_png"></a></li>
											<li><a rel="pattern9" class="sprites" id="pattern9_png"></a></li>
											<li><a rel="pattern10" class="sprites" id="pattern10_png"></a></li>
											<li><a rel="pattern11" class="sprites" id="pattern11_png"></a></li>
											<li><a rel="pattern12" class="sprites" id="pattern12_png"></a></li>
											<li><a rel="pattern13" class="sprites" id="pattern13_png"></a></li>
											<li><a rel="pattern14" class="sprites" id="pattern14_png"></a></li>
											<li><a rel="pattern15" class="sprites" id="pattern15_png"></a></li>
											<li><a rel="pattern16" class="sprites" id="pattern16_png"></a></li>
											<li><a rel="pattern17" class="sprites" id="pattern17_png"></a></li>
											<li><a rel="pattern18" class="sprites" id="pattern18_png"></a></li>
											<li><a rel="pattern19" class="sprites" id="pattern19_png"></a></li>
											<li><a rel="pattern20" class="sprites" id="pattern20_png"></a></li>
										</ul>
									</div>		
									<div class="menuWrap bgOpacity">
										<div id="mgBgOpacity" class="currentPage toolTipTop" title="Change Background Opacity">0.8<span class="dd-arrow"></span></div>
										<div class="currentMenu">
											<ul>
												<li>0.2</li>
												<li>0.4</li>
												<li>0.6</li>
												<li>0.8</li>
												<li>1</li>
											</ul>
										</div>
									</div>										
									<input class="input-class focus" type="text" id="mgBgColor" name="bg" value="#ffffff" />	
									<span class="picker toolTip" title="Tip: Click and drag with your mouse!" id="picker-mgBgColor"></span>								
								</div><!-- /item -->							
							</div><!-- /innerItem -->

							<div class="nextStep clearfix">
								<div class="button">
									<a href="#step3" class="next navigation_button finish_customisation reloadPreview"><span class="generate">Next Step</span><span class="desc">Step 3 - Add Extras</span></a>
								</div>
							</div>				
							<span class="backToHome"><a href="#step1">&larr; Back to Step 1</a></span>
						</div> <!-- /step2 -->

						<div id="step3" class="step step3">
							<h3 class="title">Add extras</h3>
							<p class="desc">Add further customisations to your mobile theme such as social media links or additional homepage content.</p>

							<div class="item seperator first clearfix">
								<label>Add Homepage Content<span>Add content to the homepage of your mobile site!</span></label>
								<div class="radioWrap">
									<label class="yes toolTipTop" title="Enable">
										<input class="homepageContent" name="homepageContent" type="radio" value="yes" alt="yes" />
									</label>
									<label class="no toolTipTop" title="Disable">
										<input class="homepageContent" name="homepageContent" type="radio" value="no" alt="no" checked />
									</label>
								</div>
							</div>
							<div class="extrasInner">
								<div class="item clearfix">
									    <textarea id="theContent" class="theContent" cols="50" rows="15"><p><h3>Test H3</h3>This is some sample text to test out the <b>WYSIWYG Control</b>.</p></textarea>										
								</div>	
							</div>	
							<div class="extrasOuter hide clearfix">			
								<a href="#" class="makeChanges">Make Changes</a>
								<span>Click "Make Changes" to update your site.</span>
							</div>			

							<div class="item seperator clearfix">
								<label>Social Media<span>Add links to Facebook and Twitter to your mobile site.</span></label>
								<div class="radioWrap">
									<label class="yes toolTipTop" title="Enable">
										<input class="addSocialIcons" name="addSocialIcons" type="radio" value="yes" alt="yes" />
									</label>
									<label class="no toolTipTop" title="Disable">
										<input class="addSocialIcons" name="addSocialIcons" type="radio" value="no" alt="no" checked />
									</label>
								</div>
							</div>
							<div class="extrasInner">
								<div class="item seperator clearfix">
									<label for="addSocialIconsFacebookUrl" class="socialIcon facebookIcon"></label>
									<div class="inputWrap">
										<label for="addSocialIconsFacebookUrl" class="url">URL:</label>
										<input id="addSocialIconsFacebookUrl" name="addSocialIconsFacebookUrl" class="toolTip http" title="Enter the URL to your Facebook profile" type="text" />
									</div>
								</div>					
								<div class="item seperator clearfix">
									<label for="addSocialIconsTwitterUrl" class="socialIcon twitterIcon"></label>
									<div class="inputWrap">
										<label for="addSocialIconsTwitterUrl" class="url">URL:</label>
										<input id="addSocialIconsTwitterUrl" name="addSocialIconsTwitterUrl" class="toolTip http" title="Enter the URL to your Twitter profile" type="text" />
									</div>
								</div>
								<div class="item seperator clearfix">
									<label for="addSocialIconsGoogleUrl" class="socialIcon googleIcon"></label>
									<div class="inputWrap">
										<label for="addSocialIconsGoogleUrl" class="url">URL:</label>
										<input id="addSocialIconsGoogleUrl" name="addSocialIconsGoogleUrl" class="toolTip http" title="Enter the URL to your Google+ profile" type="text" />
									</div>
								</div>							
							</div>
							<div class="extrasOuter hide clearfix">	
								<a href="#" class="makeChanges">Make Changes</a>
								<span>Click "Make Changes" to update your site.</span>
							</div>

							<div class="item seperator clearfix">
								<label>Remove Copyright<span>Remove the "Built by mobilehtmlthemes.com" line from the footer.</span></label>
								<div class="radioWrap">
									<label class="yes toolTipTop" title="Enable">
										<input class="removeCopy" name="removeCopy" type="radio" value="yes" alt="yes" />
									</label>
									<label class="no toolTipTop" title="Disable">
										<input class="removeCopy" name="removeCopy" type="radio" value="no" alt="no" checked />
									</label>
								</div>
							</div>
							<div class="item seperator clearfix">
								<label>Add Analytics Tracking Code<span>Paste in your Google Analytics tracking code.</span></label>
								<div class="radioWrap">
									<label class="yes toolTipTop" title="Enable">
										<input class="addTracking" name="addTracking" type="radio" value="yes" alt="yes" />
									</label>
									<label class="no toolTipTop" title="Disable">
										<input class="addTracking" name="addTracking" type="radio" value="no" alt="no" checked />
									</label>
								</div>
							</div>
							<div class="extrasInner">
								<div class="item clearfix">
									<label for="addTrackingPaste">Paste here:</label>
									<textarea id="addTrackingPaste" name="addTrackingPaste"></textarea>
								</div>
							</div>
							<div class="extrasOuter hide clearfix">		
								<a href="#" class="makeChanges">Make Changes</a>
								<span>Click "Make Changes" to update your site.</span>
							</div>
							<div class="nextStep clearfix">
								<div class="button">
									<a href="#step4" class="next navigation_button"><span class="generate">Next Step</span><span class="desc">Step 4 - Review &amp; Download</span></a>
								</div>
							</div>
										
							<span class="backToHome"><a href="#step2" class="back">&larr; Back to Step 2</a></span>			
							<a class="hide" id="step3Trigger">test</a>
						</div> <!-- /step3 -->

						<div id="step4" class="step step4">
							<h3 class="title">Review &amp; download</h3>
							<p class="desc">Checkout your theme in our preview on the left. Make sure it's perfect before downloading!</p>

							<div class="item seperator clearfix">
								<h3>Here's the URL to your site:</h3>
								<div id="qrcode"></div>
								<input class="yourUrl" target="_blank" value="<?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?>" />
								<p class="yourUrlDesc">This URL is temporary and maybe removed at any point. To avoid any losses, please download your site as soon as possible!</p>
							</div>

							<div class="item seperator clearfix">
								<h3>Setup Redirection:<span>Redirect your mobile users from your website to your mobile site.</span></h3>
								<div class="redirectWrap">
									<a id="redirectDefault" class="redirectOuter" href="#">
										<h4>Temporary URL</h4>
										<span><?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?></h4>
									</a>
									<a id="redirectCustom" class="redirectOuter" href="#">
										<h4>Custom URL</h4>
										<span>m.<?php echo $websiteClean;?></h4>
									</a>
									<div class="redirectDefaultInner redirectBox hide clearfix">
										<p class="message">As Mobile HTML Themes is currently in BETA we are not offering any form of permanent hosting. We highly recommend that you download your generated mobile site and upload it onto your own web hosting and use the "Custom URL" option above. Further advice on how to do that can be <a href="<?php echo ''.BASE_PATH.''; ?>/help#step6" target="_blank">found here</a>.</p>
										<div class="item defaultTop">
											<label for="tempSiteUrl">Temporary URL</label>
											<input type="text" id="tempSiteUrl" readonly="readonly" value="<?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?>"/>
										</div>
										<div class="item">
											<label for="setupDefaultSitePaste">Paste this into the &lt;head&gt; &lt;/head&gt; section of your website:</label>
											<textarea id="setupDefaultSitePaste" readonly="readonly">
<script type="text/javascript">
var redirectagent=navigator.userAgent.toLowerCase();var redirect_devices=["vnd.wap.xhtml+xml","sony","symbian","nokia","samsung","mobile","windows ce","epoc","opera mini","nitro","j2me","midp-","cldc-","netfront","mot","up.browser","up.link","audiovox","blackberry","ericsson","panasonic","philips","sanyo","sharp","sie-","portalmmm","blazer","avantgo","danger","palm","series60","palmsource","pocketpc","smartphone","rover","ipaq","au-mic","alcatel","ericy","vodafone","wap1","wap2","teleca","playstation","lge","lg-","iphone","android","htc","dream","webos","bolt","nintendo"];for(var i in redirect_devices){if(redirectagent.indexOf(redirect_devices[i])!=-1){location.replace("<?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?>")}}
</script>							
											</textarea>
										</div>						
									</div>
									<div class="redirectCustomInner redirectBox hide clearfix">
										<div class="item seperator">
											<label for="setupSiteUrl">Where will your mobile site be stored?</label>
											<input type="text" id="setupSiteUrl" value="m.<?php echo $websiteClean;?>" />
										</div>
										<div class="item">
											<label for="setupCustomSitePaste">Paste this into the &lt;head&gt; &lt;/head&gt; section of your website:</label>
											<textarea id="setupCustomSitePaste" readonly="readonly"></textarea>
										</div>
										<!--<span class="help">Unsure how to do this? Check out our <a href="<?php echo ''.BASE_PATH.''; ?>/help#step6">help & support page</a>.</span>-->
									</div>	
								</div><!-- /redirectWrap -->
							</div><!-- /item -->
							<div class="extrasInner">
								<div class="item clearfix">
									<label for="addTrackingPaste">Paste here:</label>
									<textarea id="addTrackingPaste" name="addTrackingPaste"></textarea>
								</div>
							</div>				
							<div class="item clearfix last">
								<h3>Share your site:</h3>
								<ul class="share">
									<li><a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?>&t=Check out my new Mobile Website created with MobileHTMLThemes.com - <?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?>" title="Click to share this on Facebook" class="socialIcon facebookIcon toolTipTop"></a></li>							
									<li><a target="_blank" href="http://twitter.com/home?status=Check out my new Mobile Website created with MobileHTMLThemes.com - <?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?>" title="Click to share this on Twitter" class="socialIcon twitterIcon toolTipTop"></a></li>
									<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo ''.BASE_PATH.''; ?>/temp/<?php echo $user; ?>" title="Click to share this on Google +" class="socialIcon googleIcon toolTipTop"></a></li>
								</ul>
							</div>				
							<div class="nextStep clearfix">
								<div id="downloadNow" class="button">
									<a href=""><span class="generate">Download Now</span><span class="desc">(.ZIP Format)</span></a>
								</div>
								<!--<span class="help">Need help with what to do next? Visit our <a href="<?php echo ''.BASE_PATH.''; ?>/help" target="_blank">help & support page</a>.</span>-->
							</div>	
						</div> <!-- /step4 -->						
						
					</div><!-- /panel-container -->
				</div><!-- /tab-buttons-container -->
		
				<div class="popUpAbout hide">
					<div class="close"></div>
					<div class="inner">
						<h3 id="go" class="title">About Mobile HTML Themes...</h3>
						<p class="desc">Mobile HTML Themes was created by <a target="_blank" href="http://tomchristian.co.uk">Tom Christian</a> for a final year University project. Follow me on <a target="_blank" href="http://twitter.com/tomchristian91">twitter &rarr;</a></p>
						<p><strong>Note:</strong> This site is a work in progress and I'd greatly appreciate it if you could report any issues to me via <a target="_blank" href="http://twitter.com/tomchristian91">twitter</a> or my <a target="_blank" href="http://tomchristian.co.uk">website</a>. I'm aiming to launch a BETA version within the next few weeks!</p>
					</div>
				</div>					
				
				
			</form><!-- /form -->
		</div><!-- /content -->
		
	</div><!-- /mainWidth -->
</div><!-- /container -->
<div id="footer">
	<div class="ftrLinksLeft">
		<ul>
			<li><a href="<?php echo ''.BASE_PATH.''; ?>/">Home</a></li>
			<li><a href="#" class="popAbout">About</a></li>
		</ul>
	</div>
	<div class="ftrBackToTop"><a href="#top" class="backToTop"></a></div>
	<div class="ftrLinksRight">
		<p><a href="http://tomchristian.co.uk">Mobile HTML Themes &copy; 2012</a></p>		
	</div>
</div>
<?php echo '<input id="userEmail" type="text" value="' .$user. '" />'; ?>
<?php echo '<input id="viewFullSite" class="hide" type="text" value="' .$website. '" />'; ?>
</body>
</html>