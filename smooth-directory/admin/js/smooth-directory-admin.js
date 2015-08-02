jQuery(document).ready(function ($) {
	'use strict';

    $('#business_upload').on('click', function (e) {
        e.preventDefault();

        var image = wp.media({ 
            title: 'Upload Image',
            multiple: false
        })
        .open()
        .on('select', function (e) {
            var uploaded_image = image.state().get('selection').first(),
            	image_url = uploaded_image.toJSON().url;

            var preview_url = function () {
            	if (uploaded_image.toJSON().sizes.thumbnail) {
            		return uploaded_image.toJSON().sizes.thumbnail.url;
            	} else {
            		return uploaded_image.toJSON().sizes.full.url;
            	}
            }

            // Update hidden field value
            $('#business_logo').val(image_url);

            // Update preview
            if ($('#business_logo--preview').children().length > 1) {
            	$('#business_logo--preview')
            		.find('img').attr('src', preview_url())
            		.addClass('loaded');
            } else {
            	$('#business_logo--preview')
            		.append('<img src="' + preview_url() + '" width="60" height="60">')
            		.addClass('loaded');
            }
        });
    });

    $('#business_logo--delete').on('click', function (e) {
    	e.preventDefault();

    	$('#business_logo--preview').removeClass('loaded');
    	$('#business_logo--preview img').remove();
    	$('#business_logo').val('');
    });
});