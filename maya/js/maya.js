/*
	common js file
	@package mayatheme
*/

function validateEmail(Email) {
	var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z 2,4}|[0-9]{1,3})(\]?)$/;
	return $.trim(Email).match(pattern) ? true : false;
}

$(document).on('scroll', function() {
	var current = $(window).scrollTop();
	var nav = $('#mainNav');
	var link = $('#menu-main-navigation>li>a');
	if (current > 50) {
		nav.css('background-color', '#f8f8f8');
		link.addClass('nav-color');
	} else {
		nav.css('background-color', 'transparent');
		link.removeClass('nav-color');
	}
});

//tooltip
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

//contact page subimission
$(document).on('click', '#btn-contact', function(e) {
	e.preventDefault();
	var form 		= $('#maya-contact-form');
	var gear 		= form.find('.gear');
	var alert 		= form.find('.alert-message');
	var btn 		= form.find('#btn-contact');
	var email		= $.trim(form.find('#email').val());
	var fullname	= $.trim(form.find('#fullname').val());
	var message		= $.trim(form.find('#message').val());
	var url			= form.attr('url');

	$('#maya-contact-form p').removeClass('reveal');
	gear.fadeIn();
	btn.fadeOut();
	alert.find('p').fadeOut();

	if(fullname == '') {
		$('.fullname').addClass('reveal');
		gear.fadeOut();
		btn.fadeIn();
	}

	if(email == '' || !validateEmail(email) ) {
		$('.email').addClass('reveal');
		gear.fadeOut();
		btn.fadeIn();
	}

	if(message == '') {
		$('.message').addClass('reveal');
		gear.fadeOut();
		btn.fadeIn();
	}

	if(fullname && validateEmail(email) && message ) {
		jQuery.ajax({
			type		: 'post',
			dataType	: 'json',
			url			:  url,
			data		:  {action: 'maya_theme_contact_form', name: fullname, email:email, message: message},
			success: function (json) {
				gear.fadeOut();
				btn.fadeIn();
				if(json) {
					alert.find('.c-success').fadeIn();
					form[0].reset();
				} else {
					alert.find('.c-failure').fadeIn();
				}
			}
		});
	}
});
