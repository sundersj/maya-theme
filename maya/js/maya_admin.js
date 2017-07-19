jQuery(document).ready( function($){

	var mediaUploader;

	$('#upload-button').on('click',function(e) {
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);
			$('.profile-image').css('background-image','url(' + attachment.url + ')');
		});

		mediaUploader.open();

	});

	$('#remove-picture').on('click',function(e){

		e.preventDefault();
		var answer = confirm("Are you sure you want to remove your Profile Picture?");
		if( answer == true ){
			$('#profile-picture').val('');
			$('.maya-general-form').submit();
		}
		return;
	});

	//custom css editor
	var updateCSS = function(){
		$("#mayacustomcss").val( editor.getSession().getValue() );
	}

	$("#maya-custom-css-form").submit( updateCSS );

	var editor = ace.edit("maya-custom-css");
    editor.setTheme("ace/theme/monokai");
    editor.getSession().setMode("ace/mode/css");

});
