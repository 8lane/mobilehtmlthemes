jQuery(document).ready(function($) {

	/////////////////////////////////////////////////////////////////////////
	// INDEX.PHP BUILD USER DIRECTORY + VALIDATION
	/////////////////////////////////////////////////////////////////////////	
	
	// Submit our form via AJAX and once our PHP file has processed, return the results in a nice modal popup =D
	$(".buildSite").click(function() {

		// Fade in the dark background
		$('.popUp .inner').hide();
		$('.popUp').addClass('emptyInner').append('<div class="ajaxLoad"></div>');
		
		setTimeout(function() { 
		
			var email = $('#email').val();
			var website = $('#website').val();
			
			$.ajax({
			   type: "POST",
			   url: 'generate/build.php',
			   cache: false,
			   data: "&email="+ email + "&website="+ website,
				success : function(data) {
					 if(data && data != "ERROR!!!") {
						 window.location.href="generate-site.php?user="+email+"&website="+website+""; // Redirect to publish.php and remove any spaces from the URL (bug fix).
					 }
				},
				error: function(jqXHR, textStatus, errorThrown) {
				
					$('.ajaxLoad').fadeOut().remove();
					$('.popUp .inner').fadeIn();
				
					if (errorThrown === 'Forbidden') {
						$('.errorResponse').remove();
						$('#email').addClass('errorBorder');
						$('.email').append('<div class="errorResponse">This user directory is already taken! Please try another.</div>');
					}
					if (errorThrown === 'Bad Request') {
						$('.errorResponse').remove();
						$('#email').addClass('errorBorder');
						$('.email').append('<div class="errorResponse">The E-Mail address entered is not valid. Please try another.</div>');
					}								
					if (errorThrown === 'Unauthorized') {
						$('.errorResponse').remove();
						$('#website').addClass('errorBorder');
						$('.website').append('<div class="errorResponse">The website URL entered is not valid. Please try another.</div>');
					}				
				}			   
			});
		}, 1000);
		return false; // avoid to execute the actual submit of the form.
	});


	/////////////////////////////////////////////////////////////////////////
	// COPY THEME FILES TO USER DIRECTORY UPON THEME SELECTION IN STEP #1
	/////////////////////////////////////////////////////////////////////////	
	$(".theme").click(function() {	
	
		var theme = $(this).attr("title");
		var userEmail = $('#userEmail').val();
		var viewFullSite = $('#viewFullSite').val();
		
		$.ajax({
			   type: "POST",
			   url: 'generate/copy.php',
			   cache: false,
			   data: "&email="+ userEmail + "&theme="+ theme + "&viewFullSite="+ viewFullSite,
			   success: function(data)
			   {
					var frameHtml = '<iframe id="previewFrame" src="temp/' + userEmail + '?random=' + Math.floor(Math.random()*9999999999) + '" width="100%" height="373" scrolling="yes"><p>Your browser does not support iframes.</p></iframe>'; // Create the new iFrame
					var liveDemoFrame = $('.liveDemoFrame'); 
					var previewFrame = $('#previewFrame');
					
					previewFrame.remove();
					
					liveDemoFrame.append(frameHtml);
					$('#loading').remove();
					liveDemoFrame.append('<div class="customiseThemeSpinnerWrap"><div class="customiseThemeSpinnerIcon"></div></div>');

					setTimeout(function() { 
						$('.customiseThemeSpinnerWrap').remove();
						$('#previewFrame').fadeIn();
					}, 1000);
			   }
			 });

		return false;
	});
	
	
	/////////////////////////////////////////////////////////////////////////
	// UPDATE LIVE PREVIEW UPON INPUT BLUR
	/////////////////////////////////////////////////////////////////////////		
	$(".reloadPreview").click(function() {
	
		myTimeout = setTimeout(function() {
		
			var user = $("#userEmail").val();			
			var title = $("#title").val();
			var titleColor = $("#titleColor").val();			
			var subTitle = $("#subTitle").val();
			var subTitleColor = $("#subTitleColor").val();
			var font = $("#mgFont").text();
			var fontSize = $("#mgFontSize").text();			
			var bg = $("#mgBgColor").val();
			var patternTitle = $("#patternTitle").val();
			var bgOpacity = $("#mgBgOpacity").text();
			
			$.ajax({
				   type: "POST",
				   url: 'generate/update.php',
				   cache: false,
				   data: "user="+ user +"&title="+ title +"&titleColor="+ titleColor +"&subTitle="+ subTitle +"&subTitleColor="+ subTitleColor+"&font="+ font+"&fontSize="+ fontSize+"&bg="+ bg+"&patternTitle="+ patternTitle+"&bgOpacity="+bgOpacity,
				   success: function()
				   {
						var frameHtml = '<iframe id="previewFrame" src="temp/' + user + '?random=' + Math.floor(Math.random()*9999999999) + '" width="100%" height="373" scrolling="yes"><p>Your browser does not support iframes.</p></iframe>'; // Create the new iFrame
						var liveDemoFrame = $('.liveDemoFrame'); 
						var previewFrame = $('#previewFrame');
						
						previewFrame.remove();
						liveDemoFrame.append(frameHtml);				
						liveDemoFrame.append('<div class="customiseThemeSpinnerWrap"><div class="customiseThemeSpinnerIcon"></div></div>');

						setTimeout(function() { 
							//$('#loading').remove();
							$('.customiseThemeSpinnerWrap').remove();
							$('#previewFrame').fadeIn();
						}, 1000);
				   }
			});
		});
		
	});
	
	
	/////////////////////////////////////////////////////////////////////////
	// UPDATE LIVE PREVIEW UPON INPUT BLUR
	/////////////////////////////////////////////////////////////////////////		
	$(".step3 .makeChanges, #step3Trigger").click(function() {
	
		myTimeout = setTimeout(function() {
		
			var user = $("#userEmail").val();			
			var addSocialIcons = $('input:radio[name=addSocialIcons]:checked').val();
			var facebookUrl = $("#addSocialIconsFacebookUrl").val();
			var twitterUrl = $("#addSocialIconsTwitterUrl").val();
			var googleUrl = $("#addSocialIconsGoogleUrl").val();
			var removeCopy = $('input:radio[name=removeCopy]:checked').val();
			var homepageContent = $('input:radio[name=homepageContent]:checked').val();
			var theContent = $("#theContent").val();			
			var addTracking = $('input:radio[name=addTracking]:checked').val();
			var addTrackingPaste = $("#addTrackingPaste").val();
			
			$.ajax({
				   type: "POST",
				   url: 'generate/add-extras.php',
				   cache: false,
				   data: "user="+ user +"&facebookUrl="+ facebookUrl+"&twitterUrl="+ twitterUrl+"&googleUrl="+ googleUrl+"&addSocialIcons="+ addSocialIcons+"&removeCopy="+ removeCopy+"&homepageContent="+ homepageContent+"&theContent="+ theContent+"&addTracking="+ addTracking+"&addTrackingPaste="+ addTrackingPaste,
				   success: function()
				   {
						var frameHtml = '<iframe id="previewFrame" src="temp/' + user + '?random=' + Math.floor(Math.random()*9999999999) + '" width="100%" height="373" scrolling="yes"><p>Your browser does not support iframes.</p></iframe>';
						var liveDemoFrame = $('.liveDemoFrame');
						var previewFrame = $('#previewFrame');
						
						previewFrame.remove();
						liveDemoFrame.append(frameHtml);				
						liveDemoFrame.append('<div class="customiseThemeSpinnerWrap"><div class="customiseThemeSpinnerIcon"></div></div>');

						setTimeout(function() { 
							//$('#loading').remove();
							$('.customiseThemeSpinnerWrap').remove();
							$('#previewFrame').fadeIn();
						}, 1000);
				   }
			});
		});
		return false;
	});

	
	
	/////////////////////////////////////////////////////////////////////////
	// ZIP ARCHIVE USER DIRECTORY + REDIRECT TO DOWNLOAD URL
	/////////////////////////////////////////////////////////////////////////		
	$("#downloadNow").click(function() {	
		var userEmail = $('#userEmail').val();
	
		$.ajax({
			   type: "POST",
			   url: 'generate/download.php',
			   cache: false,
			   data: "&email="+ userEmail,
			   success: function(data)
			   {
				  window.location.href="temp/" + userEmail + "/" + "MobileHTMLThemes-" + userEmail + ".zip"; 
			   }
			 });

		return false;
	});		

});