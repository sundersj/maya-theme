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

//FORM subimission

$(document).on('click', '#btn-contact', function(e) {
	e.preventDefault();
	var btn 		= $(this);
	var form 		= $('#maya-contact-form');
	var email		= $.trim(form.find('#email').val());
	var fullname	= $.trim(form.find('#fullname').val());
	var message		=  $.trim(form.find('#message').val());
	var gear 		= form.find('.gear');
	var alert 		= form.find('.alert-message');
	var url			= form.attr('url');


	$('.maya-form p').slideUp();
	alert.find('p').fadeOut();
	gear.fadeIn();
	btn.fadeOut();
	var submit = true;

	if(fullname == '') {
		form.find('.fullname').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit = false;
		return false;
	}

	if(email == '' || !validateEmail(email) ) {
		form.find('.email').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit = false;
	}

	if( message == '') {
		form.find('.message').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit =  false;
	}

	if (submit) {
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


$(document).on('click', '#btn-register', function(e) {
	e.preventDefault();
	var btn 		= $(this);
	var form 		= $('#maya-register-form');
	var firstname	= $.trim(form.find('#firstname').val());
	var lastname	= $.trim(form.find('#lastname').val());
	var username	= $.trim(form.find('#username').val());
	var email		= $.trim(form.find('#email').val());
	var pass1		= $.trim(form.find('#pass1').val());
	var pass2		= $.trim(form.find('#pass2').val());
	var gear 		= form.find('.gear');
	var homeUrl		= form.find('#homeUrl').attr('homeUrl');
	var alert 		= form.find('.alert-message');
	var url			= form.attr('url');

	$('.maya-form p').slideUp();
	alert.find('p').fadeOut();
	alert.find('.c-failure').text('');
	gear.fadeIn();
	btn.fadeOut();
	var submit = true;

	if(firstname == '') {
		form.find('.firstname').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit = false;
	}

	if(lastname == '') {
		form.find('.lastname').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit = false;
	}

	if(username == '') {
		form.find('.username').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit = false;
	}

	if(email == '' || !validateEmail(email) ) {
		form.find('.email').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit = false;
	}

	if( pass1 == '') {
		form.find('.pass1').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit =  false;
	}

	if( pass2 == '') {
		form.find('.pass2').slideDown();
		gear.fadeOut();
		btn.fadeIn();
		submit =  false;
	}

	if(pass1 != '' && pass2 != '') {
		if( ( pass1.length < 5 || pass1.length > 9 ) || (pass2.length < 5 || pass1.length > 9) ) {
			alert.find('.c-failure').text('Password/Confirm Password lenght must be between 5 to 9 characters.').fadeIn();
			gear.fadeOut();
			btn.fadeIn();
			submit =  false;
			return false;
		}

		if(pass1 !== pass2) {
			alert.find('.c-failure').text('Password do not match.').fadeIn();
			gear.fadeOut();
			btn.fadeIn();
			submit =  false;
			return false;
		}
	}

	if (submit) {
		jQuery.ajax({
			type		: 'post',
			dataType	: 'json',
			url			:  url,
			data		:  {
				action: 'maya_theme_register_form',
				firstname: 	firstname,
				lastname: 	lastname,
				username: 	username,
				email: 		email,
				pass1: 		pass1,
				pass2: 		pass2,
			},

			success: function (json) {
				gear.fadeOut();
				btn.fadeIn();
				if(json) {
					if(json.id != 0) {
						alert.find('.c-failure').text('You are registered successfully. Thank you!').fadeIn();
						window.location.href = homeUrl;
					} else if(json.error) {
						alert.find('.c-failure').text(json.error).fadeIn();
					}

					gear.fadeOut();
					btn.fadeIn();

					console.log(json);
				}
			}
		});
	}
});
