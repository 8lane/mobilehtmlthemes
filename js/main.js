jQuery(document).ready(function($) {

	/////////////////////////////////////////////////////////////////////////
	// STEP 1 - Choose a Theme JS
	/////////////////////////////////////////////////////////////////////////

	// Thumbnail Hovers
	$('.postThumb').hover(function() {
		$(this).find('.cover').stop(true,true).fadeIn(300);
	}, function() {
		$(this).find('.cover').stop(true,true).fadeOut(500);	
	});	
	
	$('.counter').click(function() {
		$(this).addClass('active');
		return false;	
	});		
	
	// Grab the theme title value when the user clicks "Select Theme".
	/*$('.theme').click(function (themeName) { 
		var themeName = $(this).attr("title"); // name of the theme directory to load goes here.	
		$('.liveDemoFrame').switchPreview(themeName);
	});	
	
	// Update the iFrame theme demo
	jQuery.fn.switchPreview = function (themeName) {
		var previewWrap = $('.liveDemoHandInside');
		var previewFrame = $('.liveDemoFrame');
		previewFrame.remove();
		previewWrap.append('<div class="liveDemoFrame"><iframe id="previewFrame" src="themes/' + themeName + '?random=' + Math.floor(Math.random()*9999999999) + '" width="100%" height="373" scrolling="yes"><p>Your browser does not support iframes.</p></iframe></div>');
		previewWrap.append('<div class="switchPreview"><div class="loadingPreview"></div></div>');
		
		setTimeout(function() { 
			$('.switchPreview').remove();	
			previewWrap.fadeIn();
		}, 1000);
	
		return this;
	}
	
	// Select the hidden radio button
	$('.theme').click(function() {
		var themePosition = $(this).attr("id"); // name of the theme directory to load goes here.	
		$('input:radio[name=theme]:nth('+ themePosition +')').attr('checked',true);
		return false;
	});*/
	
	// Adds our "active" class (the border) around each theme thumbnail when selected.
	var themeChooser = $('.theme');
	themeChooser.click(function(e) {
		//if($(e.target).is(".livePreview")) return; // prevents the themeSelected class being added if the user clicks the preview button
		if(!$(this).hasClass('themeSelected'))
			$('.themeSelected').removeClass('themeSelected');
			$('.overlay').remove();
		if(!themeChooser.hasClass('themeSelected')) {
			$(this).addClass('themeSelected'); 
			$(".themeSelected").append('<div class="overlay"></div>');			
		} else {
			$(this).removeClass('themeSelected');
			$('.overlay').remove();
		}
	});	
	

	
	/////////////////////////////////////////////////////////////////////////
	// STEP 2 - Customise Theme
	/////////////////////////////////////////////////////////////////////////	
	$('html, .currentPage').click(function() { 
		var $currentMenu = $('.currentMenu');

		if($currentMenu.is(':visible')) { 
			$currentMenu.slideUp('fast', function() { previewEditFont();  previewEditFontSize(); previewEditBgOpacity(); });
		}
	});	

	$('.currentPage').click(function(e){ 		
		if(!$(this).next().is(":visible")) { 
			$(this).next().stop().slideDown('fast');
		}
		e.stopPropagation();
	});
	
	// Font Family / Size
	$(".currentMenu li").click(function(e){
		e.preventDefault();
		$(this).closest(".currentMenu").prev().html($(this).text());
		$(this).closest(".currentMenu").prev().append('<span class="dd-arrow"></span>');
	});
		
	// Pattern Chooser Menu
	$('html, .patternTitle').click(function() { 
		$('.patternMenu').fadeOut('fast'); 
	});

	$('.patternTitle').click(function(e){ 			
		if(!$(this).next().is(":visible")) { 
			$(this).next().stop().fadeIn('fast');
		}
		e.stopPropagation(); 		
	});
	
	// Call AJAX request when pattern is chosen
	$('.patternMenu li a').click(function(e){ 	
		e.preventDefault();	
		var name = $(this).attr('rel');
		$("#patternTitle").val(name);	
		var pattern = $("#patternTitle").val();
		previewEditBgImg(pattern);
	});	
	
	// Update preview on step load
	$('.navigation_button').click(function(e){ 		
		$("#title").trigger("blur"); // Trigger a blur so that the AJAX request is made.
	});		
	
	
	
	
	
	/////////////////////////////////////////////////////////////////////////
	// STEP 3 - Add Extras
	/////////////////////////////////////////////////////////////////////////	

	// Load the WYSIWYG editor here to fix display: none bug    
	$("input:radio[name=homepageContent]").click(function() {	
		var value = $(this).val();
		if (value == 'yes') {	
			$("#theContent").cleditor({
				fonts:        // font names in the font popup
				"Arial,Courier New," +
				"Georgia,Impact,Sans Serif,Tahoma,Trebuchet MS,Verdana"
			});
		}
	});
	
	$("input:radio[name=homepageContent], input:radio[name=addSocialIcons], input:radio[name=addTracking]").click(function() {

		var value = $(this).val();
		if (value == 'yes') {
			$(this).parents('.seperator').next().slideDown(function() { 
				/*if($('#addSocialIconsFacebookUrl').is(":visible")) { 
					$("#addSocialIconsFacebookUrl").focus(); 
				} else {		
					$("#cleditorMain").focus(); 
				}*/
			});          
			$(this).parents('.seperator').next().next().slideDown();
		} else {
			$(this).parents('.seperator').next().slideUp();
			$(this).parents('.seperator').next().next().slideUp();
		}
	});

	$("input:radio[name=removeCopy]").click(function() {
		var value = $(this).val();
		if (value == 'yes') {
			$("#step3Trigger").trigger("click"); // Trigger a blur so that the AJAX request is made.
		}
	});
	
	$(".step3 input:radio").click(function() {
		var value = $(this).val();
		if (value == 'no') {
			$("#step3Trigger").trigger("click"); // Trigger a blur so that the AJAX request is made.
		}			
	});		
	
	/////////////////////////////////////////////////////////////////////////
	// STEP 4 - Review & Download
	/////////////////////////////////////////////////////////////////////////

	

	var $redirectBoxes = $('.redirectBox');
	$('.redirectOuter').click(function(e){  
		var inner = $(this).parent().find('.'+$(this).attr('id')+'Inner');
		if(inner.is(":visible")) {
			$(this).parent().find('.'+$(this).attr('id')+'Inner').slideUp('fast');
		} else {
			$redirectBoxes.not(inner).slideUp('fast');
			inner.stop().slideDown('fast');
		}
		e.stopPropagation();   
		return false;
	});
	

	// Update the "custom url" redirect code with the user's inputted website
	var toCopy = $('#setupSiteUrl');
	var toPaste = $('#setupCustomSitePaste');
	
	var rediCode = '<script type="text/javascript"> var redirectagent=navigator.userAgent.toLowerCase();var redirect_devices=["vnd.wap.xhtml+xml","sony","symbian","nokia","samsung","mobile","windows ce","epoc","opera mini","nitro","j2me","midp-","cldc-","netfront","mot","up.browser","up.link","audiovox","blackberry","ericsson","panasonic","philips","sanyo","sharp","sie-","portalmmm","blazer","avantgo","danger","palm","series60","palmsource","pocketpc","smartphone","rover","ipaq","au-mic","alcatel","ericy","vodafone","wap1","wap2","teleca","playstation","lge","lg-","iphone","android","htc","dream","webos","bolt","nintendo"];for(var i in redirect_devices){if(redirectagent.indexOf(redirect_devices[i])!=-1){location.replace("'+ toCopy.val() + '")}} </script>';
	toPaste.val(rediCode);
		
	toCopy.keyup(function() {
		var rediCode = '<script type="text/javascript"> var redirectagent=navigator.userAgent.toLowerCase();var redirect_devices=["vnd.wap.xhtml+xml","sony","symbian","nokia","samsung","mobile","windows ce","epoc","opera mini","nitro","j2me","midp-","cldc-","netfront","mot","up.browser","up.link","audiovox","blackberry","ericsson","panasonic","philips","sanyo","sharp","sie-","portalmmm","blazer","avantgo","danger","palm","series60","palmsource","pocketpc","smartphone","rover","ipaq","au-mic","alcatel","ericy","vodafone","wap1","wap2","teleca","playstation","lge","lg-","iphone","android","htc","dream","webos","bolt","nintendo"];for(var i in redirect_devices){if(redirectagent.indexOf(redirect_devices[i])!=-1){location.replace("'+ toCopy.val() + '")}} </script>';
		toPaste.val(rediCode);
	});
	
	
	/////////////////////////////////////////////////////////////////////////
	// Other
	/////////////////////////////////////////////////////////////////////////
	
	$('.feature').hover(function() {
		$(this).find('.featureBanner').stop(true,true).fadeOut(300);
	}, function() {
		$(this).find('.featureBanner').stop(true,true).fadeIn(200);	
	});	

	$('.ipadFrame').hover(function() {
		$(this).find('.ipadCover').stop(true,true).fadeIn(200);
	}, function() {
		$(this).find('.ipadCover').stop(true,true).fadeOut(300);	
	});		
		
	$('.pop').click(function() {
		$('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).show(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 
		$('.popUp').fadeIn(300).center();
		
		$('.popUp .close, #fade').click(function(e) {
			$('.popUp, #fade').fadeOut();
			$('#fade').remove();
		});		
		
		return false;
	});
	
	$('.demoPop').click(function() {
		$('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).show(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 

		var theme = $(this).attr('rel');
		$('.demoPopUp .liveDemoFrame').append('<iframe id="previewFrame" src="themes/' + theme + '?random=' + Math.floor(Math.random()*9999999999) + '" width="100%" height="373" scrolling="yes"><p>Your browser does not support iframes.</p></iframe></div>');
		$('.demoPopUp').show().center();
		
		$('.demoPopUp .close, #fade').click(function() {
			$('.demoPopUp, #fade').fadeOut(function() { 
				$('#previewFrame, #fade').remove();
			});
		});			
		return false;
	});
	
	$('.popAbout').click(function() {
		$('body').append('<div id="fade"></div>'); //Add the fade layer to bottom of the body tag.
		$('#fade').css({'filter' : 'alpha(opacity=80)'}).show(); //Fade in the fade layer - .css({'filter' : 'alpha(opacity=80)'}) is used to fix the IE Bug on fading transparencies 

		$('.popUpAbout').show().center();
		
		$('.popUpAbout .close, #fade').click(function() {
			$('.popUpAbout, #fade').fadeOut(function() { 
				$('#previewFrame, #fade').remove();
			});
		});			
		return false;
	});	
	/////////////////////////////////////////////////////////////////////////
	// BLUR & FOCUS FUNCTION
	/////////////////////////////////////////////////////////////////////////
	
	// Focus & Blur function for all input fields.
	$('.focus').focus(function() {
		if (this.value == this.defaultValue){ 
			this.value = '';
		}
		if(this.value != this.defaultValue){
			this.select();
		}
	});
	$('.focus').blur(function() {
		if ($.trim(this.value) == ''){
			this.value = (this.defaultValue ? this.defaultValue : '');
		}
	});	

	// Prefill URL text inputs with http://
	var http = 'http://';
	$('.http').focus(function() {
		if ($.trim(this.value) == ''){
			$(this).val(http);
		}
	});
	$('.http').blur(function() {
		if ($.trim(this.value) == http){
			this.value = (this.defaultValue ? this.defaultValue : '');
		}
	});		
	
	/////////////////////////////////////////////////////////////////////////
	// ABSOLUTELY CENTRE ELEMENT FUNCTION
	/////////////////////////////////////////////////////////////////////////	
	jQuery.fn.center = function () {
		this.css("position","absolute");
		this.css("top", (($(window).height() - this.outerHeight()) / 2) + $(window).scrollTop() + "px");
		this.css("left", (($(window).width() - this.outerWidth()) / 2) + $(window).scrollLeft() + "px");
		return this;
	}
	
	/////////////////////////////////////////////////////////////////////////
	// GO TO TOP
	/////////////////////////////////////////////////////////////////////////
	
	// Animate the "go to top" scroll
	$('a[href=#top]').click(function(){
		$('html, body').animate({scrollTop:0}, 'slow');
			return false;
	});	
	
	
	
});