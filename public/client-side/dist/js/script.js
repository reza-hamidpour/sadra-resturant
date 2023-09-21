$(document).ready(function() {
	
	$( ".MobileNavBtn" ).click(function() {
		bx = $('#MainNav');
		if(bx.hasClass('show')){ 
			bx.removeClass('show');
			$('.closeNav').remove();
		} else {
			$('header').append('<div class="closeNav"></div>');
			bx.addClass('show');
		}
	});
	$(document).on('click', '.closeNav', function() {
		$('.closeNav').remove();
		$('#MainNav').removeClass('show');
	});
	$('#GoTopBtn').click(function () {
		$('body,html').animate({
		  scrollTop: 0
		}, 1000);
		return false;
	});
	
	$('#gallery-page-item img').click(function () {
		var src = $(this).attr('src');
		$("body").append('<div class="ViewImageGallery"><div class="close-btn-gallery-view"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 10.5858L14.8284 7.75736L16.2426 9.17157L13.4142 12L16.2426 14.8284L14.8284 16.2426L12 13.4142L9.17157 16.2426L7.75736 14.8284L10.5858 12L7.75736 9.17157L9.17157 7.75736L12 10.5858Z" fill="currentColor"></path></svg></div><img src="' + src + '" class="img-fluid"></div>').show('slow');
	});

	$(document.body).on('click', '.close-btn-gallery-view' ,function(){
		$('.ViewImageGallery').remove();
	});

	$(document.body).on('click', '.ViewImageGallery' ,function(){
		$('.ViewImageGallery').remove();
	});

	$( "#my-account-mobile-menu" ).click(function() {
		bx = $('.my-account-side-area');
		var height = $('.my-account-side').height() + 60;
		if(bx.height()){ 
			$(this).removeClass('active');
			bx.height('0');
		} else {
			$(this).addClass('active');
			bx.height(height);
		}
	});

	$('.owl-delivery').owlCarousel({
		items:1,
		loop:false,
		dots:false,
		margin:10,
		rtl:false,
    	nav:false,
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:false,
		responsiveClass:true,
		responsive:{
			768:{
				items:1
			},
			992:{
				items:2
			},
			1200:{
				items:3
			}
		}
	});

	$('.owl-gallery').owlCarousel({
		items:1,
		stagePadding: 60,
		loop:true,
		dots:false,
		margin:20,
		rtl:false,
    	nav:true,
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:false,
		responsiveClass:true,
		responsive:{
			768:{
				items:1
			},
			992:{
				items:3
			},
			1200:{
				items:4
			}
		}
	});

	$('.btn-number').click(function(e){
		e.preventDefault();
		fieldName = $(this).attr('data-field');
		type      = $(this).attr('data-type');
		var input = $("input[name='"+fieldName+"']");
		var currentVal = parseInt(input.val());
		if (!isNaN(currentVal)) {
			if(type == 'minus') {
				
				if(currentVal > input.attr('min')) {
					input.val(currentVal - 1).change();
				} 
				if(parseInt(input.val()) == input.attr('min')) {
					$(this).attr('disabled', true);
				}
	
			} else if(type == 'plus') {
	
				if(currentVal < input.attr('max')) {
					input.val(currentVal + 1).change();
				}
				if(parseInt(input.val()) == input.attr('max')) {
					$(this).attr('disabled', true);
				}
	
			}
		} else {
			input.val(0);
		}
	});
	$('.input-number').focusin(function(){
	   $(this).data('oldValue', $(this).val());
	});
	$('.input-number').change(function() {
		
		minValue =  parseInt($(this).attr('min'));
		maxValue =  parseInt($(this).attr('max'));
		valueCurrent = parseInt($(this).val());
		
		name = $(this).attr('name');
		if(valueCurrent >= minValue) {
			$(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
		} else {
			alert('Sorry, the minimum value was reached');
			$(this).val($(this).data('oldValue'));
		}
		if(valueCurrent <= maxValue) {
			$(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
		} else {
			alert('Sorry, the maximum value was reached');
			$(this).val($(this).data('oldValue'));
		}
		
		
	});
	$(".input-number").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
				// Allow: Ctrl+A
			(e.keyCode == 65 && e.ctrlKey === true) || 
				// Allow: home, end, left, right
			(e.keyCode >= 35 && e.keyCode <= 39)) {
					// let it happen, don't do anything
					return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
	});
});