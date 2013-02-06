<?php 
	require_once('generate/config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Mobile HTML Themes</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	
	<!-- Core CSS -->
	<link rel="stylesheet" href="css/reset.css" media="screen" />
	<link rel="stylesheet" href="css/styles.css" media="screen" />
	
	<!-- Core JS -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/generator/ajax.js"></script>
	
	<!-- Plugins -->
	<script type="text/javascript" src="plugins/tipTip/jquery.tipTip.minified.js"></script>
	<link rel="stylesheet" href="plugins/tipTip/tipTip.css" media="screen" />
	
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".toolTip").tipTip({maxWidth: "280px", edgeOffset: 10, defaultPosition: "right"});
		$(".toolTipTop").tipTip({maxWidth: "280px", edgeOffset: 10, defaultPosition: "top"});		
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
			</ul>			
		</div><!-- /header -->	
	</div>
	<div class="feature">
		<div class="featureBanner"></div>
		<div class="featureBannerHover">
			<div class="buttonWrap">
				<a href="#features">Features <span class="icon"></span></a>
				<a href="#" class="pop">Generate Now! <span class="icon"></span></a>		
			</div>
		</div>
	</div>
	<div class="featureMob">
		<div class="mainWidth">
			<div class="messageWrap">
				<p class="message">
					Mobile HTML Themes offers a simple and free service that allows you to build your very own mobile website, whether you're a business owner with no coding experience or a professional web designer.
				</p>
				<img src="images/featureDevice.jpg" alt="Compatible devices" title="Compatible with all modern smart phones!" class="toolTipTop deviceList" />
			</div>	
		</div>
	</div>
	<div class="introBox mainWidth">	
		<div class="messageWrap">
			<p class="message">
				Mobile HTML Themes offers a simple and free service that allows you to build your very own mobile website, whether you're a business owner with no coding experience or a professional web designer.
			</p>
			<img src="images/featureDevice.jpg" alt="Compatible devices" title="Compatible with all modern smart phones!" class="toolTipTop deviceList" />
		</div>	
	</div>
	<div class="cta">
		<a href="#" class="pop">Create your Mobile Site</a>
	</div>	
	<div class="mainWidth">	
		<div id="content" class="clearfix">		
			<form id="generateStart" method="post" class="homePage bbq clearfix">
				<div id="step1-customise-theme" class="step step1">
					<div id="innerContent">	
						<h2 id="features">Main Features</h2>
						<p>A few of our key features are listed below. Discover the full power of our generator by <a href="#" class="pop">creating a theme.</a></p>					
						<ul class="features">
							<li>
								<span class="featureSprite s1"></span>
								<h4>Create Unlimited Mobile Sites</h4>
								<p>Create your own personalised mobile websites in four simple steps.</p>
							</li>
							<li>
								<span class="featureSprite s2"></span>
								<h4>Design Customisation</h4>
								<p>Customise the logo, background image, fonts & colours.</p>
							</li>
							<li>
								<span class="featureSprite s3"></span>
								<h4>Integrate Social Media</h4>
								<p>Effortlessly add social media icons to your mobile site.</p>
							</li>
							<li>
								<span class="featureSprite s4"></span>
								<h4>Solid Framework</h4>
								<p>Built upon the tried & tested jQuery mobile framework.</p>
							</li>
							<li>
								<span class="featureSprite s5"></span>
								<h4>Device Compatibility</h4>
								<p>Compatible with more than 200 different types of mobile device.</p>
							</li>	
							<li>
								<span class="featureSprite s6"></span>
								<h4>Help &amp; Support</h4>
								<p>Thorough documentation, support and FAQ's.</p>
							</li>							
						</ul>
						<div id="innerBottom">
							<div class="liveDemo clearfix">
								<h3>Live Example</h3>
								<div class="ipadFrame demoPop" rel="theme1">
									<span class="ipadCover"></span>
									<img src="images/liveDemoImg.jpg" alt="View a Live Demo" />
								</div>
							</div>
							<div class="templates clearfix">
								<h3>Templates</h3>
								<ul>
									<li>
										<a href="#" class="demoPop" rel="theme1"><span class="template overlay" alt="View Overlay Theme Demo"></span></a>
										<h4>Overlay <span class="desc"><a href="#" class="demoPop" rel="theme1">View Live Demo &rarr;</a></span></h4>
									</li>
									<li>
										<a href="#" class="demoPop" rel="theme2"><span class="template wood" alt="View Wood Theme Demo"></span></a>
										<h4>Wood <span class="desc"><a href="#" class="demoPop" rel="theme2">View Live Demo &rarr;</a></span></h4>
									</li>							
								</ul>
							</div>
							<div class="generate clearfix">
								<h3>Generate</h3>
								<a href="#" class="pop">Create Your Mobile Site &rarr;</a>
							</div>						
						</div>							
					</div>

					<div class="popUp">
						<div class="close"></div>
						<div class="inner">
							<h3 id="go" class="title">Let's Begin...</h3>
							<p class="desc">Enter your e-mail address and website URL below and click "Begin". You'll then shortly be able to start choosing &amp; customising mobile themes.</p>							
							<div class="fieldWrap email clearfix">
								<label for="email">Email:</label>
								<span class="inputOuter">
									<input title="Please enter a valid E-Mail address. We use this as the name of your personal site directory!" class="focus toolTip" type="text" id="email" name="email" value="" />
								</span>
							</div>
							<div class="fieldWrap website clearfix">
								<label for="website">Website URL:</label>
								<span class="inputOuter">
									<input title="Please enter the URL to your website. This is used within your mobile theme!" class="focus toolTip http" type="text" id="website" name="website" value="" />
								</span>
							</div>		
							<div class="nextStep buildSite clearfix">
								<div class="button">
									<a href="#"><span class="generate">Begin</span><span class="desc">Continue to Step 1 &rarr;</span></a>
								</div>
							</div>	
						</div>
					</div>

					<div class="demoPopUp hide">
						<div class="close"></div>
						<div class="inner">
							<div class="liveDemoHandInside">
								<div class="liveDemoFrame">
								</div>
							</div>							
						</div>
					</div>

					<div class="popUpAbout hide">
						<div class="close"></div>
						<div class="inner">
							<h3 id="go" class="title">About Mobile HTML Themes...</h3>
							<p class="desc">Mobile HTML Themes was created by <a target="_blank" href="http://tomchristian.co.uk">Tom Christian</a> for a final year University project. Follow me on <a target="_blank" href="http://twitter.com/tomchristian91">twitter &rarr;</a></p>

							<p><strong>Note:</strong> This site is a work in progress and I'd greatly appreciate it if you could report any issues to me via <a target="_blank" href="http://twitter.com/tomchristian91">twitter</a> or my <a target="_blank" href="http://tomchristian.co.uk">website</a>. I'm aiming to launch a BETA version within the next few weeks!</p>

						</div>
					</div>					
					
				</div><!-- /step1 -->
			</form><!-- /form -->
			
			<p id="data"></p>
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
<?php
if ($_SERVER['SERVER_NAME'] !== 'localhost') {

	echo "<script type=\"text/javascript\">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-5286206-4']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>";
}?>
</body>
</html>