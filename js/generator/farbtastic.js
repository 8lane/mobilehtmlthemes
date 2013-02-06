jQuery(document).ready(function($) {

	// Farbtastic Calls
	$('#picker-mgTitleColor').farbtastic(previewEditTitleColor);		
	$('#picker-mgSubTitleColor').farbtastic(previewEditSubTitleColor);	
	$('#picker-mgBgColor').farbtastic(previewEditBgColor);
	
	$('#title').bind('keyup', previewEditTitle);
	$('#subTitle').bind('keyup', previewEditSubTitle);

	// Color Picker Popup Menus
	$('html, .input-class, input').click(function() { 
		$('.picker').fadeOut('fast'); 
	});

	$('.input-class').click(function(e){ 
		if(!$(this).next().is(":visible")) { 
			$(this).next().stop().fadeIn('fast'); 
		}
		e.stopPropagation(); 
	});	
	
});

function previewEditTitle() {
	var iframedoc = $('#previewFrame').get(0).contentDocument; 
	$(iframedoc).find('.t1Title').html($(this).val()); 
	$(iframedoc).find('.copy').html('&copy;&nbsp;' + $(this).val()); 
}

function previewEditSubTitle() {
	var iframedoc = $('#previewFrame').get(0).contentDocument; 
	$(iframedoc).find('.t1Desc').html($(this).val()); 
}

function previewEditTitleColor() {
	$($('#previewFrame').get(0).contentDocument).find('.t1Title').css("color",$.farbtastic('#picker-mgTitleColor').color); 
	$(".mgTitleColor").val($.farbtastic('#picker-mgTitleColor').color); 
}

function previewEditSubTitleColor() {
	$($('#previewFrame').get(0).contentDocument).find('.t1Desc').css("color",$.farbtastic('#picker-mgSubTitleColor').color); 
	$(".mgSubTitleColor").val($.farbtastic('#picker-mgSubTitleColor').color); 
}

function previewEditBgColor() {
	$($('#previewFrame').get(0).contentDocument).find('body').css("background-color",$.farbtastic('#picker-mgBgColor').color); 
	$("#mgBgColor").val($.farbtastic('#picker-mgBgColor').color); 
}

function previewEditBgImg(pattern) {
	var iframedoc = $('#previewFrame').get(0).contentDocument; 
	$(iframedoc).find('.bgImg').css('background-image','url(images/patterns/'+pattern+'.png)'); 
}

function previewEditBgOpacity() {
	var iframedoc = $('#previewFrame').get(0).contentDocument; 
	$(iframedoc).find('.bgImg').css("opacity",$('#mgBgOpacity').text()); 
}

function previewEditFont() {
	var iframedoc = $('#previewFrame').get(0).contentDocument; 
	$(iframedoc).find('.ui-body-a').css("font-family",$('#mgFont').text()); 
}

function previewEditFontSize() {
	var iframedoc = $('#previewFrame').get(0).contentDocument; 
	$(iframedoc).find('.ui-body-a').css("font-size",$('#mgFontSize').text()); 
}